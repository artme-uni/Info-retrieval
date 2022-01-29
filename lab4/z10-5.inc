<?php

$rus_name = array(
    'snum' => 'номер продавца',
    'sname' => 'имя продавца',
    'city' => 'город',
    'comm' => 'комиссионные продавца',
    'cnum' => 'номер покупателя',
    'cname' => 'имя покупателя',
    'rating' => 'рейтинг покупателя',
    'onum' => 'номер заказа',
    'amt' => 'сумма заказа',
    'odate' => 'дата заказа'
);

function getTypeDescription($type) {
    switch ($type) {
        case MYSQLI_TYPE_SHORT:
            return "smallint";
        case MYSQLI_TYPE_LONG:
            return "int";
        case MYSQLI_TYPE_FLOAT:
            return "float";
        case MYSQLI_TYPE_DATE:
            return "date";
        case MYSQLI_TYPE_VAR_STRING:
            return "varchar";
        case MYSQLI_TYPE_DOUBLE:
            return "double";
        default:
            return "";
    }
}
function getFlagsDescription($flags) {
    if ($flags & MYSQLI_PRI_KEY_FLAG) {
        return 'primary_key ';
    }
    if ($flags & MYSQLI_NOT_NULL_FLAG) {
        return 'not_null';
    }
    return "";
}

function vid_structure($con, $table) {
    $result = mysqli_query($con, "SELECT * FROM  $table");
    if (!$result) {
        echo mysqli_error($con);
        return;
    }
    echo "<h4>Структура таблицы $table</h4>";

    $fields = mysqli_fetch_fields($result);
    foreach ($fields as $val) {
        echo "<i>" . getTypeDescription($val->type) . "</i> " . $val->length . " ";
        echo "<b>" . $val->name . "</b> ";
        echo "<i>" . getFlagsDescription($val->flags) . "</i>" . "<br>";
    }
}

function vid_content($con, $table) {
    global $rus_name;
    $result = mysqli_query($con, "SELECT * FROM $table");
    if (!$result) {
        print mysqli_error($con);
        return;
    }
    print "<h4>Содержание таблицы $table</h4>";

    print "<table style = 'border: 1px solid black'>";

    print "<tr>";
    for ($x = 0, $num_fields = mysqli_num_fields($result); $x < $num_fields; $x++) {
        $fields_info = mysqli_fetch_field($result);
        print "<th>" . $rus_name[$fields_info->name] . "<br>" . $fields_info->name . "</th>>";
    }
    print "</tr>";

    while ($row = mysqli_fetch_row($result)) {
        print "<tr>";
        foreach ($row as $field) {
            print "<td>" . "<p>$field</p>" . "</td>";
        }
        print "</tr>";
    }
    print "</table>";
}

$structure = $_GET['structure'];
$content = $_GET['content'];

if (isset($structure)) {
    foreach ($structure as $table) {
        vid_structure($con, $table);
    }
}
if (isset($content)) {
    foreach ($content as $table) {
        vid_content($con, $table);
    }
}

print "<br><a href='z10-1.html'>Возврат к выбору таблицы</a>";

?>