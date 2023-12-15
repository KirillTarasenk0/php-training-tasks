<?php

$users = ['Ivan Ivanov', 'Arkadiy Bulkin'];
$userPassword = null;
$confirmedPassword = null;
$userStatus = true;
if (isset($_POST['userEmail'])) {
    $userEmail = strtolower($_POST['userEmail']);
    if (!preg_match("/^[a-z]+@[a-z]+\.([a-z]{2,6})/", $userEmail)) {
        echo "<p>Email введён неверно. Пожалуйста, вернитесь на <a href='view.php'>главную страницу</a> для повторного ввода.</p>";
        $userStatus = false;
    }
}
if (empty($_POST['userEmail'])) {
    echo "<p>Вы не ввели email. Пожалуйста, вернитесь на <a href='view.php'>главную страницу</a> для повторного ввода.</p>";
    $userStatus = false;
}
if (isset($_POST['userName']['name']) && isset($_POST['userName']['surname'])) {
    $userName = $_POST['userName']['name'] . " " . $_POST['userName']['surname'];
    if (in_array($userName, $users)) {
        echo "<p>Пользователь с таким именем уже существует. Пожалуйста, вернитесь на <a href='view.php'>главную страницу</a> для повторного ввода.</p>";
        $userStatus = false;
    }
}
if (empty($_POST['userName']['name']) || empty($_POST['userName']['surname'])) {
    echo "<p>Вы не ввели имя/фамилию. Пожалуйста, вернитесь на <a href='view.php'>главную страницу</a> для повторного ввода.</p>";
    $userStatus = false;
}
if (isset($_POST['userPassword'])) {
    $userPassword = $_POST['userPassword'];
}
if (empty($_POST['userPassword'])) {
    echo "<p>Вы не ввели пароль. Пожалуйста, вернитесь на <a href='view.php'>главную страницу</a> для повторного ввода.</p>";
    $userStatus = false;
}
if (isset($_POST['passwordConfirmation'])) {
    $confirmedPassword = $_POST['passwordConfirmation'];
}
if (empty($_POST['passwordConfirmation'])) {
    echo "<p>Вы не ввели пароль для подтверждения. Пожалуйста, вернитесь на <a href='view.php'>главную страницу</a> для повторного ввода.</p>";
    $userStatus = false;
}
if ($userPassword !== $confirmedPassword && isset($_POST['userPassword']) && isset($_POST['passwordConfirmation'])) {
    echo "<p>Вы не смогли подтвердить пароль. Пожалуйста, вернитесь на <a href='view.php'>главную страницу</a> для повторного ввода.</p>";
    $userStatus = false;
}
if ($userStatus === true) {
    echo "<p>Поздравляю! Вы были успешно зарегистрированы!</p>";
}