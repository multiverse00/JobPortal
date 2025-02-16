<?php
session_start();

require_once("../db.php");

   $errors = [];
   if(isset($_POST)){
    $alNumber = $_POST['alternative_number'];
	$alEmail = $_POST['alternative_email'];
    $expectedSalary = $_POST['expected_salary'];

    if (!preg_match("/^[0-9]{11}$/", $alNumber)) {
        $errors['number'] = "Invalid Phone Number";
    }

    $folder_dir = "resume/";
    $base = basename($_FILES["resume"]["name"]);
    $profile_type = pathinfo($base,PATHINFO_EXTENSION);

    $file = uniqid().".".$profile_type;
    $filename = $folder_dir.$file;

    if(file_exists($_FILES["resume"]["tmp_name"])){
        if($profile_type == "pdf"){
            move_uploaded_file($_FILES["resume"]["tmp_name"],$filename);
        }
        else{
            $errors['file'] = "Wrong formal pdf only";
        }
    }

    $sid = $_SESSION['job_seeker_id'];
    $jobId = $_SESSION['job_id'];

    if(empty($errors)){
    $sql1 = "SELECT * FROM application WHERE job_seeker_id = '$sid' AND job_id = '$jobId';";
    $result1 = $conn->query($sql1);
    if($result1->num_rows == 0){
         $sql = "INSERT INTO application(job_seeker_id,job_id,expected_salary,alternative_number,alternative_email,upload_resume)
         VALUES('$sid','$jobId','$expectedSalary','$alNumber','$alEmail','$file');";
         $result = $conn->query($sql);
         if($result){
            header("Location: userApplication.php");
        }

    }
}
else{
    $_SESSION['errors'] = $errors; 
    header("Location: job_apply.php?id=" .$jobId);
}
    
   
   }
?>