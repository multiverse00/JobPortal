<?php 
 session_start();
 require_once("db.php");

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Jobs</title>
</head>
<body>
<header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light" style="margin-left: 40px;">
            <a class="navbar-brand" href="index.php">Job Portal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="margin-right: 40px;">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="blog/showBlog.php">Blog</a>
                    </li>
                    <?php  if(empty($_SESSION['employer_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="job.php">Find Jobs</a>
                    </li>
                    <?php }?>
                    <?php  if(empty($_SESSION['job_seeker_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="employer/login.php">Post Job</a>
                    </li>
                    <?php }?>
                    <?php if(empty($_SESSION['job_seeker_id']) && empty($_SESSION['employer_id'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="jobSeeker/designseekerLogin.php">Job Seeker Login</a>
                            <a class="dropdown-item" href="employer/login.php">Employer Login</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Create Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="jobSeeker/designSeekerProfile.php">Job Seeker Registration</a>
                            <a class="dropdown-item" href="employer/makeEmployerProfile.php">Employer Registration</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/designadminlogin.php">Admin</a>
                    </li>
                    <?php }?>
                    <?php if(isset($_SESSION['job_seeker_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="JobSeeker/seekerProfile.php">Dashboard</a>
                    </li>
                    <?php }?>
                    <?php if(isset($_SESSION['employer_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="employer/employerProfile.php">Dashboard</a>
                    </li>
                    <?php }?>
                    <?php if(isset($_SESSION['job_seeker_id']) || isset($_SESSION['employer_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php }?>
                </ul>
            </div>
        </nav>
    </header>

<section class="section-3 py-5 bg-2 lg-light ">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-4 col-lg-3 sidebar mb-4">
                    <div class="card border-0 p-4">
                        <h2>Keywords</h2>
                        <div class="d-inline-flex gap-2 align-items-center ">
                            <form method="GET" action="">
                                <input type="text" name="keywords" value="<?php echo isset($_GET['keywords']) ? $_GET['keywords'] : ''; ?>" placeholder="Keywords" class="form-control">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>

                        <div class="mb-4">
                            <h2>Location</h2>
                            <form method="GET" action="">
                                <select name="location" class="form-control">
                                    <option value="">Location</option>
                                    <option value="Remote" <?php echo isset($_GET['location']) && $_GET['location'] == 'Remote' ? 'selected' : ''; ?>>Remote</option>
                                    <option value="Dhaka" <?php echo isset($_GET['location']) && $_GET['location'] == 'Dhaka' ? 'selected' : ''; ?>>Dhaka</option>
                                    <option value="Chattogram" <?php echo isset($_GET['location']) && $_GET['location'] == 'Chattogram' ? 'selected' : ''; ?>>Chattogram</option>
                                    <option value="Rajshahi" <?php echo isset($_GET['location']) && $_GET['location'] == 'Rajshahi' ? 'selected' : ''; ?>>Rajshahi</option>
                                    <option value="Khulna" <?php echo isset($_GET['location']) && $_GET['location'] == 'Khulna' ? 'selected' : ''; ?>>Khulna</option>
                                    <option value="Rangpur" <?php echo isset($_GET['location']) && $_GET['location'] == 'Rangpur' ? 'selected' : ''; ?>>Rangpur</option>
                                    <option value="Sylhet" <?php echo isset($_GET['location']) && $_GET['location'] == 'Sylhet' ? 'selected' : ''; ?>>Sylhet</option>
                                    <option value="Barishal" <?php echo isset($_GET['location']) && $_GET['location'] == 'Barishal' ? 'selected' : ''; ?>>Barishal</option>
                                    <option value="Mymensingh" <?php echo isset($_GET['location']) && $_GET['location'] == 'Mymensingh' ? 'selected' : ''; ?>>Mymensingh</option>
                                </select>
                                <button class="btn btn-outline-success mt-2" type="submit">Filter</button>
                            </form>
                        </div>

                        <div class="mb-4">
                            <h2>Category</h2>
                            <?php 
                                $sql = "SELECT * FROM category";
                                $result = $conn->query($sql);
                                if($result->num_rows > 0) {
                            ?>
                            <form method="GET" action="">
                                <select name="category" class="form-control">
                                    <option value="">Select a Category</option>
                                    <?php
                                       while($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['category_id']?>" <?php echo isset($_GET['category']) && $_GET['category'] == $row['category_id'] ? 'selected' : ''; ?>><?php echo $row['category_name']?></option>
                                    <?php } ?>
                                </select>
                                <button class="btn btn-outline-success mt-2" type="submit">Filter</button>
                            </form>
                            <?php } ?>
                        </div>

                        <div class="mb-4">
                            <h2>Job Type</h2>
                            <form method="GET" action="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="job_type[]" value="Full Time" <?php echo isset($_GET['job_type']) && in_array('Full Time', $_GET['job_type']) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Full Time</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="job_type[]" value="Part Time" <?php echo isset($_GET['job_type']) && in_array('Part Time', $_GET['job_type']) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Part Time</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="job_type[]" value="Internship" <?php echo isset($_GET['job_type']) && in_array('Internship', $_GET['job_type']) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Internship</label>
                                </div>
                                <button class="btn btn-outline-success mt-2" type="submit">Filter</button>
                            </form>
                        </div>

                        <div class="mb-4">
                            <h2>Experience</h2>
                            <form method="GET" action="">
                                <select name="experience" class="form-control">
                                    <option value="">Select Experience</option>
                                    <option value="1" <?php echo isset($_GET['experience']) && $_GET['experience'] == '1' ? 'selected' : ''; ?>>1 Year</option>
                                    <option value="2" <?php echo isset($_GET['experience']) && $_GET['experience'] == '2' ? 'selected' : ''; ?>>2 Years</option>
                                    <option value="3" <?php echo isset($_GET['experience']) && $_GET['experience'] == '3' ? 'selected' : ''; ?>>3 Years</option>
                                    <option value="4" <?php echo isset($_GET['experience']) && $_GET['experience'] == '4' ? 'selected' : ''; ?>>4 Years</option>
                                    <option value="5" <?php echo isset($_GET['experience']) && $_GET['experience'] == '5' ? 'selected' : ''; ?>>5 Years</option>
                                    <option value="6" <?php echo isset($_GET['experience']) && $_GET['experience'] == '6' ? 'selected' : ''; ?>>6 Years</option>
                                    <option value="7" <?php echo isset($_GET['experience']) && $_GET['experience'] == '7' ? 'selected' : ''; ?>>7 Years</option>
                                    <option value="8" <?php echo isset($_GET['experience']) && $_GET['experience'] == '8' ? 'selected' : ''; ?>>8 Years</option>
                                    <option value="9" <?php echo isset($_GET['experience']) && $_GET['experience'] == '9' ? 'selected' : ''; ?>>9 Years</option>
                                    <option value="10" <?php echo isset($_GET['experience']) && $_GET['experience'] == '10' ? 'selected' : ''; ?>>10 Years</option>
                                    <option value="10+" <?php echo isset($_GET['experience']) && $_GET['experience'] == '10+' ? 'selected' : ''; ?>>10+ Years</option>
                                </select>
                                <button class="btn btn-outline-success mt-2" type="submit">Filter</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        <?php
                            $keywords = isset($_GET['keywords']) ? $_GET['keywords'] : '';
                            $location = isset($_GET['location']) ? $_GET['location'] : '';
                            $category = isset($_GET['category']) ? $_GET['category'] : '';
                            $experience = isset($_GET['experience']) ? $_GET['experience'] : '';
                            $job_types = isset($_GET['job_type']) ? $_GET['job_type'] : [];

                            $sql = "SELECT * FROM jobs WHERE 1";

                            if (!empty($keywords)) {
                                $sql .= " AND (job_title LIKE '%$keywords%' OR keyword LIKE '%$keywords%')";
                            }
                            if (!empty($location)) {
                                $sql .= " AND division = '$location'";
                            }
                            if (!empty($category)) {
                                $sql .= " AND category_id = '$category'";
                            }
                            if (!empty($experience)) {
                                $sql .= " AND experience >= '$experience'";
                            }
                            if (!empty($job_types)) {
                                $sql .= " AND job_type IN ('" . implode("','", $job_types) . "')";
                            }

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $sql1 = "SELECT logo, companyName FROM employer WHERE employer_id = '$row[employer_id]'";
                                    $result1 = $conn->query($sql1);
                                    if ($result1->num_rows > 0) {
                                        while ($row1 = $result1->fetch_assoc()) {
                        ?>
                        <div class="card mb-3 col-md-12" style="height: 10rem;">
                            <div class="row g-0 h-100">
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a class="text-decoration-none" href="jobView.php?id=<?php echo $row['job_id']; ?>"><?php echo $row['job_title']; ?></a>
                                        </h5>
                                        <p class="card-text"><?php echo $row1['companyName']; ?></p>
                                        <p class="card-text"><?php echo $row['division'] . ' | Experience: ' . $row['experience'] . ' Years'; ?></p>
                                        <p class="card-text"> Deadline: <?php echo date("Y, F d", strtotime($row['deadline'])); ?> </p>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center">
                                    <img src="employer/logos/<?php echo $row1['logo']; ?>" class="img-fluid rounded-end" alt="Card Image">
                                </div>
                            </div>
                        </div>
                        <?php
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>
