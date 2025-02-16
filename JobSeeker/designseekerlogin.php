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
  <header>
  </header>
  <section >
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row">
        <h4 class="text-center mb-4">Job Seeker Login</h4>
        <form action="seekerlogin.php" method="post" class="col-md-12" role="form">
          
            <div class="form-group mb-2">
              <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group mb-2">
              <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
            </div>


            <div class="form-group mb-2">
              <button class="btn btn-success btn-block btn-flat">Login</button>
              <?php if (isset($_SESSION['invalid'])) {?>
                <p class="text-danger"><?php echo $_SESSION['invalid'] ?></p>
              <?php } ?>
            </div>
            <div class="form-group mb-2 ">
              Don't Have an Account ?
              <a class="text-decoration-none" href="designSeekerProfile.php"> Sign Up</a>
              
            </div>
          </div>
        

            </div>
          </div>
        </form>

      </div>
    </div>
  </section>
  <?php
    unset($_SESSION['invalid']);
  ?>
  <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>