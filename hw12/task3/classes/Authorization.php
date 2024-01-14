<?php

require_once "../interfaces/IAuthorization.php";

final class Authorization implements IAuthorization
{
    public function checkUserEmail(string $email): bool
    {
        if ($email === $_COOKIE['userEmail']) {
            return true;
        } else {
            return false;
        }
    }
    public function checkUserPassword(string $password): bool
    {
        if ($password === $_COOKIE['userPassword']) {
            return true;
        } else {
            return false;
        }
    }
    public function userAuthorize(string $email, string $password): void
    {
        if ($this->checkUserEmail($email) && $this->checkUserPassword($password)) {
            header("Location: ../home.php");
        } else {
            header("Location: ../authorization.php");
            $_SESSION['authorizationError'] = "Во время авторизации что-то пошло не так. Пожалуйста, проверьте введённые данные.";
        }
    }
}