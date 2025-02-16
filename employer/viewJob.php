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
    <title>Document</title>
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
                <a class="nav-link" href="post.php">Post Job</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            
        </ul>
    </div>
</nav>

</header>
<?php
    $sql = "SELECT * FROM jobs WHERE job_id = '$_GET[id]'";
    $result = $conn->query($sql);
    if($result){
      $row = $result->fetch_assoc();
    }
    $sql1 = "SELECT * FROM employer WHERE employer_id = '$row[employer_id]'";
    $result1 = $conn->query($sql1);
    if($result1){
      $row1 = $result1->fetch_assoc();
    }
?>
<section class="section-5 bg-2 bg-light">
        <div class="container py-5">
            <div class="row">
                <div class = "col-md-8 card border-0 p-3">
                <div>
                <h3><?php echo $row['job_title']?></h3>
                <p><?php echo $row['division'].' | '. $row['job_type']?></p>
                </div>
                <div class = "mt-5">
                <h5> Job Description</h5>
                <p><?php echo $row['job_description']?></p>
                </div>
                <div class = "mt-5">
                <h5> Qualification</h5>
                <p><?php echo $row['qualification']?></p>
                </div>
                
                <div class = "mt-5">
                <h5> Requirement</h5>
                <h6> Experience</h6>
                <p><?php echo $row['experience'].' Years'?></p>
                <h6> Skills</h6>
                <p><?php echo $row['skills']?></p>
                </div>
                
                <div class = "d-flex justify-content-end"> 
               
                
               </div>
                </div>
                <div class = "col-md-4">
                <div class = "card border-0 p-3">
                <div >
                   <h3> Job Summary</h3>
                   <p> Pusbished on: <?php echo date("Y, F d", strtotime( $row['createAt']))?></p>
                </div>
                <div >
                   <p> Deadline: <?php echo date("Y, F d", strtotime( $row['deadline']))?></p>
                </div>
                <div>
                   <p> Vacancy: <?php echo $row['vacancies']?></p>
                </div>
                <div>
                   <p> Salary: <?php echo $row['min_salary'].'k-'.$row['max_salary'].'k'?></p>
                </div>
                <div>
                   <p> Location: <?php echo $row['division']?></p>
                </div>
                <div>
                   <p> Job Type: <?php echo $row['job_type']?></p>
                </div>
                </div>
                <div class = "card border-0 p-3 mt-2">
                <div class = "mt-5">
                   <h3>Company Details</h3>
                   <p> Company Name: <?php echo $row1['companyName']?></p>
                </div>
                <div>
                   <p> Location: <?php echo $row1['division']?></p>
                </div>
                <div>
                   <p> Website: <?php echo $row1['website']?></p>
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