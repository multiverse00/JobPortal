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
  <title>jobSeeker</title>
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
                    <a class="nav-link" href="../job.php">Find Jobs</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="designseekerlogin.php">Job Seeker Login</a>
                        <a class="dropdown-item" href="../employer/login.php">Employer Login</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Create Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="designSeekerProfile.php">Job Seeker Registration</a>
                        <a class="dropdown-item" href="../employer/makeEmployerProfile.php">Employer Registation</a>
                    </div>
                </li>
                
            </ul>
        </div>
    </nav>

</header>
  <section>
    <div class="container pt-5">
      <div>
        <h1 class="text-center">CREATE YOUR PROFILE</h1>
        <form action="createSeekerProfile.php" method="post" class="row" role="form" enctype="multipart/form-data">
          <div class="col-md-6">
            <div class="form-group mb-2">
              <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name" required>
            </div>
            <div class="form-group mb-2">
              <input class="form-control" type="text" id="lname" name="lname" placeholder="Last Name" required>

              <?php if (isset($_SESSION['errors']['name'])) {?>
                <p class="text-danger"><?php echo $_SESSION['errors']['name'] ?></p>
              <?php } ?>

            </div>
            <div class="form-group mb-2">
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                <?php if (isset($_SESSION['errors']['email'])) {?>
                  <p class="text-danger"><?php echo $_SESSION['errors']['email']; ?></p>
              <?php } ?>
              </div>
              <div class="form-group mb-2">
                <input class="form-control" type="text" id="phone_number" name="phone_number" placeholder="Phone Number" required>
                <?php if (isset($_SESSION['errors']['phone'])) {?>
                <p class="text-danger"><?php echo $_SESSION['errors']['phone'] ?></p>
              <?php } ?>
              </div>
            <div class="form-group mb-2">
              <textarea class="form-control" rows="4" id="aboutme" name="aboutme"
                placeholder="Brief intro about yourself *"></textarea>
            </div>
            <div class="form-group mb-2">
              <label>Date Of Birth</label>
              <input class="form-control" type="date" id="dob" min="1960-01-01" max="1999-01-31" name="dob"
                placeholder="Date Of Birth" required>
            </div>
            <div class="form-check form-check-inline mb-2">
              <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
              <label class="form-check-label" for="male">
                Male
              </label>
            </div>
            <div class="form-check form-check-inline mb-2">
              <input class="form-check-input" type="radio" name="gender" id="female" value="female">
              <label class="form-check-label" for="female">
                Female
              </label>
            </div>
            <div class="form-check form-check-inline mb-2 ">
              <input class="form-check-input" type="radio" name="gender" id="other" value="other">
              <label class="form-check-label" for="other">
                Others
              </label>
            </div>

            <div class="form-group mb-2">
              <input class="form-control" type="text" id="division" name="division" placeholder="Division" required>
            </div>
            <div class="form-group mb-2">
                <textarea class="form-control" rows="4" id="address" name="address" placeholder="Address" required></textarea>
              </div>


            <div class="form-group mb-2">
              <button class="btn btn-flat btn-success">Submit</button>
            </div>
          </div>
          <div class="col-md-6">
           

            <div class="form-group mb-2">
              <textarea class="form-control" rows="4" id="skills" name="skills" placeholder="Skills"></textarea>
            </div>
            <div class="form-group mb-2">
              <input class="form-control" type="text" id="experience" name="experience" placeholder="Experience">
            </div>
            <div class="form-group mb-2">
              <input class="form-control" type="text" id="qualification" name="qualification"
                placeholder="Highest Qualification" required>
            </div>
            <div class="form-group mb-2">
              <label>Passing Year</label>
              <input class="form-control" type="date" id="passingyear" name="passingyear" placeholder="Passing Year">
            </div>
            <div class="form-group mb-2">
                
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
              </div>
              <div class="form-group mb-2">
                
                <input class="form-control" type="password" id="confirm_passwowrd" name="confirm_password" placeholder="Confirm Password" required>
                <?php if (isset($_SESSION['errors']['password'])) {?>
                <p class="text-danger"><?php echo $_SESSION['errors']['password'] ?></p>
                <?php } ?>
              </div>

            <div class="form-group mb-2">
              <label style="color: red;">Profile Picture</label>
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