<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calcStr = $_POST['problem'];

    if(!skobkiCheck($calcStr)){
        echo 'Ошибка в скобках';
        return false;
    }
    //Тригонометрия?
    if(substr_count($calcStr, 'sin') || substr_count($calcStr, 'cos') || substr_count($calcStr, 'tg') || substr_count($calcStr, 'ctg')){
        //Получаем название функции и значение
        $trigArray = explode('(', $calcStr);
        $trigName = $trigArray[0];//назваение
        $trigval = str_replace(')','',$trigArray[1]);//значение

        //Катангенс
        if($trigName == 'ctg'){
            $tg = trig( 'tan', $trigval);
            $ctg = 1/$tg;
            echo $ctg;
            return;
        }
        //Тангенс tg-> tan
        if($trigName == 'tg'){
            $trigName = 'tan';
        }

        //Вызывем триг функцию
        echo trig( $trigName, $trigval);
        return;
    }

    $calcStr = implode(' ', str_split($calcStr));

    $result = calculator(skobki($calcStr));

    echo $result;
}

function calculator($calcStr) {
    if (substr_count($calcStr, '+') > 0) {
        $plus = explode('+', $calcStr);
        $result = calculator($plus[0]);
        foreach (array_slice($plus, 1) as $elem) {
            $result += calculator($elem);
        }

        return $result;
    } elseif ((substr_count($calcStr, '-') > 0)) {
        $minus = explode('-', $calcStr);
        $result = calculator($minus[0]);
        foreach (array_slice($minus, 1) as $elem) {
            $result -= calculator($elem);
        }
        return $result;
    } elseif ((substr_count($calcStr, '*') > 0)) {
        $multi = explode('*', $calcStr);
        $result = calculator($multi[0]);
        foreach (array_slice($multi, 1) as $elem) {
            $result *= calculator($elem);
        }
        return $result;
    } elseif ((substr_count($calcStr, '/') > 0)) {
        $division = explode('/', $calcStr);
        $result = calculator($division[0]);
        foreach (array_slice($division, 1) as $elem) {
            $result /= calculator($elem);
        }
        return $result;
    } else {
        //удаляем пробелы
        $calcStr= preg_replace( '/\s+/' , '' , $calcStr);
        //преобразуем строку к числу с плав точкой
        return (float)$calcStr;
    }
}

function skobki($calcStr) {
    while (substr_count($calcStr, '(') > 0) {
        $right = strpos($calcStr, ')');
        $left = strrpos(substr($calcStr, 0, $right), '(');
        $calcStr= substr_replace($calcStr, calculator(substr($calcStr, $left+1, $right-$left+1)), $left, $right-$left+1);
    }
    return $calcStr;
}

function skobkiCheck($calcStr)
{
    // возвращаем ошибку если пустые скобки ()
    if(substr_count($calcStr, '()') > 0){
        return false;
    }
    $open = 0; // создаем счетчик открывающихся скобок
    for ($i = 0; $i < strlen($calcStr); $i++) // перебираем все символы строки
    {
        if ($calcStr[$i] == '(') // если встретилась «(»
            $open++; // увеличиваем счетчик
        else
            if ($calcStr[$i] == ')') // если встретилась «)»
            {
                $open--; // уменьшаем счетчик
                if ($open < 0) // если найдена «)» без соответствующей «(»
                    return false; // возвращаем ошибку
            }
    }
    // если количество открывающихся и закрывающихся скобок разное
    if ($open !== 0)
        return false; // возвращаем ошибку
    return true; // количество скобок совпадает – все ОК
}

function trig($name, $val){

    if (!istrig($name))
        return false;

    $result = $name($val);

    return $result;
}

function istrig($name)
{
    $trignames = array('sin','cos', 'tan');

    if(!(in_array($name, $trignames))){
        return false;
    }
    return true;
}
