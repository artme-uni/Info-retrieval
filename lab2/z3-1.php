<?php

# Используя вложенные циклы while, в скрипте z3-1.php отобразите на экране таблицу Пифагора 10×10 (т.е. таблицу
# умножения чисел от 1 до 10). При этом фон диагональных ячеек должен быть того цвета, который задается вне циклов.
# Ширина рамки таблицы равна 1, отступ содержимого ячеек от границы равен 5.

$color = "gray";

echo "<table style='border: 1px solid black;'>";

$x = 1;
while ($x <= 10) {
    echo "<tr>";
    $y = 1;
    while ($y <= 10) {
        $styleWithColor = ($x == $y) ? "background-color:$color" : "";
        $string = "<td style='padding: 5px;border: 1px solid black;$styleWithColor'>".($x * $y)."</td>";

        print($string);
        $y++;
    }
    echo "</tr>";
    $x++;
}
echo "</table>";

