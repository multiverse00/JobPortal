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
    $sql = "SELECT * FROM application INNER JOIN job_seeker ON application.job_seeker_id = job_seeker.job_seeker_id WHERE application.job_seeker_id = '$_GET[id]' AND application.job_id = '$_GET[job_id]';";
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
                <a class="nav-link" href="../employer/post.php">Post Job</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            
        </ul>
    </div>
</nav>

</header>
    <section class="section-5 bg-2">
        <div class="container py-5">
     
            <div class="row">
                
                    
                </div>
                <div class="col-md-9">
                <div class="card border-0 shadow mb-4 p-3">
                <div class="s-body mt-3">
                    <h2>Application</h2>
                    <div class="form-group mb-2">
                    <p><strong>Full Name: </strong><?php echo $row['first_name']." ".$row['last_name']?></p>
                    </div>
                    <div class="form-group mb-2">
                    <p><strong>Number: </strong><?php echo $row['phoneNumber']?></p>
                    </div>
                    <div class="form-group mb-2">
                    <p><strong>Alternative Number: </strong><?php echo $row['alternative_number']?></p>
                    </div>
                  
                    <div class="form-group mb-2">
                    <p><strong>Email: </strong><?php echo $row['email']?></p>
                    </div>
                    <div class="form-group mb-2">
                    <p><strong>Alternative Email: </strong><?php echo $row['alternative_email']?></p>
                    </div>
                    <div class="form-group mb-2">
                    <p><strong>Expected Salary: </strong><?php echo $row['expected_salary'].'k' ?></p>
                    </div>
                    <div class="form-group mb-2">
                    <a class = "file" href="resume/<?php echo $row['upload_resume']; ?>" download = "<?php echo $row['first_name'].'resume'?>">Resume</a>
                    </div>
                    <?php 
                    if(!empty($_SESSION['job_seeker_id'])){
                    ?>
                    <a class = "btn btn-success" href="editApplication.php?id=<?php echo $row['application_id']; ?>">Update</a>
                    <?php } ?>
                    <?php 
                    if(!empty($_SESSION['employer_id'])){
                    ?>
                    <a class = "btn btn-success" href="interviewPage.php?job_id=<?php echo $row['job_id'];?>&seeker_id=<?php echo $row['job_seeker_id']; ?>&application_id=<?php echo $row['application_id']; ?>">Call Interview</a>
                    <?php } ?>
                    
                    <div class="form-group mb-2">

                    </div>


                </div>
            </div>
        </div>
        </div>
     </div>
    </section>
    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>