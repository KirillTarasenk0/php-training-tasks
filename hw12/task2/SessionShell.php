<?php

class SessionShell
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
    public function set(string $name, mixed $value): void
    {
        if (!isset($_SESSION[$name])) {
            $_SESSION[$name] = $value;
        }
    }
    public function get(string $name): mixed
    {
        return $_SESSION[$name];
    }
    public function del(string $name): void
    {
        unset($_SESSION[$name]);
    }
    public function exists(string $name): bool
    {
        if (isset($_SESSION[$name])) {
            return true;
        } else {
            return false;
        }
    }
    public function destroy(): void
    {
        session_destroy();
    }
}