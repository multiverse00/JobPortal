<?php
session_start();
$errors = [];
require_once("../db.php");
   if(isset($_POST)){
    $alnumber = $_POST['alnumber'];
	$alemail = $_POST['alemail'];
    $esalary = $_POST['esalary'];
    
    if (!preg_match("/^[0-9]{11}$/", $alnumber)) {
        $errors['number'] = "Invalid Phone Number";
    }

    if(isset($_FILES)) {
    $folder_dir = "resume/";
    $base = basename($_FILES["resume"]["name"]);
    $profile_type = pathinfo($base,PATHINFO_EXTENSION);

    $file = uniqid().".".$profile_type;
    $filename = $folder_dir.$file;

    if(file_exists($_FILES["resume"]["tmp_name"])){
        if($profile_type == "pdf"){
            move_uploaded_file($_FILES["resume"]["tmp_name"],$filename);
            $uploadFile = true;
        }
        else{
            $errors['file'] = "Wrong formal pdf only";
        }
    }
}

else{
    $uploadFile = false;
}

    if(empty($errors)){
    
    $sql = "UPDATE application SET expected_salary = '$esalary',alternative_number = '$alnumber',alternative_email = '$alemail'";
            

    if($uploadFile) {
       $sql .= ", upload_resume = '$file'";
     }
    $sql .= " WHERE application_id = '$_SESSION[application_id]'";
    $result = $conn->query($sql);
    if($result){
        header("Location: userApplication.php");
    }
    }
    else{
        $_SESSION['errors'] = $errors; 
        header("Location: editApplication.php?id=". $_SESSION['application_id']);
    }
}

?>