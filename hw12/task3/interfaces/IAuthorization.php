<?php

interface IAuthorization
{
    public function checkUserEmail(string $email): bool;
    public function checkUserPassword(string $password): bool;
    public function userAuthorize(string $email, string $password): void;
}