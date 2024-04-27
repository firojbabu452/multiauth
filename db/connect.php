<?php

$dbHost = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'multiuser'; 


$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
};
?>
