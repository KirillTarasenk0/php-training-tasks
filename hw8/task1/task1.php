<?php

session_start();

if (!isset($_SESSION['load'])) {
    $_SESSION['load'] = "Session started. First access.";
} else {
    $_SESSION['load'] = "Last access time: " . date("Y-m-d H:i:s");
}
echo $_SESSION['load'];