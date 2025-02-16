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
                    <a class="nav-link" href="employerlogin.html">Post Job</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../JobSeeker/designseekerlogin.php">Job Seeker Login</a>
                        <a class="dropdown-item" href="login.php">Employer Login</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Create Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../JobSeeker/designSeekerProfile.php">Job Seeker Registration</a>
                        <a class="dropdown-item" href="makeEmployerProfile.php">Employer Registation</a>
                    </div>
                </li>
                
            </ul>
        </div>
    </nav>

</header>
    <section>
      <div class="container mt-5">
        <div>
          <h1 class="text-center">CREATE COMPANY PROFILE</h1>
          <form action="createEmployerProfile.php" method="post" class="row" role="form" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <input class="form-control" type="text" id="username" name="username" placeholder="Username"
                        required>
                </div>
               
                <div class="form-group mb-2">
                    <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                    <?php if (isset($_SESSION['errors']['email'])) {?>
                     <p class="text-danger"><?php echo $_SESSION['errors']['email'] ?></p>
                     <?php } ?>
                </div>
                <div class="form-group mb-2">
                    <input class="form-control" type="text" id="phone_number" name="phone_number"
                        placeholder="Phone Number" required>
                        <?php if (isset($_SESSION['errors']['contact'])) {?>
                        <p class="text-danger"><?php echo $_SESSION['errors']['contact'] ?></p>
                       <?php } ?>
                </div>
                <div class="form-group mb-2">
                    <input class="form-control" type="text" id="companyname" name="companyname" placeholder="Company Name"
                        required>
                </div>
              <div class="form-group mb-2">
                <input class="form-control" type="text" id="alname" name="alname" placeholder="Company Alternative Name">
              </div>
              <div class="form-group mb-2">
                <input class="form-control" type="text" id="website" name="website" placeholder="Website" required>
              </div>
              <div class="form-group mb-2">
                <textarea class="form-control" rows="4" id="about" name="about" placeholder="Company Description" required></textarea>
              </div>
  
              <div class="form-group mb-2">
                <button class="btn btn-primary">Submit</button>
              </div>
            </div>
            <div class="col-md-6">
                <select class="form-select mb-2" name = "division" required>
                    <option selected>Division</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Chattogram">Chattogram</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Khulna">Khulna</option>
                    <option value="Rangpur">Rangpur</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Barishal">Barishal</option>
                    <option value="Mymensingh">Mymensingh</option>
                  </select>
              <div class="form-group mb-2">
                <textarea class="form-control" rows="4" id="location" name="location" placeholder="Location"></textarea>
              </div>  
              <div class="form-group mb-2">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password"
                    required>
            </div>
            <div class="form-group mb-2">
                <input class="form-control" type="password" id="cpassword" name="confirm_password"
                    placeholder="Confirm Password" required>
                    <?php if (isset($_SESSION['errors']['password'])) {?>
                    <p class="text-danger"><?php echo $_SESSION['errors']['password'] ?></p>
                    <?php } ?>
            </div>
              <div class="form-group mb-2">
                <label style="color: green;">Company Logo</label>
                <input type="file" name = "image" class="btn btn-defult" required>
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