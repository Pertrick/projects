<?php

session_start();

$dbhost ="localhost:3308";
$username = "root";
$password="";
$dbName= "guestbook";

$conn = mysqli_connect($dbhost, $username, $password, $dbName) or die('Error connecting to database');

?>