<?php
$dbServername = "localhost";
$dbUsername =  "root";
$dbPassword = "";
$dbName = "informaticavosql";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
?>