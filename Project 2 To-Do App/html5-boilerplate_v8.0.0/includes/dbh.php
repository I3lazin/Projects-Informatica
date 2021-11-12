<?php
$dbServername = "localhost";
$dbUsername =  "root";
$dbPassword = "";
$dbName = "to-do-planner";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
?>