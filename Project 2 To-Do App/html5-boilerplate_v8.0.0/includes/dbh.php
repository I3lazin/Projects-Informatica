<?php
$dbServername = "localhost";
$dbUsername =  "root";
$dbPassword = "";
$dbName = "planner";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
?>