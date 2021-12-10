<html>
<script>
function copycheck(from,to) {
        
        if(document.getElementById(from).checked==true) 
        //checks status of "from" element. change to whatever validation you prefer.
            {
                document.getElementById(to).checked=true;
                <?php    
                /*
                require "dbh.php";

                $var1 = 

                $sql001 = "UPDATE tasks SET Finished = 1 
                           WHERE Task_id = '$var1';";

                if ($conn->query($sql001) === TRUE) {
                header('Location: ../index.php');
                } else {
                echo "Error: " . $sql001 . "<br>" . $conn->error;
                }      
                $conn->close(); */
                ?>
            }
        else
            {   
                document.getElementById(to).checked=false; 
                <?php /*
                require "dbh.php";

                $var1 = 

                $sql002 = "UPDATE tasks SET Finished = 0 
                           WHERE Task_id = '$var1';";

                if ($conn->query($sql002) === TRUE) {
                header('Location: ../index.php');
                } else {
                echo "Error: " . $sql002 . "<br>" . $conn->error;
                }      
                $conn->close(); */
                ?>
                 //if validation returns true, unchecks target checkbox
            }
}
</script>

</html>