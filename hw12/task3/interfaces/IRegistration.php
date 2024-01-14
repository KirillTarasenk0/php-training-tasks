<?php

interface IRegistration
{
    public function emailValidation(string $email): bool;
    public function passwordValidation(string $password): bool;
    public function passwordCheck(string $mainPassword, string $confirmationPassword): bool;
    public function saveUserData(): void;
    public function register(): void;
}