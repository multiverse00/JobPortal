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
    <title>Feedback</title>
</head>

<?php

   $search = isset($_GET['search']) ? ($_GET['search']) : '';
    $sql = "SELECT * FROM job_seeker WHERE job_seeker_id = '$_SESSION[job_seeker_id]';";
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
                        <?php  if(isset($_SESSION['job_seeker_id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../job.php">Find Jobs</a>
                        </li>
                        <?php }?>
                        <?php  if(isset($_SESSION['employer_id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../employer/post.php">Post Job</a>
                        </li>
                        <?php }?>
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
                <div class="col-lg-3">
                    <div class="card border-0 shadow mb-4 p-3">
                        <div class="s-body text-center mt-3">
                        <?php if (!empty($row['profile_picture'])){?>
                           <img src = "../JobSeeker/uploads/profile/<?php echo $row['profile_picture']; ?>" class = "img-fluid rounded-circle">
                             <?php } ?>
                                <h3><?php echo $row['first_name']." ".$row['last_name']?></h3>
                            <div class="d-flex justify-content-center mb-2">
                            <a href="seekerProfileUpdate.php" class="btn btn-success">Update Profile</a>

                            </div>
                        </div>
                    </div>
                    <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item d-flex justify-content-between p-3">
                                    <a class = "text-decoration-none" href="../JobSeeker/seekerProfile.php">Dashboard</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class = "text-decoration-none"  href="../Application/userApplication.php">Jobs Applied</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class = "text-decoration-none"  href="../Application/userInterview.php">Interview</a>
                                </li>
                               
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class = "text-decoration-none"  href="../blog/blog.html">Write Blog</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class = "text-decoration-none"  href="../JobSeeker/myblog.php">My Blog</a>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <a class = "text-decoration-none"  href="../admin/showFeedback.php">Feedback</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                <div class="card border-0 shadow mb-4 p-3">
                <div class="s-body mt-3">
                    <h2>My Feedback</h2>
                    <div>
                        
                    <div class="d-flex mb-4">
                            <form  action="" method="GET" class="w-50 d-flex ms-auto">
                                
                                <input type="text" name="search" class="form-control me-2" placeholder="Search by Category" value="<?php echo ($search); ?>">
                                <button type="submit" class="btn btn-success">Search</button>
                                <a href="viewFeedback.php" class="btn btn-success">Feedback</a>
                            </form>
                        </div>
                            <div class="box-body table-responsive no-padding">
                                <table id="example2" class="table table-hover">
                                    <thead>
                                       <th>Category</th>
                                        <th>Massage</th>
                                        <th>Rating</th>
                                        <th>View</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM feedback WHERE author_id = '$_SESSION[job_seeker_id]' AND author_type = 'seeker'";
                                        if (!empty($search)) {
                                            $sql .= " AND category LIKE '%$search%'";
                                        }
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0) {
                                          while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                         <td><?php echo $row['category']; ?></td> 
                                          <td><?php echo $row['message'] ?></td>
                                          <td><?php echo $row['rating']; ?></td>
                                          <td><a class = "btn btn-success" href="feedbackDetails.php?id=<?php echo $row['id']; ?>">View</a></td>
                                          <td><a class = "btn btn-warning" href="editFeedback.php?id=<?php echo $row['id']; ?>">Update</a></td>
                                         <td><a class = "btn btn-danger" href="deleteFeedback.php?id=<?php echo $row['id']; ?>"onclick="return confirm('Are you sure you want to delete this feedback?');">Delete</a></td>
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
     </div>
    </section>

<script src="../bootstrap.bundle.min.js"></script>
</body>
</html>
