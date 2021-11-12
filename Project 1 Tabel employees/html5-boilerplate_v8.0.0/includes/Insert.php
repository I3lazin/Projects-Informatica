<?php
require "dbh.php";
 
$sql2 = "INSERT INTO employees (`first_name`, `last_name`, `department_id`)
         VALUES ('".$_POST['first_name']."', '". $_POST['last_name']."','".$_POST['department']."');";

if ($conn->query($sql2) === TRUE) {
  header('Location: ../index.php');
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}      
$conn->close();
?>