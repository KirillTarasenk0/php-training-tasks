<?php
require_once "DB.php";
$db = DB::getInstance();
$db->connect("localhost", "tmslessons", "root", "");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW30</title>
</head>
<body>
<div>
    <form action="index.php" method="GET">
        <label for="select">Для получения данных из базы введите запрос сюда:</label>
        <div><input type="text" name="selectData" placeholder="Введите запрос"/></div>
        <button name="selectBtn" type="submit">Отправить</button>
        <?php
        //SELECT * FROM offices WHERE city = 'London'
        if (isset($_GET['selectBtn'])) {
            print_r($db->getData($_GET['selectData']));
        }
        ?>
    </form>
    <form action="index.php" method="GET">
        <label for="select">Для вставки данных в базу введите запрос сюда:</label>
        <div><input name="insertQuery" type="text" placeholder="Введите запрос"/></div>
        <label for="insertData">Введите через запятую данные, которые хотите вставить в базу данных</label>
        <div><input id="insertData" name="insertData" type="text" placeholder="Введите данные"></div>
        <button name="insertBtn" type="submit">Отправить</button>
        <?php
        if (isset($_GET['insertBtn'])) {
            $insertArray = explode(",", trim($_GET['insertData']));
            //INSERT INTO offices (officeCode, city, phone, addressLine1, addressLine2, state, country, postalCode, territory) values (:officeCode, :city, :phone, :addressLine1, :addressLine2, :state, :country, :postalCode, :territory)
            //11, Minsk, +375447967653, Prospekt Nezavisimosti, Number 300, BY, Belarus, 6523, MNSK
            $db->writeData($_GET['insertQuery'], $insertArray);
        }
        ?>
    </form>
    <form action="index.php" method="GET">
        <label for="updateSelect">Для обновления данных в базе введите запрос сюда:</label>
        <div><input id="updateSelect" name="updateSelect" type="text" placeholder="Введите запрос"/></div>
        <label for="updateData">Введите данные, которые хотите вставить в таблицу</label>
        <div><input id="updateData" name="updateData" type="text" placeholder="Введите данные"/></div>
        <button name="updateBtn" type="submit">Отправить</button>
        <?php
        if (isset($_GET['updateBtn'])) {
            $updateArray = explode(",", trim($_GET['updateData']));
            //UPDATE offices SET city = :city WHERE city = 'Boston'
            //Moscow
            $db->updateData($_GET['updateSelect'], $updateArray);
        }
        ?>
    </form>
    <form action="index.php" method="GET">
        <label for="deleteQuery">Для удаления данных из базы введите запрос сюда:</label>
        <div><input name="deleteQuery" id="deleteQuery" type="text" placeholder="Введите запрос"/></div>
        <label for="deleteData">Введите данные, которые хотите удалить из таблицы</label>
        <div><input id="deleteData" name="deleteData" type="text" placeholder="Введите данные"/></div>
        <button name="deleteBtn" type="submit">Отправить</button>
        <?php
        if (isset($_GET['deleteBtn'])) {
            //DELETE FROM offices WHERE officeCode = :officeCode
            //11
            $dataToDelete = explode(",", trim($_GET['deleteData']));
            $db->deleteData($_GET['deleteQuery'], $dataToDelete);
        }
        ?>
    </form>
    <form action="index.php" method="get">
        <label for="log">Нажмите на кнопку, чтобы вывести лог ошибок</label>
        <button name="logBtn">Отправить</button>
        <?php
        if (isset($_GET['logBtn'])) {
            $db->log();
        }
        ?>
    </form>
</div>
</body>
</html>