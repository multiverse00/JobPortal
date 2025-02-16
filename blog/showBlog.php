<?php 
 session_start();
 require_once("../db.php");
 $search = isset($_GET['search']) ? ($_GET['search']) : '';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Blog Page</title>
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
                        <a class="nav-link" href="showBlog.php">Blog</a>
                    </li>
                    <?php  if(empty($_SESSION['employer_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../job.php">Find Jobs</a>
                    </li>
                    <?php }?>
                    <?php  if(empty($_SESSION['job_seeker_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../employer/employerlogin.html">Post Job</a>
                    </li>
                    <?php }?>
                    <?php if(empty($_SESSION['job_seeker_id']) && empty($_SESSION['employer_id'])) { ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../jobSeeker/designseekerLogin.php">Job Seeker Login</a>
                            <a class="dropdown-item" href="../employer/login.php">Employer Login</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Create Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../jobSeeker/designSeekerProfile.php">Job Seeker Registration</a>
                            <a class="dropdown-item" href="../employer/makeEmployerProfile.php">Employer Registation</a>
                        </div>
                    </li>
                 
                    <li class="nav-item">
                        <a class="nav-link" href="admin/adminlogin.html">Admin</a>
                    </li>
                  
                    <?php }?>
                    <?php if(isset($_SESSION['job_seeker_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../JobSeeker/seekerProfile.php">Dashboard</a>
                    </li>
                    <?php }?>
                    <?php if(isset($_SESSION['employer_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../employer/employerProfile.php">Dashboard</a>
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
    <section class="pt-5">
    <div class="d-flex justify-content-center mb-4">
            <form  action="" method="GET" class="w-50 d-flex ">
                <input type="text" name="search" class="form-control me-2" placeholder="Blog Title" value="<?php echo ($search); ?>">
                    <button type="submit" class="btn btn-success">Search</button>
                </form>
     </div>
    <?php
     $sql = "SELECT * FROM blog INNER JOIN job_seeker ON author_id = job_seeker_id";
     if (!empty($search)) {
        $sql .= " WHERE blog_title LIKE '%$search%'";
    }
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc())
      {
       ?>

        <div class="card mt-5" style="width: 60rem; margin-left: 10rem;">
            <div class="card-body">
                <h2 class="display-4"><?php echo $row['blog_title']?></h2>
                <p class="text-muted"><?php echo $row['first_name']?> <?php echo $row['last_name']?> | <?php echo $row['updateAt']?></p>
                <h4 class="mb-3">Introduction</h4>
                <p><?php echo $row['introduction']?></p>
                <h4 class="mb-3">Content</h4>
                <p><?php echo $row['content']?></p>
                <h4 class="mt-4">Conclusion</h4>
                <p><?php echo $row['conclusion']?></p>

            </div>
        </div>
        <?php } }?>
    </section>

    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>