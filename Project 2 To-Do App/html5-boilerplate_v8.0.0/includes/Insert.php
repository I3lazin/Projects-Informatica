<?php
require "dbh.php";
 
$sql2 = "INSERT INTO tasks (`Task_name`, `Task_description`, `Category_id`)
         VALUES ('".$_POST['Task']."', '". $_POST['Description']."','".$_POST['Category']."');";

if ($conn->query($sql2) === TRUE) {
  header('Location: ../index.php');
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}      
$conn->close();
?>