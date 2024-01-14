<?php

require_once "./SessionShell.php";
$session = new SessionShell();
$session->set("first", "1");
echo $session->get("first") . "<br>";
$session->del("first");
echo $session->exists("first") . "<br>";
$session->set("second", 2);
echo $session->exists("second") . "<br>";
$session->destroy();