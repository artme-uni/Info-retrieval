<?php

# В скрипте z3-3.php создайте 4 функции с именами Ru(), En(), Fr(), De(). Каждая функция выводит на экран приветствие на соответствующем языке:
# Ru() - "Здравствуйте!",
# En() - "Hello!",
# Fr() - "Bonjour!" и
# De() - "Guten Tag!".

$color = $_GET["color"];
$lang = $_GET["lang"];

function printColoredText($text, $color) {
    print "<p style='color: $color'>$text";
}
function Ru($color) {
    printColoredText("Здравствуйте!", $color);
}
function En($color) {
    printColoredText("Hello!", $color);
}
function Fr($color) {
    printColoredText("Bonjour!", $color);
}
function De($color) {
    printColoredText("Gutten Tag!", $color);
}

$lang($color);

