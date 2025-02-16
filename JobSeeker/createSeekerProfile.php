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
    $dob = ( $_POST['dob']);
    $gender = ( $_POST['gender']);
	$division = ( $_POST['division']);
    $address = ( $_POST['address']);
	$skills = ( $_POST['skills']);
	$experience = ( $_POST['experience']);
	$qualification = ( $_POST['qualification']);
	$passingyear = ( $_POST['passingyear']);
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm_password"];

    if (!preg_match("/^[A-Za-z\s'-]+$/", $firstname) && preg_match("/^[A-Za-z\s'-]+$/", $lastname) ) {
        $errors['name'] = "Invalid firstname or lastname";
    }

    if (!preg_match("/^[0-9]{11}$/", $phonenumber)) {
        $errors['phone'] = "Invalid Phone Number";
    }

    if ($password !== $confirmpassword) {
        $errors['password'] = "Passwords does not match.";
    }

    $sql = "SELECT email FROM job_seeker WHERE email='$email'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
        $errors['email'] = "Email already exists";
    }

    $folder_dir = "uploads/profile/";
    $base = basename($_FILES["profile"]["name"]);
    $profile_type = pathinfo($base,PATHINFO_EXTENSION);

    $file = uniqid().".".$profile_type;
    $filename = $folder_dir.$file;

    if(file_exists($_FILES["profile"]["tmp_name"])){
        if($profile_type == "png" || $profile_type == "jpg"){
            move_uploaded_file($_FILES["profile"]["tmp_name"],$filename);
        }
        else{
            $errors['file'] = "Wrong Format. Only png or jpg Allowed";
        }
    }

    if(empty($errors)){
    $sql = "INSERT INTO job_seeker(first_name,last_name,email,phoneNumber,date_of_birth,qualification,skills,experience,division,address,gender,about_yourself,passing_year,profile_picture,PASSWORD,confirmPassword)
            VALUES('$firstname','$lastname','$email','$phonenumber','$dob','$qualification','$skills','$experience','$division','$address','$gender','$aboutme','$passingyear','$file','$password','$confirmpassword');";

    $result = $conn->query($sql);
    if($result){
        $_SESSION['job_seeker_id'] = $conn->insert_id;
        header("Location: seekerProfile.php");
    }
}
else{
    $_SESSION['errors'] = $errors; 
    header("Location: designSeekerProfile.php");
}

}


?>