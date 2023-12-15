<?php

session_start();

if (isset($_SESSION['counter'])) {
    $_SESSION['counter']++;
} else {
    $_SESSION['counter'] = 1;
}
echo "Вы посетили данную страницу: " . $_SESSION['counter'] . " раз.<br>";

echo "Ваш логин: " . $_SESSION['login'] . "<br>";
echo "Ваш пароль: " . $_SESSION['password'] . "<br>";

if ($_SESSION['counter'] > 5) {
    header("Location: login.php");
    unset($_SESSION['login']);
    unset($_SESSION['password']);
}