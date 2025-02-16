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
    <title>Admin</title>
</head>

<body>
    <header>
    </header>
    <section>
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="row">
                <h4 class="text-center mb-4">Admin Login</h4>
                <form action="adminlogin.php" method="post" class="col-md-12" role="form">

                    <div class="form-group mb-2">
                        <input class="form-control" type="name" id="name" name="name" placeholder="Username" required>
                    </div>
                    <div class="form-group mb-2">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password"
                            required>
                    </div>


                    <div class="form-group mb-2">
                        <button class="btn btn-success btn-block btn-flat">Login</button>
                        <a class="text-decoration-none btn btn-success" href="adminRegistration.php"> Sign Up</a>
                        <?php if (isset($_SESSION['msg'])) {?>
                          <p class="text-danger"><?php echo $_SESSION['msg'] ?></p>
                        <?php } ?>
                    </div>
            </div>


        </div>
        </div>
        </form>

        </div>
        </div>
    </section>
    <?php
    unset($_SESSION['msg']);
  ?>
    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>
