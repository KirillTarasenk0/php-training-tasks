<?php

require_once "../interfaces/IRegistration.php";
require_once "../traits/UploadImage.php";

final class Registration implements IRegistration
{
    use UploadImage;
    public function __construct(
        private string $userName,
        private string $userEmail,
        private string $userPassword,
        private string $userConfirmationPassword)
    {
    }
    public function getUserName(): string
    {
        return $this->userName;
    }
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }
    public function getUserPassword(): string
    {
        return $this->userPassword;
    }
    public function getUserConfirmationPassword(): string
    {
        return $this->userConfirmationPassword;
    }
    public function emailValidation(string $email): bool
    {
        if (preg_match("/^(\S+)@[A-z]{1,10}.[A-z]{1,6}/", $email)) {
            return true;
        } else {
            return false;
        }
    }
    public function passwordValidation(string $password): bool
    {
        if (preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}/", $password)) {
            return true;
        } else {
            return false;
        }
    }
    public function passwordCheck(string $mainPassword, string $confirmationPassword): bool
    {
        if (!strcmp($mainPassword, $confirmationPassword)) {
            return true;
        } else {
            return false;
        }
    }
    public function saveUserData(): void
    {
        setcookie('userName', $this->userName, time()+60*60*24*30);
        $_COOKIE['userName'] = $this->userName;
        setcookie('userEmail', $this->getUserEmail(), time()+60*60*24*30);
        $_COOKIE['userEmail'] = $this->getUserEmail();
        setcookie('userPassword', $this->getUserPassword(), time()+60*60*24*30);
        $_COOKIE['userPassword'] = $this->getUserPassword();
    }
    public function register(): void
    {
        if ($this->emailValidation($this->getUserEmail()) &&
            $this->passwordValidation($this->getUserPassword()) &&
            $this->passwordCheck($this->getUserPassword(), $this->getUserConfirmationPassword())) {
            $this->saveUserData();
            $_SESSION['registrationInfo'] = "Регистрация прошла успешно!";
            header("Location: ../home.php");
        } else {
            $_SESSION['registrationError'] = "Во время регистрации произошла ошибка. Пожалуйста, проверьте введённые данные.";
            header("Location: ../registration.php");
        }
    }
}