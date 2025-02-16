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
    <title>Feedback Form</title>
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
    <form action="feedback.php" id="feedback-form" method="POST">
        <div class="mb-3">
            <label for="category" class="form-label">Feedback Category</label>
            <select id="category" class="form-control" name="category" required>
                <option value="Complaint">Complaint</option>
                <option value="Suggestion">Suggestion</option>
                <option value="Issue">Issue</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Feedback Message</label>
            <textarea id="message" class="form-control" name="message" rows="5" placeholder="Enter your feedback here" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Rating</label><br>
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="rating" value="1" required> 1 Star
            </label>
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="rating" value="2" required> 2 Stars
            </label>
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="rating" value="3" required> 3 Stars
            </label>
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="rating" value="4" required> 4 Stars
            </label>
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="rating" value="5" required> 5 Stars
            </label>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email if you'd like a follow-up">
        </div>
        <div class="mb-3">
            <label for="file-upload" class="form-label">Attach a File (Optional)</label>
            <input type="file" id="file-upload" class="form-control" name="file_upload">
        </div>

        <button type="submit" class="btn btn-success">Submit Feedback</button>
    </form>
</div>

<script src="../bootstrap.bundle.min.js"></script>
</body>
</html>
