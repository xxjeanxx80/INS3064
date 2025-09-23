<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>This is my first PHP file</h1>
    <?php
        // http://localhost:80/index.php?x=5&y=7
        $x = $_GET["x"];
        $y = $_GET["y"];
        echo "x+y= ".($x+$y). "<br/>";
        echo "x==y: ".($x==$y). "<br/>";
    ?>
</body>
</html>