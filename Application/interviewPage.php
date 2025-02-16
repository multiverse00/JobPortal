<?php
  session_start();
  require_once("../db.php");
  $_SESSION['job_id'] = $_GET['job_id'];
  $_SESSION['seeker_id'] = $_GET['seeker_id'];
  
  $_SESSION['application_id'] = $_GET['application_id'];
 $sql = "SELECT * FROM jobs WHERE job_id =$_GET[job_id]";
 $result = $conn->query($sql);
 if($result){
    $row = $result->fetch_assoc();
 }


  
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
                <a class="nav-link" href="../logout">Logout</a>
            </li>
            
        </ul>
    </div>
</nav>
        
        </header>
    <section>
        <div class="container d-flex justify-content-center align-items-center pt-5">
            <div class="row ">
                <div class="col-md-9" style="width: 800px;">
                    <div class="card border-0 shadow mb-4 p-3 justify-content-center align-items-center">
                        <h1 class="text-center mb-4">Interview Invitation</h1>
                        <form action="interview.php" method="post" class=" " role="form"
                            enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group mb-2 " style="width: 400px;">
                                    <input class="form-control" type="text" id="title" name="title"
                                        placeholder="Title" value = "<?php echo $row['job_title']?>" required>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                    <input class="form-control" type="date" id="interview_date" name="interview_date"
                                        placeholder="Interview Time" required>
                                </div>
                               
                                <div class="form-group mb-2" style="width: 400px;">
                                    <input class="form-control" type="time" id="interview_time" name="interview_time"
                                        placeholder="Interview Time" required>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                    <textarea class="form-control" rows="4" id="location" name="location" placeholder="Location" required></textarea>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                    <input class="form-control" type="email" id="contact" name="contact"
                                        placeholder="Email" required>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                    <textarea class="form-control" rows="4" id="document" name="document" placeholder="Document" required></textarea>
                                </div>
                                  <div class="form-group mb-2">
                                    <button class="btn btn-flat btn-success">Invite</button>
                                  </div>
                            </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>