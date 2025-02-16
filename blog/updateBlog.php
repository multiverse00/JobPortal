<?php
  session_start();
  require_once("../db.php");
  $_SESSION['blog_id'] = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Update Blog</title>
</head>

<body>
<?php
    $sql = "SELECT * FROM blog WHERE blog_id = '$_GET[id]';";
    $result = $conn->query($sql);
    if($result){
      $row = $result->fetch_assoc();
    }
  ?>
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
    <section>
        <div class="container d-flex justify-content-center align-items-center pt-5">
            <div class="row ">
                <div class="col-md-9" style="width: 800px;">
                    <div class="card border-0 shadow mb-4 p-3 justify-content-center align-items-center">
                        <h1 class="text-center">Update Blog</h1>
                        <form action="update.php" method="post" class=" " role="form"
                            enctype="multipart/form-data">
                            <div class="col-md-6">
                                <div class="form-group mb-2 " style="width: 600px;">
                                    <input class="form-control" type="text" id="blog_title" name="blog_title"
                                        placeholder="Blog Title" value = "<?php echo $row['blog_title']?>">
                                </div>
                                <div class="form-group mb-2" style="width: 600px;">
                                    <textarea class="form-control" rows="4" id="introduction" name="introduction" placeholder="Introduction" ><?php echo $row['introduction']?></textarea>
                                </div>
                                <div class="form-group mb-2" style="width: 600px;">
                                    <textarea class="form-control" rows="8" id="mainContent" name="mainContent" placeholder="Main Content" ><?php echo $row['content']?></textarea>
                                </div>
                                <div class="form-group mb-2" style="width: 600px;">
                                    <textarea class="form-control" rows="4" id="conclusion" name="conclusion" placeholder="Conclusion" ><?php echo $row['conclusion']?></textarea>
                                </div>
                               
                                  <div class="form-group mb-2">
                                
                                    <button class="btn btn-flat btn-success">Update</button>
                                    
                                  </div>
                            </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>