$string = 'ааа нужно сделать "aaab" не поменяется.';
$pattern = '/ааа(?!b)/'; // Поиск "ааа", не следующей за "b"
$replacement = '!';
$result = preg_replace($pattern, $replacement, $string);
echo $result;

$string = 'aaa bcd xxx efg';
$pattern = '/(.)\1+/'; // Поиск повторяющихся символов
preg_match_all($pattern, $string, $matches);
print_r($matches[0]); // Выведет массив найденных совпадений

$string = 'aa aba abba abbba abca abea';
$pattern = '/a(b+a)/'; // Поиск "a", за которым следует одна или более "b", а затем "a"
preg_match_all($pattern, $string, $matches);
print_r($matches[1]); // Выведет массив найденных совпадений


$string = 'а1а a2a аЗа а4а а5а aba аса';
$pattern = '/а\dа/'; // Поиск "а", за которым следует цифра, а затем "а"
preg_match_all($pattern, $string, $matches);
print_r($matches[0]); // Выведет массив найденных совпадений
