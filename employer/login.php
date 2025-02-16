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
    <title>Employer login</title>
</head>

<body>
    <section>
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="row">
                <div class="card" style="width: 25rem; height: 20rem;">
                    <div class="card-body mt-5">
                        <h4 class="card-title text-center">Employer Login</h4>
                        <form action="employerlogin.php" method="post" class="col-md-12" role="form">

                            <div class="form-group mb-2">
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="form-group mb-2">
                                <input class="form-control" type="password" id="password" name="password"
                                    placeholder="Password" required>
                            </div>


                            <div class="form-group mb-2 d-grid">
                                <button class="btn btn-primary btn-block btn-flat">Login</button>
                                <?php if (isset($_SESSION['check'])) {?>
                                   <p class="text-danger"><?php echo $_SESSION['check'] ?></p>
                                 <?php } ?>
                            </div>
                            <div>
                                Don't Have an Account?
                                <a class="text-decoration-none" href="makeEmployerProfile.php">Sign Up</a>
                            </div>

                    </div>

                </div>
            </div>
            </form>
        </div>
        </div>

        </div>
        </div>
    </section>
    <?php
    unset($_SESSION['check']);
  ?>
    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>