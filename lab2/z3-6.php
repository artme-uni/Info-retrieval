<?php

# 1. Создайте ассоциативный массив $cust[] с ключами cnum, cname, city, snum и rating и значениями:
# 2001, Hoffman, London, 1001 и 100. Выведите этот массив (вместе с именами ключей) на экран.
# 2. Отсортируйте этот массив по значениям. Выведите результат на экран.
# 3. Отсортируйте этот массив по ключам. Выведите результат на экран.
# 4. Выполните сортировку массива с помощью функции sort(). Выведите результат на экран.

function print_array(array $array) {
    foreach($array as $key => $value) {
        echo ("$key: $value <br>");
    }
    echo "<br>";
}
$cust = array (
    'cnum' => 2001,
    'cname' => "Hoffman",
    'city' => "London",
    'snum' => 1001,
    'rating' => 100
);
print_array($cust);

print "Сортировка по значения : ";
asort($cust);
print_array($cust);

print "Сортировка по ключам : ";
ksort($cust);
print_array($cust);

print "Сортировка с помощью sort : ";
sort($cust);
print_array($cust);