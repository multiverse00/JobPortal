<?php
session_start();
require_once("../db.php");

   $errors = [];

   if(isset($_POST)){
    $job_title = $_POST["job_title"];
    $keyword = $_POST["keyword"];
    $vacancies = $_POST["vacancies"];
    $category = $_POST["category"];
    $job_type = $_POST["job_type"];
    $description = $_POST["description"];
    $deadline = $_POST["deadline"];
    $max_salary = $_POST["max_salary"];
    $min_salary = $_POST["min_salary"];
    $experience = $_POST["experience"];
    $skill = $_POST["Skill"];
    $qualification = $_POST["qualification"];
    $location = $_POST["location"];
    $id = $_SESSION['employer_id'];
    
    if (!preg_match("/^[A-Za-z\s'-]+$/", $$job_title) ) {
        $_SESSION['title'] = "Invalid job title";
    }

    if (isset($_SESSION['title'])) {
        header("Location: post.php");
        exit();
    }
 
    $sql = "INSERT INTO jobs(employer_id, category_id, job_title, keyword, job_description, vacancies, job_type, deadline, division, min_salary, max_salary, experience, qualification, skills)
            VALUES('$id','$category','$job_title','$keyword','$description','$vacancies','$job_type','$deadline','$location','$min_salary','$max_salary','$experience','$qualification','$skill');";

    $result = $conn->query($sql);
    if($result){
        header("Location: myJob.php");
    }
    
}

?>