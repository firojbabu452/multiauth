<?php
include './db/connect.php';
session_start(); // Start the session

// Unset all session variables
$_SESSION = array();

// Destroy the session

session_destroy();

header('Location: login.php');


exit;
?>
