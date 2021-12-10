<html>
<script>
function changefinishedstatus() {
        if(document.getElementByName('status').checked==true) 
            {
                <?php    
                require "dbh.php";
                
                $var1 = $_POST['status'];
                $sql001 = "UPDATE tasks SET Finished = 1 
                           WHERE Task_id = '$var1';";

                if ($conn->query($sql001) === TRUE) {
                header('Location: C:\xampp\htdocs\Project 2 To-Do App\html5-boilerplate_v8.0.0\index.php');
                } else {
                echo "Error: " . $sql001 . "<br>" . $conn->error;
                }      
                $conn->close(); 
                ?>
            }
        else
            {
                <?php 
                require "dbh.php";

                $var1 = $_POST['status'];
                $sql002 = "UPDATE tasks SET Finished = 0 
                           WHERE Task_id = '$var1';";

                if ($conn->query($sql002) === TRUE) {
                header('Location: C:\xampp\htdocs\Project 2 To-Do App\html5-boilerplate_v8.0.0\index.php');
                } else {
                echo "Error: " . $sql002 . "<br>" . $conn->error;
                }      
                $conn->close(); 
                ?>
            }
}
</script>

</html>