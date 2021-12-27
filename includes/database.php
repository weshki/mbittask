<?php

//Params to connect to a database
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "test12345";
$dbName = "subscribeDB";

//Connection to database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(!$conn) {
	die("Database connection failed!");
} 

?>