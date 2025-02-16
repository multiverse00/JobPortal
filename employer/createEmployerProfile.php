<?php
session_start();
require_once("../db.php");
    $errors = [];

   if(isset($_POST)){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phone_number"];
    $companyname = $_POST["companyname"];
    $alname = $_POST['alname'];
	$website = $_POST['website'];
    $about = $_POST['about'];
    $division = $_POST['division'];
    $location = $_POST['location'];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm_password"];

    if (!preg_match("/^[0-9]{11}$/", $phonenumber)) {
        $errors['contact'] = "Invalid Phone Number";
    }
    $sql = "SELECT email FROM employer WHERE email='$email'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
        $errors['email'] = "Email already exists";
    }
    
    if ($password !== $confirmpassword) {
        $errors['password'] = "Passwords does not match.";
    }
    $folder_dir = "logos/";
    $base = basename($_FILES["image"]["name"]);
    $logo_type = pathinfo($base,PATHINFO_EXTENSION);

    $file = uniqid().".".$logo_type;
    $filename = $folder_dir.$file;

    if(file_exists($_FILES["image"]["tmp_name"])){
        if($logo_type == "png" || $logo_type == "jpg"){
            move_uploaded_file($_FILES["image"]["tmp_name"],$filename);
        }
        else{
            $errors['image'] = "Wrong Format. Only png or jpg Allowed";;
        }
    }
    if(empty($errors)){
    $sql = "INSERT INTO employer(username,companyName,alternative_name,email,phoneNumber,website,logo,division,location,about,PASSWORD,confirmPassword)
            VALUES('$username','$companyname','$alname','$email','$phonenumber','$website','$file','$division','$location','$about','$password','$confirmpassword');";

    $result = $conn->query($sql);
    if($result){
        $_SESSION['employer_id'] = $conn->insert_id;
        header("Location: employerProfile.php");
    }
}
else{
    $_SESSION['errors'] = $errors; 
    header("Location: makeEmployerProfile.php");
}
   }
?>