<?php
require "dbh.php";

$sql4 = "DELETE FROM employees WHERE `employee_id` = ('".$_POST['employee_del']."');";

if ($conn->query($sql4) === TRUE) {
  header('Location: ../index.php');
} else {
  echo "Error: " . $sql4 . "<br>" . $conn->error;
}      
$conn->close();
?>