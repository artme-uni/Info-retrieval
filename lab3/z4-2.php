<html>
<head>
    <meta charset="UTF-8">
</head>
<body>

<?php
$align = isset($_GET['align']) ? $_GET['align'] : "left";
$valign =  isset($_GET['valign']) ?  $_GET['valign'] : "top";

if(isset($align) && isset($valign)) {
    echo "<table style = 'border: 1px solid black; width: 100px; height: 100px'>";
    echo "<td style = 'text-align: $align; vertical-align: $valign'>Текст</td>";
    echo "</table>";
}
?>

<form action="<?php print $_SERVER['PHP_SELF']?>" method="GET">
    <p><b>Выберите горизонтальное расположение:</b></p>
    <p><input type="radio" name="align" value="left">слева</p>
    <p><input type="radio" name="align" value="center">по центру</p>
    <p><input type="radio" name="align" value="right">справа</p>

    <p><b>Выберите вертикальное расположение:</b></p>
    <p><input type="checkbox" name="valign" value="top">сверху</p>
    <p><input type="checkbox" name="valign" value="middle">посередине</p>
    <p><input type="checkbox" name="valign" value="bottom">внизу</p>
    <p><input type="submit" value="Выполнить"></p>
</form>

</body>
</html>


