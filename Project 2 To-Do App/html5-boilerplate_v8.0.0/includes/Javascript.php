<?php
        if($_POST['status']==true) 
            {                   
                require "dbh.php";
                
                $var1 = $_POST['status'];
                $sql001 = "UPDATE tasks SET Finished = 1 
                           WHERE Task_id = '$var1';";

                if ($conn->query($sql001) === TRUE) {
                header('Location: ../index.php');
                } else {
                echo "Error: " . $sql001 . "<br>" . $conn->error;
                }      
                $conn->close(); 
            }
        else
            {   
                require "dbh.php";

                $var1 = $_POST['status'];
                $sql002 = "UPDATE tasks SET Finished = 0 
                           WHERE Task_id = '$var1';";

                if ($conn->query($sql002) === TRUE) {
                header('Location: ../index.php');
                } else {
                echo "Error: " . $sql002 . "<br>" . $conn->error;
                }      
                $conn->close(); 
            }