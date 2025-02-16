<?php
session_start();

require_once("../db.php");
   if(isset($_POST)){
    $job_title = $_POST["job_title"];
    $keyword = $_POST["keyword"];
    $vacancies = $_POST["vacancies"];
    $category = $_POST["catagory"];
    $job_type = $_POST["job_type"];
    $description = $_POST["description"];
    $deadline = $_POST["deadline"];
    $max_salary = $_POST["max_salary"];
    $min_salary = $_POST["min_salary"];
    $experience = $_POST["experience"];
    $skill = $_POST["Skill"];
    $qualification = $_POST["qualification"];
    $location = $_POST["location"];

    if (!preg_match("/^[A-Za-z\s'-]+$/", $job_title) ) {
        $_SESSION['title'] = "Invalid job title";
    }

    if (isset($_SESSION['title'])) {
        header("Location: jobUpdate.php?id=" .$_SESSION['job_id']);
        exit();
    }
    $sql = "UPDATE jobs SET job_title = '$job_title',keyword ='$keyword',job_description = '$description', vacancies = '$vacancies', job_type = '$job_type', deadline = '$deadline', division = '$location',min_salary = '$min_salary',max_salary = '$max_salary',experience = '$experience',qualification = '$qualification',skills = '$skill'
    WHERE job_id = '$_SESSION[job_id]';";
    $result = $conn->query($sql);
    if($result){
        header("Location: myJob.php");
    }

}
?>