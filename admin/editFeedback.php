<?php
  session_start();
  require_once("../db.php");

  $_SESSION['feedback_id'] = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Feedback Form</title>
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
<div class="container mt-5">
    <h1 class="text-center">Submit Your Feedback</h1>
    <form action="updateFeedback.php" id="feedback-form" method="POST">
        <div class="mb-3">
            <label for="category" class="form-label">Feedback Category</label>
            <select id="category" class="form-control" name="category" required>
                <option value="Complaint" <?= $row['category'] == 'Complaint' ? 'selected' : '' ?>>Complaint</option>
                <option value="Suggestion" <?= $row['category'] == 'Suggestion' ? 'selected' : '' ?>>Suggestion</option>
                <option value="Issue" <?= $row['category'] == 'Issue' ? 'selected' : '' ?>>Issue</option>
                <option value="Other"  <?= $row['category'] == 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Feedback Message</label>
            <textarea id="message" class="form-control" name="message" rows="5" placeholder="Enter your feedback here" required><?php echo $row['message'] ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Rating</label><br>
            <?php for ($i = 1; $i <= 5; $i++) { ?>
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="rating" value="<?= $i ?>" <?= $row['rating'] == $i ? 'checked' : '' ?>> <?= $i ?> Star<?= $i > 1 ? 's' : '' ?>
            </label>
            <?php } ?>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row['email']?>">
        </div>

        <button type="submit" class="btn btn-success">Update Feedback</button>
    </form>
</div>

<script src="../bootstrap.bundle.min.js"></script>
</body>
</html>
