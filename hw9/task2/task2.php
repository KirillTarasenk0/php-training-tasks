<?php

session_start();

$fileName = "data.txt";
if (isset($_POST['userName'])) {
    $_SESSION['userName'] = trim($_POST['userName']);
}
if (isset($_POST['userSurname'])) {
    $_SESSION['userSurname'] = trim($_POST['userSurname']);
}
if (isset($_POST['userEmail'])) {
    $_SESSION['userEmail'] = trim($_POST['userEmail']);
}
if (!preg_match("/^[A-z]+@[A-z]+\.([A-z]{2,6})/", $_SESSION['userEmail'])) {
    $_SESSION['emailError'] = "Вы ввели невалидный email. Пожалуйста, повторите ввод.";
    header("Location: secondTaskForm.php");
    exit;
}
$text = $_SESSION['userName'] . ", " . $_SESSION['userSurname'] . ", " . $_SESSION['userEmail'] . " \n";
$file = fopen($fileName, "a");

if (is_writable($fileName)) {
    if (!$file) {
        echo "<p>Не удаётся открыть файл.</p>";
        exit;
    }
    if (fwrite($file, $text) === false) {
        echo "<p>Нельзя ничего записать в файл.</p>";
        exit;
    } else {
        echo "<p>Данные были успешно записаны в файл.</p>";
    }
    fclose($file);
} else {
    echo "<p>Файл {$fileName} непригоден для записи.</p>";
}