<?php
  session_start();
  require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../bootstrap.min.css">
  <title>Update Profile </title>
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
    $sql = "SELECT * FROM job_seeker WHERE job_seeker_id = '$_SESSION[job_seeker_id]';";
    $result = $conn->query($sql);
    if($result){
      $row = $result->fetch_assoc();
    }
  ?>
     
  <section style="margin-top: 100px;">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>Welcome <?php echo $row['first_name']." ".$row['last_name']?><b></b></h3>
          <div class="">
              <?php if (!empty($row['profile_picture'])){?>
                 <img src = "uploads/profile/<?php echo $row['profile_picture']; ?>" class = "img-fluid rounded-circle">
                  <?php } ?>
          </div>
        </div>
    
        <div class="col-md-4">
        <h3> Edit Profile </h3>
            
          <form action="updateProfile.php" method="post" role="form" enctype="multipart/form-data">

            <div class="form-group mb-2">
            <label> First Name </label>
              <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name" value = "<?php echo $row['first_name']?>" required>
            </div>
            <div class="form-group mb-2">
            <label> Last Name </label>
              <input class="form-control" type="text" id="lname" name="lname" placeholder="Last Name" value = "<?php echo $row['last_name']?>" required>
              <?php if (isset($_SESSION['errors']['name'])) {?>
                <p class="text-danger"><?php echo $_SESSION['errors']['name'] ?></p>
              <?php } ?>
            </div>
            <div class="form-group mb-2">
            <label> Email </label>
                <input class="form-control" type="text" id="email" name="email" placeholder="Email" value = "<?php echo $row['email']?>" required>
              </div>
              <div class="form-group mb-2">
              <label> Phone Number </label>
                <input class="form-control" type="text" id="phone_number" name="phone_number" placeholder="Phone Number" value = "<?php echo $row['phoneNumber']?>" required>
                <?php if (isset($_SESSION['errors']['phone'])) {?>
                <p class="text-danger"><?php echo $_SESSION['errors']['phone'] ?></p>
              <?php } ?>
              </div>
            <div class="form-group mb-2">
            <label> About Me </label>
              <textarea class="form-control" rows="4" id="aboutme" name="aboutme"
                placeholder="Brief intro about yourself *" required><?php echo $row['about_yourself']?></textarea>
            </div>

            <div class="form-group mb-2">
            <label> Division </label>
              <input class="form-control" type="text" id="division" name="division" placeholder="Division" value = "<?php echo $row['division']?>">
            </div>
            <div class="form-group mb-2">
            <label> Address </label>
              <textarea class="form-control" rows="4" id="address" name="address" placeholder="Address" ><?php echo $row['address']?></textarea>
            </div>

            <div class="form-group mb-2">
              <button class="btn btn-flat btn-success">Update</button>
            </div>
        </div>
        <div class="col-md-4">


          <div class="form-group mb-2 mt-5">
            
          <label> Skills</label>
            <textarea class="form-control" rows="4" id="skills" name="skills" placeholder="Skills" ><?php echo $row['skills']?></textarea>
          </div>
          <div class="form-group mb-2">
          <label> Experience </label>
            <input class="form-control" type="text" id="experience" name="experience" placeholder="Experience" value = "<?php echo $row['experience']?>">
          </div>
          <div class="form-group mb-2">
          <label> Qualification </label>
            <input class="form-control" type="text" id="qualification" name="qualification"
              placeholder="Highest Qualification" value = "<?php echo $row['qualification']?>">
          </div>

          <div class="form-group mb-2">
            <label style="color: red;">Change Profile Picture</label>
            <input type="file" name="profile" class="btn btn-danger">
            <?php if (isset($_SESSION['errors']['file'])) {?>
                <p class="text-danger"><?php echo $_SESSION['errors']['file'] ?></p>
              <?php } ?>
          </div>
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