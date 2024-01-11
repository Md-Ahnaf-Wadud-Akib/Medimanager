<?php  
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "cse";

$con = mysqli_connect ($servername, $username, $password, $db_name);
if(!$con){
    die("connection failed".mysqli_connect_error());
}
date_default_timezone_set('Asia/Dhaka');


?>