<?php

# Используя вложенные циклы for в скрипте z3-2.php отобразите на экране таблицу сложения чисел от 1 до 10. При
# этом цвет цифр в верхней строке и левом столбце должен быть задан через $color вне циклов, а в левой верхней
# ячейке должен стоять знак "+" красного цвета

$plusColor = "red";
$cellColor = "blue";

echo "<table style='border: 1px solid black;'>";

for ($x = 1; $x <= 10; $x++) {
    print("<tr>");

    for ($y = 1; $y <= 10; $y++) {

        if ($x == 1 && $y == 1) {
            $styleWithColor = "color: $plusColor";
            $text = "+";
        } elseif ($x == 1 || $y == 1) {
            $styleWithColor = "color: $cellColor";
            $text = max($x, $y);
        } else {
            $text = $x + $y;
            $styleWithColor = "";
        }

        $string = "<td style='padding: 5px;border: 1px solid black;$styleWithColor'>".$text."</td>";
        print($string);
    }
    echo "</tr>";
}

echo "</table>";

