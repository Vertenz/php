<!DOCTYPE html>
<?php
define('NAME_OF_COURSE', 'learning the PHP');
$numberLesson = 1;
$date = date("d  F Y");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NAME_OF_COURSE ?></title>
</head>
<body>
    <h1>Lesson <?php echo $numberLesson ?></h1>

    <h2>Объяснить, как работает данный код:</h2>
    <pre>
        $a = 5;
        $b = '05';
        var_dump($a == $b);         // Почему true? // - интерпретирует 05 как 5
        var_dump((int)'012345');     // Почему 12345? // - приводит к числу, 
                                                            так как целое число не может начитаться с 0 убирает его
        var_dump((float)123.0 === (int)123.0); // Почему false? // с точкой и буз, int число без точки
        var_dump((int)0 === (int)'hello, world'); // Почему true? // не нашел число => 0
    </pre>

    <br>
    <br>

    <h2>5. *Используя только две целочисленные переменные, поменяйте их значение местами. Например, если a = 1, b = 2, 
        надо, чтобы получилось b = 1, a = 2. Дополнительные переменные использовать нельзя.</h2>
        <p>
            <?php 
                $a = 1;
                $b = 2;
                $b = $a;
                ++$a;
                echo"a = $a , b = $b";
            ?>
        </p>


    <footer>
        <hr/>
        <?php echo $date ?>
    </footer>
</body>
</html>


