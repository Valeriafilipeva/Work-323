<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab №1</title>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 23px;
        }
        .text1 {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="./img/Logo_Polytech_rus_main.jpg" width="150px" alt="Логотип">
        </div>
        <div class="text1">
            <h1>Домашняя работа: Hello, World!</h1>
        </div>
    </header>
    <main>
      <?php
        echo "<h1>Hello world</h1>";
        $a = 27;
        $b = 12;
        $hypotenuse = round(hypot($a, $b), 2); 
        echo $hypotenuse;
      ?>
    </main>
    <footer>
        <h2>Задание для самостоятельной работы</h2>
    </footer>
</body>
</html>