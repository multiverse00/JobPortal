<?php
require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>All Users</title>
</head>

<?php
     $sql = "SELECT * FROM feedback WHERE id = '$_GET[id]'";
    $result = $conn->query($sql);
    if($result){
      $row = $result->fetch_assoc();
    }
  ?>
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
                    <h2 class="text-center mb-4">Feedback</h2>
                    <p class="text-center"></p>
                            <div class="col-md-6">
                                <div class="form-group mb-2 " style="width: 400px;">
                                <p><strong>Category: </strong><?php echo $row['category']?></p>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                <p><strong>Massage: </strong><?php echo $row['message']?></p>
                                </div>
                               
                                <div class="form-group mb-2" style="width: 400px;">
                                <p><strong>Rating: </strong><?php echo $row['rating']?> Stars</p>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                <p><strong>Email: </strong><?php echo $row['email']?> Stars</p>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                <a class = "file" href="uploads/<?php echo $row['file_url'];?>" download>Download PDF</a>
                                </div>
                                <div class="form-group mb-2" style="width: 400px;">
                                <p><strong>Create At: </strong><?php echo $row['created_at']?></p>
                                </div>
                               
                            </div>
                    </div>
                </div>
            </div>
    </section>

<script src="../bootstrap.bundle.min.js"></script>
</body>

</html>