<?php

$mysql_user = "root";
$con = mysqli_connect("localhost", $mysql_user, "", "labs");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

function show($queryNumber, $result) {
    echo "Запрос $queryNumber<br>";

    while($row = mysqli_fetch_array($result)) {
        foreach ($row as $element) {
            echo "$element - ";
        }
        echo "<br>";
    }
//    while($row = mysqli_fetch_array($result)) {
//        print_r($row);
//        echo "<br>";
//    }
    echo "<br>";
}

echo '<pre>';

# 1. Напишите запрос, который выводит все строки из таблицы Покупателей, для которых номер продавца равен 1001.

$query = "SELECT *
    FROM cust
    WHERE SNUM = 1001;";

show(1, mysqli_query($con, $query));

# 2. Напишите запрос, который выводит таблицу Продавцов со столбцами в следующем порядке: city, sname, snum, comm.

$query = "SELECT city, sname, snum, comm
    FROM sal;";

show(2, mysqli_query($con, $query));

# 3. Напишите запрос, который выводит оценку (rating), сопровождаемую именем каждого покупателя в городе San Jose.

$query = "SELECT RATING, CNAME
    FROM cust
    WHERE CITY = 'San Jose';";

show(3, mysqli_query($con, $query));

# 4. Напишите запрос, который выводит значение номера продавца всех продавцов из таблицы Заказов без каких бы то ни было повторений.

$query = "SELECT DISTINCT SNUM
    FROM ord;";

show(4, mysqli_query($con, $query));

# 5. Напишите запрос, который может выдать вам поля sname и city для всех продавцов в Лондоне с комиссионными строго больше 0.11

$query = "SELECT SNAME, CITY
    FROM sal
    WHERE (COMM > 0.11 && CITY = 'LONDON');";

show(5, mysqli_query($con, $query));

# 6. Напишите запрос к таблице Покупателей, который может вывести данные обо всех покупателях с рейтингом меньше или равным 200, если они не находятся в Риме

$query = "select *
    from cust
    where (rating <= 200 or city = 'Rome');";

show(6, mysqli_query($con, $query));

# 7. Запросите двумя способами все заказы на 3 и 5 октября 1990 г.

$query = "SELECT *
    FROM ord
    WHERE ODATE IN ('03-OCT-90', '05-OCT-90');";

show(7.1, mysqli_query($con, $query));

$query = "SELECT *
    FROM ord
    WHERE (ODATE = '03-OCT-90' OR ODATE = '05-OCT-90');";

show(7.1, mysqli_query($con, $query));

# 8. Напишите запрос, который может вывести всех покупателей, чьи имена начинаются с буквы, попадающей в диапазон от A до G.

$query = "SELECT *
    FROM cust
    WHERE CNAME BETWEEN 'A' AND 'G';";

show(8, mysqli_query($con, $query));

# 9. Напишите запрос, который выберет всех продавцов, имена которых содержат букву e.

$query = "SELECT *
    FROM sal
    WHERE SNAME LIKE '%e%';";

show(9, mysqli_query($con, $query));

# 10. Напишите запрос, который сосчитал бы сумму всех заказов на 3 октября 1990 г.

$query = "SELECT SUM(AMT)
    FROM ord
    WHERE ODATE = '03-OCT-90';";

show(10, mysqli_query($con, $query));

# 11. Напишите запрос, который сосчитал бы сумму всех заказов для продавца с номером 1001

$query = "SELECT SUM(AMT)
    FROM ord
    WHERE SNUM = 1001;";

show(11, mysqli_query($con, $query));

# 12. Напишите запрос, который выбрал бы наибольший заказ для каждого продавца.

$query = "SELECT SNUM, MAX(AMT)
    FROM ord
    GROUP BY SNUM;";

show(12, mysqli_query($con, $query));

# 13. Напишите запрос, который выбрал бы покупателя, чье имя является первым в алфавитном порядке среди имен, заканчивающихся на букву s.

$query = "SELECT MIN(cname)
    FROM cust
    WHERE CNAME LIKE '%s';";

show(13, mysqli_query($con, $query));

# 14. Напишите запрос, который выбрал бы средние комиссионные в каждом городе.

$query = "SELECT CITY, AVG(COMM)
    FROM sal
    GROUP BY CITY;";

show(14, mysqli_query($con, $query));

# 15. Напишите запрос, который вывел бы для каждого заказа на 3 октября его номер, стоимость заказа в евро (1$=0.8 евро), имя продавца и размер комиссионных, полученных продавцом за этот заказ.

$query = "SELECT 0.8 * AMT, ONUM, SNAME, COMM
    FROM ord, sal
    WHERE (ODATE = '03-OCT-90' && ord.SNUM = sal.SNUM);";

show(15, mysqli_query($con, $query));

# 16. Напишите запрос, который выводит номера заказов в возрастающем порядке, а также имена продавцов и покупателей заказов, продавец которых находится в Лондоне или Риме.

$query = "SELECT ONUM, SNAME, CNAME
    FROM sal, cust, ord
    WHERE (sal.CITY IN ('LONDON', 'ROME') && (sal.SNUM = ord.SNUM && ord.CNUM = cust.CNUM))
    ORDER BY ONUM;";

show(16, mysqli_query($con, $query));

# 17. Запросите имена продавцов в алфавитном порядке, суммарные значения их заказов, совершенных до 5 октября, и полученные комиссионные.

$query = "SELECT SNAME, SUM(AMT), SUM(COMM)
    FROM sal, ord
    WHERE (ord.ODATE < '05-OCT-90' && (sal.SNUM = ord.SNUM))
    GROUP BY SNAME
    ordER BY SNAME;";

show(17, mysqli_query($con, $query));

# 18. Выведите номера заказов, их стоимость и имена продавцов и покупателей, если продавцы и покупатели находятся в городах, чьи названия начинаются с букв из диапазона от L до R.

$query = "SELECT ONUM, AMT, CNAME, SNAME
    FROM ord, cust, sal
    WHERE ord.CNUM = cust.CNUM 
           AND ord.SNUM = sal.SNUM 
           AND sal.CITY BETWEEN 'L' AND 'R' 
           AND cust.CITY BETWEEN 'L' AND 'R';";

show(18, mysqli_query($con, $query));

# 19. Запросите все пары покупателей, обслуживаемые одним и тем же продавцом. Исключите комбинации покупателей с самими собой, а также пары в обратном порядке.

$query = "SELECT sname, sal.snum, A.cname, B.cname
    FROM cust A, cust B, sal
    WHERE A.snum = B.snum
      AND sal.snum = B.snum
      AND A.cnum < B.cnum;";

show(19, mysqli_query($con, $query));

# 20. С помощью подзапроса выведите имена всех покупателей, чьи продавцы имеют комиссионные меньше 0.13.

$query = "SELECT CNAME
    FROM cust
    WHERE SNUM IN
      (SELECT SNUM FROM sal WHERE COMM < 0.13);";

show(20, mysqli_query($con, $query));

# 21. Напишите команду, создающую копию таблицы Продавцов с одновременным копированием данных из SAMPLE.SAL. Убедитесь в сходности структур таблиц при помощи команды DESC и идентичности данных в таблице-оригинале и таблице-копии.

$query = "CREATE TABLE sal_COPY(
        snum  int(4)       NOT NULL,
        sname varchar(10)  NOT NULL,
        city  varchar(10)  NOT NULL,
        comm  double(7, 2) NOT NULL,
        PRIMARY KEY (snum)
    ) AS
    SELECT*
    FROM sal;

    DESC sal_COPY;";

# 22. Напишите последовательность команд, которая вставляет две новые записи в вашу таблицу Продавцов, выводит таблицу после вставки, удаляет одну запись о новом продавце и вновь выводит таблицу.

$query = "INSERT INTO sal
        VALUES (1000, 'NASTYA', 'TOMSK', 0.99);
    INSERT INTO sal
        VALUES (1010, 'MAKSIM', 'TULA', 1.9);

    SELECT*
    FROM sal;

    DELETE
    FROM sal
    WHERE SNUM = 1010;

    SELECT*
    FROM sal;";

# 23. Напишите последовательность команд, которая вставляет две строки в вашу таблицу Продавцов, увеличивает в 2 раза комиссионные у всех продавцов и выводит содержимое таблицы после каждого изменения.

$query = "INSERT INTO sal
        VALUES (101, 'Nastya', 'Moscow', 0.965);

    INSERT INTO sal
        VALUES (190, 'wiliam', 'Omsk', 1.5);

    UPDATE sal
        SET COMM=COMM * 2;

    SELECT*
FROM sal;";