<?php

session_start();

require_once "../classes/Authorization.php";

if (isset($_POST['authorizeButton'])) {
    $authorization = new Authorization();
    $authorization->userAuthorize($_POST['email'], $_POST['password']);
}