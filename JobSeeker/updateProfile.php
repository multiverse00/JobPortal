<?php
   session_start();
   require_once("../db.php");

   $errors = [];
   if(isset($_POST)){
    $firstname = $_POST['fname'];
	$lastname = ($_POST['lname']);
    $email = $_POST['email'];
    $phonenumber = $_POST["phone_number"];
    $aboutme = ($_POST['aboutme']);
	$division = ( $_POST['division']);
    $address = ( $_POST['address']);
	$skills = ( $_POST['skills']);
	$experience = ( $_POST['experience']);
	$qualification = ( $_POST['qualification']);

    
    if (!preg_match("/^[A-Za-z\s'-]+$/", $firstname) && preg_match("/^[A-Za-z\s'-]+$/", $lastname) ) {
        $errors['name'] = "Invalid firstname or lastname";
    }

    if (!preg_match("/^[0-9]{11}$/", $phonenumber)) {
        $errors['phone'] = "Invalid Phone Number";
    }

  

    if(isset($_FILES)) {
        
    $folder_dir = "uploads/profile/";
    $base = basename($_FILES["profile"]["name"]);
    $profile_type = pathinfo($base,PATHINFO_EXTENSION);

    $file = uniqid().".".$profile_type;
    $filename = $folder_dir.$file;

    if(file_exists($_FILES["profile"]["tmp_name"])){
        if($profile_type == "png" || $profile_type == "jpg"){
            move_uploaded_file($_FILES["profile"]["tmp_name"],$filename);
            $upload = true;
        }
        else{
            $errors['file'] = "Wrong Format. Only png or jpg Allowed";
        }
    }
}else{
    $upload = false;
}
  
    if(empty($errors)){
    $sql = "UPDATE job_seeker SET first_name = '$firstname', last_name = '$lastname', email = '$email',phoneNumber = '$phonenumber',qualification = '$qualification', skills = '$skills', experience = '$experience',division = '$division', address = '$address',about_yourself = '$aboutme'";

    if($upload) {
		$sql .= ", profile_picture = '$file'";
	}

	$sql .= " WHERE job_seeker_id = '$_SESSION[job_seeker_id]';";

    $result = $conn->query($sql);
    if($result){
        header("Location: seekerProfile.php");
    }
}
else{
    $_SESSION['errors'] = $errors; 
    header("Location: seekerProfileUpdate.php");
}


}
   ?>