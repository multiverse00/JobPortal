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
    $sql = "UPDATE interview SET title = '$title',interview_date = '$interviewDate',interview_time = '$interviewTime',location = '$location',contact_information = '$email',document = '$document'
            WHERE interview_id = '$_SESSION[interview_id]'";
    $result = $conn->query($sql);
    if($result){
        header("Location: viewInterview.php");
    }

}

?>