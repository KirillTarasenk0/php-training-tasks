<?php

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class);
    require_once $path .'.php';
});

use app\Models\User;
use app\Controllers\UserController;

$user = new User("Kirill", 19);
$user->showUserInfo();
$userController = new UserController();