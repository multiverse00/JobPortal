<?php
session_start();
if(empty($_SESSION['job_seeker_id'])){
    header("Location: ../JobSeeker/designseekerlogin.php");
    exit();
}
$_SESSION['job_id'] = $_GET['id'];

require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Apply Jobs</title>
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
                        <a class="nav-link" href="#">Find Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                   
                    
                </ul>
            </div>
        </nav>
        
        </header>
    <section >
        <div class="container d-flex justify-content-center align-items-center pt-5">
            <div class="row ">
                <div class="col-md-9" style="width: 800px;">
                    <div class="card border-0 shadow mb-4 p-3 justify-content-center align-items-center">
                        <h1 class="text-center">Application</h1>
                        <form action="apply.php" method="post" class=" " role="form"
                            enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group mb-2 " style="width: 400px;">
                                    <input class="form-control" type="text" id="alternative_number" name="alternative_number"
                                        placeholder="Alternative Number" required>
                                        <?php if (isset($_SESSION['errors']['number'])) {?>
                                           <p class="text-danger"><?php echo $_SESSION['errors']['number'] ?></p>
                                        <?php } ?>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                    <input class="form-control" type="email" id="alternative_email" name="alternative_email"
                                        placeholder="Alternative Email" required>
                                </div>
                               
                                <div class="form-group mb-2" style="width: 400px;">
                                    <input class="form-control" type="number" id="expected_salary" name="expected_salary"
                                        placeholder="Expected Salary" min ="1" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label style="color:green;">Upload Resume</label>
                                    <input type="file" name="resume" class="btn btn-gray"> 
                                  </div>
                                  <div class="form-group mb-2">
                                    <button class="btn btn-flat btn-success">Apply</button>
                                    <?php if (isset($_SESSION['errors']['file'])) {?>
                                           <p class="text-danger"><?php echo $_SESSION['errors']['file'] ?></p>
                                    <?php } ?>
                                  </div>
                            </div>
                    </div>
                </div>
            </div>
    </section>
    <?php
    unset($_SESSION['errors']);
  ?>

    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>