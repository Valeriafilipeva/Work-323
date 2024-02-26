<?php
// calculate.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expression = $_POST['expression'];

    // Парсинг выражения
    $tokens = tokenize($expression);
    $ast = buildAST($tokens);

    // Вычисление выражения
    $result = calculateAST($ast);

    // Отправка результата обратно на фронтенд
    echo $result;
}

function tokenize($expression) {
    // Разбиение выражения на токены
    return preg_split('/\s+/', trim($expression));
}

function buildAST($tokens) {
    // Построение AST
    // Здесь должен быть ваш код для преобразования токенов в AST
    // Этот пример просто возвращает исходные токены
    return $tokens;
}

function calculateAST($ast) {
    // Вычисление выражения по AST
    // Здесь должен быть ваш код для рекурсивного вычисления выражения
    // Этот пример просто возвращает строковое представление AST
    return implode(' ', $ast);
}
?>













<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servernayay</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <img src="./img/Logo_Polytech_rus_main.jpg" alt="Логотип" class="logo">
        <p class="main_text1">Домашняя работа: Hello, World!</p>
    </header>
    <main>
    <?php
    echo "Hello? World";
    ?>
    </main>
    <footer>
        <p>
        Создать веб-страницу с динамическим контентом. Загрузить код в удаленный репозиторий. Залить на хостинг.
        
        Дано:
        
        Header = слева логотип МосПолитеха, по центру название работы.
        
        Footer = задание для самостоятельно работы (без описания).
        
        Main = любой html-элемент с адекватным динамическим контентом (пример Hello, World).
        
        Ответ на гугл диск:
        
        URL – адрес страницы.
        
        Ссылка на репозиторий
 
        </p>
    </footer>
</body>
</html> -->

