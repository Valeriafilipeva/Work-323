<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        get_headers('https://docs.google.com/spreadsheets/d/1wo72S6p5xXMA93kFcQlJh0pAclYphX3WimbCmqRzWJI/edit#gid=1384460340');
    ?>
    <a href="index.html">Переход на 1 страницу</a>

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4.1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <header> 
        <h1>Feedback form</h1>
    </header>
    <main>
        <?php 
            $headers = get_headers('http://127.0.0.1/php-курс/lab-3/index.html');
            foreach ($headers as $element){
                echo $element . "<br>";
            }
        ?>
        <a href="index.html">Переход на 1 страницу</a>
    </main>
</body>

</html>