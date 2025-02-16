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
  <title>Employer</title>
</head>

<body>
<header class="main-header" style="background-color: #EBEAFF;">

<nav class="navbar navbar-expand-lg navbar-light" style="margin-left: 40px;">
    <a class="navbar-brand" href="../index.php">Job Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="margin-right: 40px;">
        <ul class="navbar-nav">
        <li class="nav-item">
                <a class="nav-link" href="../blog/showBlog.php">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="post.php">Post Job</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            
        </ul>
    </div>
</nav>

</header>

  <?php
    $sql = "SELECT * FROM employer WHERE employer_id = '$_SESSION[employer_id]';";
    $result = $conn->query($sql);
    if($result){
      $row = $result->fetch_assoc();
    }
    
  ?>
     
     <section>
      <div class="container mt-5">
      <div class="row">
        <div class="col-md-4">
          <h3><?php echo $row['companyName']?></h3>
          <div class="">
              <?php if (!empty($row['logo'])){?>
                 <img src = "logos/<?php echo $row['logo']; ?>" class = "img-fluid rounded-circle">
                  <?php } ?>
          </div>
        </div>
        <div class="col-md-4">
          <form action="updateProfile.php" method="post" role="form" enctype="multipart/form-data">
              <div class="form-group mb-2">
              <label> Company Name </label>
                <input class="form-control" type="text" id="companyname" name="companyname" placeholder="Company Name" value= "<?php echo $row['companyName']?>">
              </div>
              <div class="form-group mb-2">
              <label> Alternative Name </label>
                <input class="form-control" type="text" id="alname" name="alname" placeholder="Company Alternative Name" value= "<?php echo $row['alternative_name']?>">
              </div>
              <div class="form-group mb-2">
              <label> Website </label>
                <input class="form-control" type="text" id="website" name="website" placeholder="Website" value = "<?php echo $row['website']?>">
              </div>
              <div class="form-group mb-2">
              <label> Email </label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" value= "<?php echo $row['email']?>">
              </div>
              <div class="form-group mb-2">
              <label> Phone Number </label>
                <input class="form-control" type="text" id="phone_number" name="phone_number" placeholder="Phone Number" value= "<?php echo $row['phoneNumber']?>">
                <?php if (isset($_SESSION['errors']['contact'])) {?>
                    <p class="text-danger"><?php echo $_SESSION['errors']['contact'] ?></p>
                <?php } ?>
              </div>

              
  
              <div class="form-group mb-2">
                <button class="btn btn-primary">Update Company Profile</button>
              </div>
            </div>
            <div class="col-md-4">
             <div class="form-group mb-2">
             <label> Company Description </label>
                <textarea class="form-control" rows="4" id="about" name="about" placeholder="Company Description" ><?php echo $row['about']?></textarea>
              </div>
              <div class="form-group mb-2">
              <label> Location </label>
                <textarea class="form-control" rows="4" id="location" name="location" placeholder="Location"><?php echo $row['location']?></textarea>
              </div>  
              <div class="form-group mb-2">
                <label style="color: green;">Company Logo</label>
                <input type="file" name = "image" class="btn btn-defult" >
                <?php if (isset($_SESSION['errors']['image'])) {?>
                <p class="text-danger"><?php echo $_SESSION['errors']['image'] ?></p>
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