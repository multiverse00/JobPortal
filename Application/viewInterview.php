<?php
session_start();
require_once("../db.php");


if(isset($_GET['search'])){
    $search = $_GET['search'];
} 
else{
    $search = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Application</title>
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
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            
        </ul>
    </div>
</nav>

</header>
    <section style="margin-top: 100px;">
        <div class="container">
            <div class="row">
            <div class="col-md-2">
                    <div class="card account-nav border-0 mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="../employer/employerProfile.php">Dashboard</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="../employer/post.php">Post a Job</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="../employer/myJob.php">My Jobs</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="showApplication.php">Job Application</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="viewInterview.php">Interview</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class="nav-link" href="../admin/cshowFeedback.php">Feedback</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 ">

                    <h3>Interview</h3>
                    <div class="row margin-top-20">
                    <div class="d-flex mb-4">
                            <form  action="" method="GET" class="w-100 d-flex">
                                <input type="text" name="search" class="form-control me-2" placeholder="Job Title" value="<?php echo ($search); ?>">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                        <div>
                            <div class="box-body table-responsive no-padding">
                                <table id="example2" class="table table-hover">
                                    <thead>
                                       <th>Job Title</th>
                                       <th>Job Seeker Name</th>
                                        <th>Interview Date</th> 
                                        <th>View</th>
                                        <th>Update</th>
                                        <th>Delete </th>
                                   
                                        
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM interview INNER JOIN job_seeker ON interview.job_seeker_id = job_seeker.job_seeker_id WHERE employer_id = '$_SESSION[employer_id]'";
                                        if (!empty($search)) {
                                            $sql .= " AND title LIKE '%$search%'";
                                        }
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()) {
                                       
                                        ?>
                                        <tr>
                                          <td><?php echo $row['title']; ?></td>
                                          <td><?php echo $row['first_name'] .' '. $row['last_name']; ?></td>
                                          
                                          <td><?php echo $row['interview_date']; ?></td>

                                         
                                          <td><a class = "btn btn-info" href="showInterview.php?id=<?php echo $row['interview_id'];?>">View </a></td>
                                          
                                          <td><a class = "btn btn-success" href="updateInterview.php?id=<?php echo $row['interview_id'];?>">Update</a></td>
                                          <td><a class = "btn btn-danger" href="deleteInterview.php?id=<?php echo $row['interview_id'];?>" onclick = "return(confirm('Are you sure you want to delete interview invitation'))">Delete</a></td>
                                         

                                          </tr>  
                                          <?php
                                          
                                        
                                    }
                                }
                                          ?>

                                    </tbody>
                                </table>
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