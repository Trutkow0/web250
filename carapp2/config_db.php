<?php
// config_db.php

$host = 'localhost';
$user = 'phpuser';
$password = 'CpccUser01!';
$database = 'Cars';

$mysqli = new mysqli($host, $user, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}
?>
