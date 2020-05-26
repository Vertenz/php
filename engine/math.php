<?php
function calculateThis ($firstNumber, $do, $secondNumber) {
    switch ($do) {
        case 'mult':
            return $firstNumber * $secondNumber;
            break;
        case 'divide':
            if($secondNumber == 0) {
                echo "<script>
               alert('Деление на ноль же!');
           </script>";
                return 'error';
                break;
            }else {
                return $firstNumber / $secondNumber;
                break;
            }
        case 'add':
            return $firstNumber + $secondNumber;
            break;
        case 'subtract':
            return $firstNumber - $secondNumber;
            break;
    }
}
