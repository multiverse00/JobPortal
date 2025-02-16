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
    <title>Blog Page</title>
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
    <section class="pt-5">
    <?php
    $sql = "SELECT * FROM blog INNER JOIN job_seeker ON author_id = job_seeker_id WHERE blog_id = '$_GET[id]'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc())
      {
       ?>

        <div class="card mt-5" style="width: 60rem; margin-left: 10rem;">
            <div class="card-body">
                <h2 class="display-4"><?php echo $row['blog_title']?></h2>
                <p class="text-muted"><?php echo $row['first_name']?> <?php echo $row['last_name']?> | <?php echo $row['updateAt']?> </p>
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