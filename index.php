<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2</title>
</head>
<body>
    <?php 
        $equation = 'X * 9 = 56';
        $elem = explode (" ", $equation);
        $left = $elem[0];
        $right = $elem[2];
        $result = $elem[4];
        switch ($elem[1]) {
            case "+":
                $x = $result - $right;
                break;
            case "-":
                $x = $result + $right;
                break;
            case "*":
                $x = $result / $right;
                break;
            case "/":
                $x = $result * $right;
                break;
            case "**":
                $x = log($res, $right);
                break;
            default:
                echo "Неподдерживаемй оператор";
        }
        echo $x;
    ?>
</body>
</html>