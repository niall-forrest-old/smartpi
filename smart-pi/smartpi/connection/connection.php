<?php
include("password.php");

//connect to DB
$user = "nforrest02";

$webserver="localhost";

//database name for MySQL
$db = "nforrest02";

$password = "wxg797cdrk8b4yjb";


$conn = mysqli_connect($webserver, $user, $password, $db);

if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

