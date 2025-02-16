<?php
  session_start();
  $_SESSION['application_id'] = $_GET['id'];
  require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap.min.css">
  <title>Update Application </title>
</head>

<body>
<header class="main-header" style="background-color: #EBEAFF;">


<nav class="navbar navbar-expand-lg navbar-light" style="margin-left: 40px;">
    <a class="navbar-brand" href="#">Job Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="margin-right: 40px;">
        <ul class="navbar-nav">
            
        <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../job.php">Find Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            
        </ul>
    </div>
</nav>

</header>

  <?php
    $sql = "SELECT * FROM application WHERE application_id = '$_GET[id]';";
    $result = $conn->query($sql);
    if($result){
      $row = $result->fetch_assoc();
    }
  ?>
     
  <section style="margin-top: 100px;">
    <div class="container">
      <div class="row">
       
    
        <div class="col-md-4">
        <h3> Edit Application </h3>
            
          <form action="updateApplication.php" method="post" role="form" enctype="multipart/form-data">

            <div class="form-group mb-2">
            <label> Alternative Number</label>
              <input class="form-control" type="text" id="alnumber" name="alnumber" placeholder="Alternative Number" value = "<?php echo $row['alternative_number']?>" required>
              <?php if (isset($_SESSION['errors']['number'])) {?>
                  <p class="text-danger"><?php echo $_SESSION['errors']['number'] ?></p>
             <?php } ?>
            </div>
            <div class="form-group mb-2">
            <label> Alternative Email </label>
              <input class="form-control" type="email" id="alemail" name="alemail" placeholder="Alternative Email" value = "<?php echo $row['alternative_email']?>" required>
            </div>
            <div class="form-group mb-2">
            <label> Expected Salary </label>
                <input class="form-control" type="number" id="esalary" name="esalary" placeholder="Expected Salary" value = "<?php echo $row['expected_salary']?>" required>
              </div>
              <div class="form-group mb-2">
                  <label style="color:green;">Upload Resume</label>
                  <input type="file" name="resume" class="btn btn-gray"> 
                  <?php if (isset($_SESSION['errors']['file'])) {?>
                      <p class="text-danger"><?php echo $_SESSION['errors']['file'] ?></p>
                  <?php } ?>
              </div>

            <div class="form-group mb-2">
              <button class="btn btn-flat btn-success">Update</button>
            </div>
        </div>
        <div class="col-md-4">


          <div class="form-group mb-2 mt-5">
            
        
        </div>
        </form>

      </div>
    </div>
  </section>
  <?php
    unset($_SESSION['errors']);
  ?>
  <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>