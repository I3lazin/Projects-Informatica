<?php
include_once "includes/dbh.php";
?>  

<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>TJSJ - All About Employees</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .my-class {
      background-color: #eeeeee;
    }      
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>



<body>

<!-- PLEASE JUST DON'T TOUCH THIS IT'S A PAIN IN THE ASS -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container">
    <a href="#" class="navbar-brand mb-0 h1">Planner</a>
    <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item active">
          <a href="#" class="nav-link active">
            Home
          </a>
        </li>

        <li class="nav-item active">
          <a href="#" class="nav-link">
            Link
          </a>
        </li>

        <!-- Dropdown only works with Google Chrome!!! -->
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a href="" class="dropdown-item">1</a></li>
            <li><a href="" class="dropdown-item">2</a></li>
            <li><a href="" class="dropdown-item">3</a></li>
            <li><a href="" class="dropdown-item">4</a></li>
            <li><a href="" class="dropdown-item">5</a></li>
          </ul>
        </li>

        <li class="nav-item active">
          <a href="" class="nav-link disabled">
            Disabled
          </a>
        </li>
      </ul>
    </div>
    <form class="d-flex">
      <input type="text" class="form-control me-2" placeholder="Search...">
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>
</nav>



<?php
// Used to create table (Edit $sql for different output)
$sql= "SELECT Task_id, Task_name, Task_description, Finished, Category  
       FROM `tasks` LEFT JOIN categories ON tasks.Category_id = categories.Category_id
       ORDER BY Finished DESC;";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);
?>

<!-- Creates table (DON'T EDIT THIS!)-->
<div class="container">
  <table class="table table-striped table-bordered">
    <thead class="table-dark">
      <tr>
        <!-- Edit here for extra columns -->
        <th width="100">Task</th>
        <th>Description</th>
        <th width="100">Category</th>
        <th width="10">Finished?</th>
        <!-- inbetween this -->
      </tr> 
    </thead>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <!-- Edit here for extra rows --> 
          <td width="30"><?php echo $row['Task_name'] ?></td>
          <td width="100"><?php echo $row['Task_description']?></td>
          <td><?php echo $row['Category']?></td>
          <td width="10">
            <form method="POST" action="/Project 2 To-Do App/html5-boilerplate_v8.0.0/includes/Javascript.php" onsubmit="">
              <input type="hidden"   value="0_<?php echo $row['Task_id']?>" name="status">
              <input type="checkbox" value="1_<?php echo $row['Task_id']?>" name="status" <?php if($row['Finished'] == 0) print("checked")?> onchange="this.form.submit()"/>           
            </form>      
          </td>
          <!-- inbetween this -->
        </tr>
      <?php endwhile;?>
</table>

<!-- Creates "Create new employee area" (DON'T EDIT THIS!)-->
<h3>Create new task</h3>
<table class="table table-bordered">
  <form action="includes/insert.php" method="post">
    <thead class="table-dark">
      <tr>
        <!-- Edit here for extra columns --> 
        <th>Task name</th>
        <th>Description</th>
        <th>Category</th>
        <!-- inbetween this -->
      </tr>
    </thead>
      <!-- Edit here for extra rows --> 
      <td><input type="text" name="Task" placeholder="1, 2, 3, 4, 5, etc."/></td>
      <td><input type="text" name="Description"/></td>
      <td><select name="Category">
            <option value="">None</option>
            <option value="1">School Homework</option>
            <option value="2">Household</option>
            <option value="3">Leisure</option>
      </select><br/></td>
      <!-- inbetween this -->
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" value="Create new task"/></td>
        
      </tr>
  </form>
</table>

<?php
// Shows first and last name in first select clause (DON'T EDIT THIS!)
$sql5= "SELECT Task_id, Task_name, Task_description FROM tasks ORDER BY Task_id";
$result2 = mysqli_query($conn,$sql5);
$resultcheck2 = mysqli_num_rows($result2);
?>

<!-- Creates "Edit employee:" area (DON'T EDIT THIS!)-->
<h3>Edit task:</h3>
<table class="table table-bordered">
  <form action="includes/edit.php" method="post">
    <thead class="table-dark">
      <tr>
        <!-- Edit here for extra columns --> 
        <th>What Task to edit:</th>
        <th>Edit Task:</th>
        <th>Edit Description:</th>
        <th>Edit:</th>
        <!-- inbetween this -->
      </tr>
    </thead>
        <!-- Edit here for extra rows --> 
        <td>
          <select name="Task_id_edit">
            <?php if ($result2->num_rows > 0):?>
              <?php while($row2 = $result2->fetch_assoc()):?>
                <option value="<?php echo $row2['Task_id']?>"><?php echo $row2['Task_name'].": ".$row2['Task_description'] ?></option>
              <?php endwhile;?> 
            <?php endif;?>
          </select><br/>
        </td>
        <td><input type="text" name="Task_name_edit"/></td>
        <td><input type="text" name="Task_description_edit"/></td>
        <td>
          <select name="category_edit">
              <option value="">None</option>
              <option value="1">School_HW</option>
              <option value="2">Householding</option>
              <option value="3">Leisure</option>
          </select><br/>
        </td>
        <!-- inbetween this -->
        <!-- ignore below -->
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td><input type="submit" value="Edit task"/></td>
        </tr>
  </form>
</table>

<?php
//Shows first and last name in first select clause (DON'T EDIT THIS!)
$sql6= "SELECT Task_id, Task_name, Task_description FROM tasks ORDER BY Task_id;";
$result3 = mysqli_query($conn,$sql6);
$resultcheck3 = mysqli_num_rows($result3);
?>

<!-- Creates "Delete employee:" area (DON'T EDIT THIS!) -->
<h3>Delete task:</h3>
<table class="table table-bordered">   
  <form action="includes/delete.php" method="post">
    <thead class="table-dark">
      <tr>
        <th>Employee to delete</th>
      </tr>
    </thead>
      <td>
        <select name="task_del">
          <?php if ($result3->num_rows > 0):?>
            <?php while($row3 = $result3->fetch_assoc()):?>
              <option value="<?php echo $row3['Task_id']?>"><?php echo $row3['Task_name'].": ".$row3['Task_description'] ?></option>
            <?php endwhile;?>  
          <?php endif;?>
        </select>
        <input type="submit" value="Delete task"/>
      </td>  
  </form>
</table> 



  <script>
  window.onload = function () {
      document.getElementById("Checkboxes").onclick = function(){
          alert("Yahooo");
      }
  }
  </script> 
              


  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>