<?php
require "dbh.php";

$var1 = $_POST['Task_name_edit'];
$var2 = $_POST['Task_description_edit'];
$var3 = $_POST['category_edit'];
$var4 = $_POST['Task_id_edit'];

$sql3 = "UPDATE tasks SET Task_name = '$var1', Task_description = '$var2', category_id = '$var3' 
         WHERE Task_id = '$var4';";

if ($conn->query($sql3) === TRUE) {
  header('Location: ../index.php');
} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;
}      
$conn->close(); 
?>