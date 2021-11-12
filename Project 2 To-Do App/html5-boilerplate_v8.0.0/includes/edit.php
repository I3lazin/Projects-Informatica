<?php
require "dbh.php";

$var1 = $_POST['first_name_edit'];
$var2 = $_POST['last_name_edit'];
$var3 = $_POST['department_edit'];
$var4 = $_POST['employee_id_edit'];

$sql3 = "UPDATE employees SET first_name = '$var1', last_name = '$var2', department_id = '$var3' 
         WHERE employee_id = '$var4';";

if ($conn->query($sql3) === TRUE) {
  header('Location: ../index.php');
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}      
$conn->close(); 
?>