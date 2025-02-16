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
    <title>Interview</title>
</head>

<body>
<?php
    $sql = "SELECT * FROM interview WHERE interview_id = '$_GET[id]';";
    $result = $conn->query($sql);
    if($result){
      $row = $result->fetch_assoc();
    }
  ?>

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
    <section class="pt-5">
        <div class="container d-flex justify-content-center align-items-center pt-5">
            <div class="row ">
                <div class="col-md-9" style="width: 800px;">
                    <div class="card border-0 shadow mb-4 p-3 justify-content-center align-items-center">
                    <h2 class="text-center mb-4">Interview Invitation</h2>
                    <?php if(!empty($_SESSION['job_seeker_id'])){?>
                    <p class="text-center mb-3">
                    Congratulations! You have been shortlisted for the position of <strong><?php echo $row['title']?></strong>.
                    </p>
                    <?php }?>
                    <p class="text-center">
                    <strong>Interview Details:</strong>
                     </p>
                            <div class="col-md-6">
                                <div class="form-group mb-2 " style="width: 400px;">
                                <p><strong>Job Title: </strong><?php echo $row['title']?></p>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                <p><strong>Interview Date: </strong><?php echo $row['interview_date']?></p>
                                </div>
                               
                                <div class="form-group mb-2" style="width: 400px;">
                                <p><strong>Interview Time: </strong><?php echo $row['interview_time']?></p>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                <p><strong>Location: </strong><?php echo $row['location']?></p>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                <p><strong>Contact Information: </strong><?php echo $row['contact_information']?></p>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                <p><strong>Document: </strong><?php echo $row['document']?></p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>