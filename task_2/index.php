<?php

require 'lib/calculator.php';

$operation_array = ['+', '-', '*', '/']; // Массив возможных операций
$number_array = [$_POST['first_number'], $_POST['second_number']];
$operation = $_POST['operation'];

if ($operation != '' && (float)$_POST['first_number'] != '' && (float)$_POST['second_number'] != '') {
    try {
        $calculator = new Calculator($number_array, $operation, $operation_array);
        $result = $calculator->calculate();
    } catch (Exception $e) {
        echo 'Выброшено исключение: ', $e->getMessage(), "\n";
    }
} else {
    echo('Введите числа');
}


?>

    <form action="index.php" method="post">
        <p>Первое число: <input type="text" name="first_number"/></p>

        <p>Операция: <select name="operation" id="">
                <?php
                foreach ($operation_array as $check_operation) {
                    echo "<option name='$check_operation'>$check_operation</option>";
                }
                ?>
            </select></p>

        <p>Второе число: <input type="text" name="second_number"/></p>

        <p><input type="submit" value="Посчитать"/></p>
    </form>
<?php
if ($result != '') {
    echo 'Результат: ' . $result;
}
?>