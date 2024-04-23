<?php
$currentUrl = $_SERVER['REQUEST_URI'];

if ($currentUrl == '/hello/username') {
    $title = "Страница приветствия";
} else {
    // Если заголовок не передан, устанавливаем заголовок по умолчанию
    $title = isset($title) ? $title : "Мой блог";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>
    <!-- Содержимое страницы -->
</body>
</html>
