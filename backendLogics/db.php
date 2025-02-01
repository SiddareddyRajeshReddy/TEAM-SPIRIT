<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "teamspirit";

$conn = mysqli_connect($servername, $username, $password, $db);
date_default_timezone_set('Asia/Kolkata');
if(!$conn)
    die("Connection Failed".mysqli_connect_error())
?>