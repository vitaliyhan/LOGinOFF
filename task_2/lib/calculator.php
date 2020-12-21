<?php

class Calculator
{

    private $number_array;
    private $operation_array;
    private $operation;

    public function __construct($number_array, $operation,$operation_array)
    {
        $this->number_array = $number_array;
        $this->operation_array = $operation_array;
        $this->operation = $this->checkOperation($operation);

    }

    private function checkOperation($operation)
    {
        if (in_array($operation, $this->operation_array)) {
            return $operation;
        } else {
            throw new ErrorException('Знак не из массива допустимых значений');
        }
    }

    public function calculate()
    {
        $string = '';
        $result = '';
        foreach ($this->number_array as $key => $number) {

            if ($key != 0) {

                $string .= ' ' . $this->operation;
            }
            $number = str_replace(",", ".", $number); // Вдруг кто введет запятую
            $string .= (float)$number;
        }
        eval('$result=' . $string . ';');// Конечно, это ужасно, можно использовать if, case, но тут тестовое задание, так что можно поиграться.
        return $result;
    }


}

