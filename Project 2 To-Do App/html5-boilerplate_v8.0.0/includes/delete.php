<?php
require "dbh.php";

$sql4 = "DELETE FROM tasks WHERE `Task_id` = '".$_POST['task_del']."';";

if ($conn->query($sql4) === TRUE) {
  header('Location: ../index.php');
} else {
  echo "Error: " . $sql4 . "<br>" . $conn->error;
}      
$conn->close();
?>