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
    <title>Profile</title>
</head>

<?php
    $sql = "SELECT * FROM employer WHERE employer_id = '$_SESSION[employer_id]';";
    $result = $conn->query($sql);
    if($result){
      $row = $result->fetch_assoc();
    }
  ?>
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
    <section class="section-5 bg-2 bg-light">
        <div class="container py-5">
     
            <div class="row">
                <div class="col-lg-3">
                    <div class="card account-nav border-0 mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="employerProfile.php">Dashboard</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="post.php">Post a Job</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="myJob.php">My Jobs</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="../Application/showApplication.php">Job Application</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="../Application/viewInterview.php">Interview</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="../admin/cshowFeedback.php">Feedback</a>
                                </li>
                                

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="card border-0 mb-4 p-3">
                <div class="s-body mt-3">
                    <h2><?php echo $row['companyName']?></h2>
                    <div class="form-group mb-2">
                    <p><strong>Company Name: </strong><?php echo $row['companyName']?></p>
                    </div>
                    <div class="form-group mb-2">
                    <p><strong>Website:</strong> <?php echo $row['website']?></p>
                    </div>
                    <div class="form-group mb-2">
                    <p><strong>About: </strong><?php echo $row['about']?></p>
                    </div>
                    <div class="form-group mb-2">
                    <p><strong>Email: </strong><?php echo $row['email']?></p>
                    </div>
                    <div class="form-group mb-2">
                    <p><strong>Phone Number: </strong><?php echo $row['phoneNumber']?></p>
                    </div>

                    <div class="form-group mb-2">
                    <p><strong>Division: </strong><?php echo $row['division']?></p>
                    </div>
                    <div class="form-group mb-2">
                    <p><strong>Location: </strong><?php echo $row['location']?></p>
                    </div>
                    

                    <div class="form-group mb-2">

                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-3">
                <div class="card border-0 mb-4 p-3">
                    <div class="s-body text-center mt-3">
                    <?php if (!empty($row['logo'])){?>
                        <img src = "logos/<?php echo $row['logo']; ?>" class = "img-fluid rounded-circle">
                            <?php } ?>
                        <div class="d-flex justify-content-center mb-2">
                        <a href="employerProfileUpdate.php" class="btn btn-outline-primary">Update Profile</a>

                        </div>
                     </div>
                </div>
        </div>
     </div>
    </section>
    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>