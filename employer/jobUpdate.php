<?php 
 session_start();
 require_once("../db.php");

 $_SESSION['job_id'] = $_GET['id'];

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>jobSeeker</title>
</head>
<?php
    $sql = "SELECT * FROM jobs WHERE job_id = '$_GET[id]'";
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
                    <h1 class="text-center mb-4">Update Job</h1>
                    <form action="updateJob.php" method="post" class="row g-3" role="form" enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="form-label">Job Title</label>
                            <input class="form-control" type="text" id="job_title" name="job_title" value = "<?php echo $row['job_title']?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Keyword</label>
                            <input class="form-control" type="text" id="keyword" name="keyword" value = "<?php echo $row['keyword']?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Vacancies</label>
                            <input class="form-control" type="number" id="vacancies" name="vacancies" value = "<?php echo $row['vacancies']?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="4" id="description" name="description" placeholder="Description" required><?php echo $row['job_description']?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Employment Status</label>
                            <input type="radio" class="btn-check" name="job_type" id="full_time" value="Full Time" <?php if ( $row['job_type'] == 'Full Time') echo 'checked'; ?>>
                            <label class="btn btn-outline-primary" for="full_time">Full Time</label>
                            
                            <input type="radio" class="btn-check" name="job_type" id="part_time" value="Part Time" <?php if ( $row['job_type'] == 'Part Time') echo 'checked'; ?>>
                            <label class="btn btn-outline-primary" for="part_time">Part Time</label>
                            
                            <input type="radio" class="btn-check" name="job_type" id="internship" value="Internship" <?php if ( $row['job_type'] == 'Internship') echo 'checked'; ?>>
                            <label class="btn btn-outline-primary" for="internship">Internship</label>
                            
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Deadline</label>
                            <input class="form-control" type="date" id="deadline" name="deadline" value = "<?php echo $row['deadline']?>">
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Maximum Salary (K)</label>
                            <input class="form-control" type="number" id="max_salary" name="max_salary" value = "<?php echo $row['max_salary']?>">
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Minimum Salary (K)</label>
                            <input class="form-control" type="number" id="min_salary" name="min_salary" value = "<?php echo $row['min_salary']?>">
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Experience</label>
                            <input class="form-control" type="number" id="experience" name="experience" value = "<?php echo $row['experience']?>">
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Skill</label>
                            <input class="form-control" type="text" id="skill" name="Skill" value = "<?php echo $row['skills']?>">
                        </div>
                        <div class="col-12">
                            <label for="dob" class="form-label">Qualification</label>
                            <textarea class="form-control" rows="4" id="qualification" name="qualification" placeholder="Qualification" ><?php echo $row['qualification']?></textarea>
                        </div>
                        <div class="col-12">
                            <label for="division" class="form-label">Division</label>
                            <select class="form-select mb-2" name="location">
                                <option selected>Division</option>
                                <option value="Dhaka" <?php if ( $row['division'] == 'Dhaka') echo 'selected'; ?>>Dhaka</option>
                                <option value="Chattogram" <?php if ( $row['division'] == 'Chattogram') echo 'selected'; ?>>Chattogram</option>
                                <option value="Rajshahi" <?php if ( $row['division'] == 'Rajshahi') echo 'selected'; ?>>Rajshahi</option>
                                <option value="Khulna" <?php if ( $row['division'] == 'Khulna') echo 'selected'; ?>>Khulna</option>
                                <option value="Rangpur" <?php if ( $row['division'] == 'Rangpur') echo 'selected'; ?>>Rangpur</option>
                                <option value="Sylhet" <?php if ( $row['division'] == 'Sylhet') echo 'selected'; ?>>Sylhet</option>
                                <option value="Barishal" <?php if ( $row['division'] == 'Barishal') echo 'selected'; ?>>Barishal</option>
                                <option value="Mymensingh" <?php if ( $row['division'] == 'Mymensingh') echo 'selected'; ?>>Mymensingh</option>
                              </select>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-success d-grid" type="submit">Update Job Post</button>
                            <?php if (isset($_SESSION['title'])) {?>
                          <p class="text-danger"><?php echo $_SESSION['title']?></p>
                         <?php } ?>
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