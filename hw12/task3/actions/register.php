<?php

session_start();

require_once "../classes/Registration.php";

$registration = new Registration($_POST['name'], $_POST['email'], $_POST['password'], $_POST['password_confirmation']);
if (isset($_POST['homeEnter']) && isset($_POST['terms'])) {
    $registration->register();
    Registration::uploadUserAvatar("avatar");
    unset($_SESSION['registrationError']);
} else {
    header("Location: ../registration.php");
    $_SESSION['registrationError'] = "Во время регистрации произошла ошибка. Пожалуйста, проверьте введённые данные.";
}