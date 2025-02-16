<?php
session_start();

require_once("../db.php");
   if(isset($_POST)){
    $title = $_POST['title'];
	$interviewDate = $_POST['interview_date'];
    $interviewTime = $_POST['interview_time'];
    $location = $_POST['location'];
    $email = $_POST['contact'];
    $document = $_POST['document'];
    $sid = $_SESSION['seeker_id'];
    $jobId = $_SESSION['job_id'];
    $eid = $_SESSION['employer_id'];
    $aid = $_SESSION['application_id'];
    $sql = "INSERT INTO interview(job_seeker_id,employer_id,job_id,application_id,title,interview_date,interview_time,location,contact_information,document)
            VALUES('$sid','$eid','$jobId','$aid','$title','$interviewDate','$interviewTime','$location','$email','$document');";
    $result = $conn->query($sql);
    if($result){
        header("Location: showApplication.php");
    }
}

?>