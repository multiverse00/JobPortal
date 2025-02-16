<?php
session_start();
   require_once("db.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Job Portal</title>
</head>

<body> 
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light" style="margin-left: 40px;">
            <a class="navbar-brand" href="index.php">Job Portal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="margin-right: 40px;">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="blog/showBlog.php">Blog</a>
                    </li>
                    <?php  if(empty($_SESSION['employer_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="job.php">Find Jobs</a>
                    </li>
                    <?php }?>
                    <?php  if(empty($_SESSION['job_seeker_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="employer/login.php">Post Job</a>
                    </li>
                    <?php }?>
                    <?php if(empty($_SESSION['job_seeker_id']) && empty($_SESSION['employer_id'])) { ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="jobSeeker/designseekerLogin.php">Job Seeker Login</a>
                            <a class="dropdown-item" href="employer/login.php">Employer Login</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Create Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="jobSeeker/designSeekerProfile.php">Job Seeker Registration</a>
                            <a class="dropdown-item" href="employer/makeEmployerProfile.php">Employer Registation</a>
                        </div>
                    </li>
                 
                    <li class="nav-item">
                        <a class="nav-link" href="admin/designadminlogin.php">Admin</a>
                    </li>
                  
                    <?php }?>
                    <?php if(isset($_SESSION['job_seeker_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="JobSeeker/seekerProfile.php">Dashboard</a>
                    </li>
                    <?php }?>
                    <?php if(isset($_SESSION['employer_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="employer/employerProfile.php">Dashboard</a>
                    </li>
                    <?php }?>
                    <?php if(isset($_SESSION['job_seeker_id']) || isset($_SESSION['employer_id'])) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                    
                    <?php }?>
                    
                </ul>
            </div>
        </nav>

    </header>

    <section class="section-1 py-5" style=" background-color:#EBEAFF;">
        <div class="container">
            <div >
                <form action="job.php" method="get" class="form-inline row">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="keywords" id="search"
                            placeholder="Job Title or Keywords">
                    </div>
                    <div class="col-md-5">
                        <select name="location" id="location" class="form-control">
                            <option value="">Location</option>
                            <option value="Remote">Remote</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chattogram">Chattogram</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Mymensingh">Mymensingh </option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline-success w-100">Search</button>
                    </div>
                </form>
            </div>
        </div>

    </section>

    <section class="section-2 bg-2 py-5">

        <div class="container">
        <?php $sql = "SELECT category_name, SUM(vacancies) job_count FROM category LEFT JOIN jobs ON jobs.category_id = category.category_id GROUP BY category.category_id ORDER BY job_count DESC LIMIT 8";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
            ?>
            <h2>Popular Categories</h2>
            <div class="row pt-2">
                 
            <?php while($row = $result->fetch_assoc())
            {
            ?> 
          
                <div class="card m-3" style="width: 15rem;">
                    <div class="card-body">
                        <a href="jobs.html" class="text-decoration-none">
                            <h5 class="card-title text-center"><?php echo $row['category_name']?></h5>
                        </a>
                        <p class="mb-0 text-center"> <?php echo $row['job_count']?> Available position</p>
                    </div>
                </div>
                <?php }?>
            </div>
            <?php }?>
        </div>
    </section>

    <section class="section-3 bg-2 py-5">

        <div class="container">
            <h2>Our Statistics</h2>
            <div class="row pt-2">
                <div class="card m-3 bg-primary" style="width: 15rem;">
                    <div class="card-body">
                        <a href="jobs.html" class="text-decoration-none">
                            <?php
                              $sql = "SELECT * FROM jobs";
                              $result = $conn->query($sql);
                              if($result->num_rows > 0) {
                                  $totalno = $result->num_rows;
                              } else {
                                  $totalno = 0;
                               }
                            ?>

                            <h5 class="card-title text-center text-light"><?php echo $totalno?></h5>
                        </a>
                        <p class="mb-0 text-center">Jobs Offers</p>
                    </div>
                </div>
                <div class="card m-3 bg-success" style="width: 15rem;">
                    <div class="card-body">
                           <?php
                              $sql = "SELECT * FROM employer";
                              $result = $conn->query($sql);
                              if($result->num_rows > 0) {
                                  $totalno = $result->num_rows;
                              } else {
                                  $totalno = 0;
                               }
                            ?>
                            <h5 class="card-title text-center text-light"><?php echo $totalno?></h5>
                        <p class="mb-0 text-center">Companies</p>
                    </div>
                </div>
                <div class="card m-3 bg-warning" style="width: 15rem;">
                    <div class="card-body">
                         <?php
                            $sql = "SELECT * FROM jobs WHERE  TIMESTAMPDIFF(DAY, createAt, CURDATE()) <= 5";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0) {
                               $totalno = $result->num_rows;
                            } else {
                            $totalno = 0;
                          }
                         ?>
                            <h5 class="card-title text-center"><?php echo $totalno?></h5>
                        <p class="mb-0 text-center">New Jobs</p>
                    </div>
                </div>
                <div class="card m-3 bg-danger" style="width: 15rem;">
                      <div class="card-body">
                         <?php
                            $sql = "SELECT * FROM job_seeker";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0) {
                               $totalno = $result->num_rows;
                            } else {
                            $totalno = 0;
                          }
                         ?>
                            <h5 class="card-title text-center"><?php echo $totalno?></h5>
                        <p class="mb-0 text-center">Daily Users</p>
                    </div>
                </div>
            </div>
    </section>
    <script src="bootstrap.bundle.min.js"></script>

</body>

</html>