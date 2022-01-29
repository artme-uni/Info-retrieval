<?php
if(isset($_POST['site']) && $_POST['site'] != "") {
    header("Location: https://" . $_POST['site']);
    exit;
} else {
    $list_sites = array("www.yandex.ru",
        "www.rambler.ru",
        "www.google.com",
        "www.yahoo.com",
        "www.altavista.com");
}
?>

<html>
    <body>
        <form action = "<?php print $_SERVER['PHP_SELF'] ?>" method="POST">
            <select name="site">
                <option value = "">Поисковые системы:</option>
                <?php
                    for ($i = 0; $i < count($list_sites); $i++) {
                        echo "<option value = \"$list_sites[$i]\"> $list_sites[$i]";
                    }
                ?>
            </select>
            <input type="submit" value="Перейти">
        </form>
    </body>
</html>