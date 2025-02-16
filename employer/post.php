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
    <title>jobSeeker</title>
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
    <section class="d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <h1 class="text-center mb-4">Post a Job</h1>
                    <form action="jobPost.php" method="post" class="row g-3" role="form" enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="form-label">Job Title</label>
                            <input class="form-control" type="text" id="job_title" name="job_title" placeholder="Job Title" required>
                            <?php
           
                             if (!empty($errors['title'])) {
                                  echo "<p style='color:red;'>{$errors['title']}</p>";
                                  }
                             ?>
        
                        </div>
                        <div class="col-12">
                            <label class="form-label">Keyword</label>
                            <input class="form-control" type="text" id="keyword" name="keyword" placeholder="Keyword">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Vacancies</label>
                            <input class="form-control" type="number" id="vacancies" name="vacancies" min ="1" placeholder="Vacancies" required>
                        </div>
                        <div class="col-12">
                        <?php $sql = "SELECT * FROM category";
                          $result = $conn->query($sql);
                          if($result->num_rows > 0){
                        ?>
                            <label class="form-label">Catagory</label>
                            <select name="category" id="category" class="form-control" >
                            <option value="">Select a Category</option>
                            <?php
                               while($row = $result->fetch_assoc())
                               {
                                ?>
                        
                                <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
                                <?php } ?>
                            </select>
                
                        <?php } ?>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="4" id="description" name="description" placeholder="Description" required></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Employment Status</label>
                            <input type="radio" class="btn-check" name="job_type" id="full_time" value="Full time" required>
                            <label class="btn btn-outline-primary" for="full_time">Full Time</label>
                            
                            <input type="radio" class="btn-check" name="job_type" id="part_time" value="Part Time">
                            <label class="btn btn-outline-primary" for="part_time">Part Time</label>
                            
                            <input type="radio" class="btn-check" name="job_type" id="internship" value="Internship">
                            <label class="btn btn-outline-primary" for="internship">Internship</label>
                            
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Deadline</label>
                            <input class="form-control" type="date" id="deadline" name="deadline" required>
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Maximum Salary (K)</label>
                            <input class="form-control" type="number" id="max_salary" name="max_salary" required>
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Minimum Salary (K)</label>
                            <input class="form-control" type="number" id="min_salary" name="min_salary" required>
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Experience</label>
                            <input class="form-control" type="number" id="experience" name="experience">
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Skill</label>
                            <input class="form-control" type="text" id="skill" name="Skill" >
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Qualification</label>
                            <textarea class="form-control" rows="4" id="qualification" name="qualification" placeholder="Qualification" required></textarea>
                        </div>
                        <div class="col-12">
                            <label for="division" class="form-label">Division</label>
                            <select class="form-select mb-2" name="location" required>
                                <option selected>Division</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Chattogram">Chattogram</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Barishal">Barishal</option>
                                <option value="Mymensingh">Mymensingh</option>
                              </select>
                        </div>
                        <div class="col-12 text-center">
                        <?php if (isset($_SESSION['title'])) {?>
                          <p class="text-danger"><?php echo $_SESSION['title']?></p>
                         <?php } ?>
                            <button class="btn btn-success d-grid" type="submit">Post Job</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    unset($_SESSION['title']);
  ?>
    
    <script src="../bootstrap.bundle.min.js"></script>
</body>

</html>