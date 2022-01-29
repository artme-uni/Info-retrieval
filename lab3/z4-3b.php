<html>
<head>
    <meta charset="UTF-8">
    <title>Лаб3-3</title>
</head>
<body>

<?php
$otv = array("6", "9", "4", "1", "3", "2", "5", "8", "7");
$answers = $_GET['answers'];
$username = $_GET['username'];

$rightAnswersCount = 0;
for ($i = 0; $i < count($otv); $i++) {
    if ($otv[$i] === $answers[$i]) $rightAnswersCount++;
}
$userStatus = "";
switch ($rightAnswersCount) {
    case 9:
        $userStatus = "великолепно знаете географию";
        break;
    case 8:
        $userStatus = "отлично знаете географию";
        break;
    case 7:
        $userStatus = "очень хорошо знаете географию";
        break;
    case 6:
        $userStatus = "хорошо знаете географию";
        break;
    case 5:
        $userStatus = "удовлетворительно знаете географию";
        break;
    case 4:
        $userStatus = "терпимо знаете географию";
        break;
    case 3:
        $userStatus = "плохо знаете географию";
        break;
    case 2:
        $userStatus = "очень плохо знаете географию";
        break;
    case 1:
        $userStatus = "вообще не знаете географию";
        break;
    case 0:
        $userStatus = "вообще не знаете географию";
}

print "<p>".$username.", вы ".$userStatus."</p>";

?>
</body>
</html>
