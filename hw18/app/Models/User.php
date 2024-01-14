<?php

namespace app\Models;

class User
{
    public function __construct(
        private string $userName,
        private int $userAge
    ) {}
    public function getUserName(): string
    {
        return $this->userName;
    }
    public function getUserAge(): int
    {
        return $this->userAge;
    }
    public function setUserAge(int $userAge): void
    {
        $this->userAge = $userAge;
    }
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }
    public function showUserInfo(): void
    {
        echo "User name: $this->userName, User age: $this->userAge<br>";
    }
}