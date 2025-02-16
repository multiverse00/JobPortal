<?php
session_start();
require_once("../db.php");
$_SESSION['category_id'] = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Edit Category</title>
</head>

<body>
    <header class="main-header" style="background-color: #EBEAFF;">


        <nav class="navbar navbar-expand-lg navbar-light" style="margin-left: 40px;">
            <a class="navbar-brand" href="">Job Portal</a>
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
        <?php
        $sql = "SELECT * FROM category WHERE category_id = '$_GET[id]'" ;
        $result = $conn->query($sql);
         if($result->num_rows > 0) {
           $row = $result->fetch_assoc();
         }
       ?>
    <section style="margin-top: 100px;">
        <div class="container">
            <div class="row">
              
                <div class="col-md-8">
                    <h1 class="text-center">Edit Category</h1>
                    <form action="updateCategory.php" id="feedback-form" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Catagory Name</label>
                            <input type="text" id="text" class="form-control" name="category_name" value = "<?php echo $row['category_name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Category Description</label>
                            <textarea id="message" class="form-control" name="category_description" rows="5"placeholder="Catagory Description" required><?php echo $row['category_description']; ?></textarea>
                        </div>


                        <button type="submit" class="btn btn-success">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
        </section>

        <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>