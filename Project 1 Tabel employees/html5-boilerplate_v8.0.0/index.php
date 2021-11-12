<?php
include_once "includes/dbh.php";
include_once "includes/Javascipt.php";
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
    <a href="#" class="navbar-brand mb-0 h1" onclick=clickedButton();>Navbar</a>
    <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item active">
          <a href="#" class="nav-link active" onclick=clickedButton();>
            Home
          </a>
        </li>

        <li class="nav-item active">
          <a href="#" class="nav-link" onclick=clickedButton();>
            Link
          </a>
        </li>

        <!-- Dropdown only works with Google Chrome!!! -->
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a href="../pages/page2.php" class="dropdown-item">Custom canvas 1</a></li>
            <li><a href="../pages/page3.php" class="dropdown-item">Custom canvas 2</a></li>
            <li><a href="../pages/page4.php" class="dropdown-item">Custom canvas 3</a></li>
            <li><a href="../pages/page5.php" class="dropdown-item disabled">Custom canvas 4</a></li>
            <li><a href="../pages/page6.php" class="dropdown-item">Custom canvas 5</a></li>
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





<!-- Creates "All about Employees" section-->
<div class="container-fluid my-class">
  <br>
  <br>
  <br>
  <div class="container"> 
    <h1>All about Employees</h1>
    <p>Hier een lijst van onze employees.<br> Ook kun je hier een nieuwe employee opvoeren.</p>
    <button type="button" class="btn btn-primary btn-lg"  onclick="clickedButton()">Learn More &Gt;</button>
    <br>
    <br>
    <br>
    <br>
  </div>
</div>
<br>

<?php
// Used to create table (Edit $sql for different output)
$sql= "SELECT employee_id, first_name, last_name, department_name
       FROM employees LEFT JOIN departments ON employees.department_id = departments.department_id;";
$result = mysqli_query($conn,$sql);
$resultcheck = mysqli_num_rows($result);
?>

<!-- Creates table (DON'T EDIT THIS!)-->
<div class="container" >
  <table class="table table-striped table-bordered" id="table1">
    <thead class="table-dark">
      <tr>
        <!-- Edit here for extra columns -->
        <th onclick=sortTable(0)>Id</th>
        <th onclick=sortTable(1)>First name</th>
        <th onclick=sortTable(2)>Last name</th>
        <th onclick=sortTable(3)>Department</th>
        <!-- inbetween this -->
      </tr> 
    </thead>
    <?php if ($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <!-- Edit here for extra rows --> 
          <td width="30"><?php echo $row['employee_id']?></td>
          <td width="100"><?php echo $row['first_name']?></td>
          <td width="100"><?php echo $row['last_name']?></td>
          <td><?php echo $row['department_name']?></td>
          <!-- inbetween this -->
        </tr>
      <?php endwhile;?>
    <?php endif;?>
</table>

<!-- Creates "Create new employee area" (DON'T EDIT THIS!)-->
<h3>Create new employee:</h3>
<table class="table table-bordered">
  <form action="includes/insert.php" method="post">
    <thead class="table-dark">
      <tr>
        <!-- Edit here for extra columns --> 
        <th>First name</th>
        <th>Last name</th>
        <th>Department name</th>
        <!-- inbetween this -->
      </tr>
    </thead>
      <!-- Edit here for extra rows --> 
      <td><input type="text" name="first_name"/></td>
      <td><input type="text" name="last_name"/></td>
      <td><select name="department">
            <option value="">None</option>
            <option value="110">Accounting</option>
            <option value="10">Administration</option>
            <option value="90">Executive</option>
            <option value="60">IT</option>
            <option value="20">Marketing</option>
            <option value="80">Sales</option>
            <option value="50">Shipping</option>
      </select><br/></td>
      <!-- inbetween this -->
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" value="Creëer nieuwe employee"/></td>
        
      </tr>
  </form>
</table>

<?php
// Shows first and last name in first select clause (DON'T EDIT THIS!)
$sql5= "SELECT employee_id, first_name, last_name FROM employees ORDER BY employee_id;";
$result2 = mysqli_query($conn,$sql5);
$resultcheck2 = mysqli_num_rows($result2);
?>

<!-- Creates "Edit employee:" area (DON'T EDIT THIS!)-->
<h3>Edit employee:</h3>
<table class="table table-bordered">
  <form action="includes/edit.php" method="post">
    <thead class="table-dark">
      <tr>
        <!-- Edit here for extra columns --> 
        <th>What employee to edit:</th>
        <th>Edit first name to:</th>
        <th>Edit last name to:</th>
        <th>Edit department name to:</th>
        <!-- inbetween this -->
      </tr>
    </thead>
        <!-- Edit here for extra rows --> 
        <td>
          <select name="employee_id_edit">
            <?php if ($result2->num_rows > 0):?>
              <?php while($row2 = $result2->fetch_assoc()):?>
                <option value="<?php echo $row2['employee_id']?>"><?php echo $row2['first_name']." ".$row2['last_name'] ?></option>
              <?php endwhile;?>  
            <?php endif;?>
          </select><br/>
        </td>
        <td><input type="text" name="first_name_edit"/></td>
        <td><input type="text" name="last_name_edit"/></td>
        <td>
          <select name="department_edit">
              <option value="">None</option>
              <option value="110">Accounting</option>
              <option value="10">Administration</option>
              <option value="90">Executive</option>
              <option value="60">IT</option>
              <option value="20">Marketing</option>
              <option value="80">Sales</option>
              <option value="50">Shipping</option>
          </select><br/>
        </td>
        <!-- inbetween this -->
        <!-- ignore below -->
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td><input type="submit" value="Edit employee"/></td>
        </tr>
  </form>
</table>

<?php
// Shows first and last name in first select clause (DON'T EDIT THIS!)
$sql6= "SELECT employee_id, first_name, last_name FROM employees ORDER BY employee_id;";
$result3 = mysqli_query($conn,$sql6);
$resultcheck3 = mysqli_num_rows($result3);
?>

<!-- Creates "Delete employee:" area (DON'T EDIT THIS!) -->
<h3>Delete employee:</h3>
<table class="table table-bordered">   
  <form action="includes/delete.php" method="post">
    <thead class="table-dark">
      <tr>
        <th>Employee to delete</th>
      </tr>
    </thead>
      <td>
        <select name="employee_del">
          <?php if ($result3->num_rows > 0):?>
            <?php while($row3 = $result3->fetch_assoc()):?>
              <option value="<?php echo $row3['employee_id']?>"><?php echo $row3['first_name']." ".$row3['last_name'] ?></option>
            <?php endwhile;?>  
          <?php endif;?>
        </select>
        <input type="submit" value="Delete employee"/>
      </td>  
  </form>
</table>  
<!-- inbetween this -->

<!-- window where to draw -->
<svg width="300" height="300">

  <!-- red background -->
  <rect width="300" height="300" style="fill:rgb(255, 0, 0)" />
  
  <!-- the black circle -->
  <circle cx="150" cy="150" r="150" fill="red" stroke="black" stroke-width="2" />

  <!-- the yellow outline circle -->
  <defs>
    <radialGradient id="grad1" cx="50%" cy="50%" r="45%" fx="50%" fy="50%">
      <stop offset="90%" style="stop-color:rgb(255, 255, 0);stop-opacity:1" />
      <stop offset="100%" style="stop-color:rgb(255, 255, 0);stop-opacity:0" />
    </radialGradient>
  </defs>
  <circle cx="150" cy="150" r="55" fill="url(#grad1)"/>

  <!-- the blue gradiant inner cirle -->
  <defs>
    <radialGradient id="grad2"  cx="50%" cy="50%" r="45%" fx="50%" fy="50%">
      <stop offset="75%" style="stop-color:rgb(0, 0, 255);stop-opacity:1" />
      <stop offset="100%" style="stop-color:rgb(255, 255, 255);stop-opacity:0" />
    </radialGradient>
  </defs>
  <circle cx="150" cy="150" r="50" fill="url(#grad2)"/>
  
  <!-- "Hello Blue Sun text" -->
  <text x="62" y="100" style="font-size:30px;font-style:normal;font-weight:normal;fill:red;fill-opacity:1;stroke:#000000;stroke-width:1px">Hello Blue Sun</text>

  <!-- tilted lines -->
  <line x1="0" y1="0" x2="300" y2="300" style="stroke:rgb(0, 0, 0);stroke-width:2" />
  <line x1="0" y1="300" x2="300" y2="0" style="stroke:rgb(0, 0, 0);stroke-width:2" />
</svg>  
</div>



















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