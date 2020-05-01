<?php 
    $numberOfLesson = 'PHP Lesson 2';
    $date = date("d F Y");
    $dateHours = date("G");

    function showTime() {
        $dateHours = date("G");
        $dateMinutes = date("i");
        $minutesToONeNumber = $dateMinutes; // чтобы в дальнейшем изменять эту переменную, не меняя колличество минут
        $hoursName = '';
        $minutesName = '';

        if ($dateHours == 1 || $dateHours == 21) {
            $hoursName = 'час';
        } elseif ($dateHours > 1 && $dateHours < 5 || $dateHours >= 22 && $dateHours <= 24) {
            $hoursName = 'часа';
        } elseif ($dateHours >= 5 && $dateHours <= 20 || $dateHours == 0) {
            $hoursName = 'часов';
        } 

        /**
         Приводим колличесво минут к натуральному числу, чтобы от него отталкиваться по склонению
         */
        
        while ($minutesToONeNumber > 10) {
            $minutesToONeNumber -= 10;
        } 

        if ($minutesToONeNumber == 1) {
            $minutesName = 'минута';
        } elseif ($minutesToONeNumber > 1 && $minutesToONeNumber <= 4) {
            $minutesName = 'минуты';
        } elseif ($minutesToONeNumber > 4) {
            $minutesName = 'минут';
        }

        return $dateHours . ' ' . $hoursName . " " . $dateMinutes . " " . $minutesName;
    }

    function exercise1($a, $b) {
        if (is_int($a) && is_int($b)) {
            if ($a >= 0 && $b >= 0) {
                echo(abs($a - $b));
            } elseif ($a <= 0 && $b <= 0) {
                echo($a * $b);
            } elseif ($a >= 0 && $b <= 0 || $a <= 0 && $b >= 0) {
                echo($a + $b);
            }
        } else {
            echo("Not a number");
        }
    }

    function plus($a, $b) {
        return ($a + $b);
    }

    function minus($a, $b) {
        return ($a - $b);
    }

    function times($a, $b) {
        return ($a * $b);
    }

    function divided($a, $b) {
        return ($a / $b);
    }

    function exercise4($a, $b, $operation) {
        switch ($operation) {
            case 'Add':
                return ($a + $b);
                break;
            case 'Subtract':
                return ($a - $b);
                break;
            case 'Multiply':
                return ($a * $b);
                break;
            case 'Divide':
                return ($a / $b);
                break;
        }
    }

    function power($val, $pow) {
        if ($pow <= 0) {
            return ('Не правильно указана степень');
        }
        if ($pow == 1 ) {
            return $val; 
        } else {
            $val *= $val;
            return power($val, $pow - 1); 
        } 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$numberOfLesson?></title>
</head>
<body>
    <h1> 
        Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. 
            Затем написать скрипт, который работает по следующему принципу:
            если $a и $b положительные, вывести их разность;
            если $а и $b отрицательные, вывести их произведение;
            если $а и $b разных знаков, вывести их сумму;
    </h1>

    <h2>A = 16 , B = 21</h1>
    <h3>Разность равна <?=exercise1(16,21)?></h3>

    <h2>A = -6 , B = -2</h1>
    <h3>Произведение равно <?=exercise1(-6,-2)?></h3>
    
    <h2>A = -54 , B = 7</h1>
    <h3>Сумма равна <?=exercise1(-54,7)?></h3>
</br>
</br>

    <h1>Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.</h1>

    <h2>4 plus 5 = <?=plus(4,5)?></h2>
    <h2>7 minus 2 = <?=plus(7,2)?></h2>
    <h2>5 times 3 = <?=times(5,3)?></h2>
    <h2>18 divided by 3 = <?=divided(18,3)?></h2>

<br>
<br>
    <h1>
        Реализовать функцию с тремя параметрами: 
        function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, 
        $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций 
        (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
    </h1>

    <h2>A = 15 , B = 7</h2>
    <h3>Additiondd = <?=exercise4(15,7,'Add')?></h3>
    <h3>Subtraction = <?=exercise4(15,7,'Subtract')?></h3>
    <h3>Multiplication = <?=exercise4(15,7,'Multiply')?></h3>
    <h3>Division = <?=exercise4(15,7,'Divide')?></h3>

<br>
<br>

    <h1>*С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.</h1>

    <h2>11 raised to the power of 6 = <?=pow(11,6)?></h2>
    
<br>
<br>

    <h1>*Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:</h1>

    <h2></h2>

    <footer>
        <hr/>
        <?=$date?>
        <?=showTime()?>

    </footer>

</body>
</html>