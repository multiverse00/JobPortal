<?php
   session_start();
   require_once("../db.php");
   if(isset($_POST)){
    $companyname = $_POST["companyname"];
    $alname = $_POST['alname'];
    $website = $_POST['website'];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phone_number"];
    $about = $_POST['about'];
    $location = $_POST['location'];

    if (!preg_match("/^[0-9]{11}$/", $phonenumber)) {
        $errors['contact'] = "Invalid Phone Number";
    }

    if(isset($_FILES)) {
    $folder_dir = "logos/";
    $base = basename($_FILES["image"]["name"]);
    $logo_type = pathinfo($base,PATHINFO_EXTENSION);

    $file = uniqid().".".$logo_type;
    $filename = $folder_dir.$file;

    if(file_exists($_FILES["image"]["tmp_name"])){
        if($logo_type == "png" || $logo_type == "jpg"){
            move_uploaded_file($_FILES["image"]["tmp_name"],$filename);
            $updatefile = true;
        }
        else{
            $errors['image'] = "Wrong Format. Only png or jpg Allowed";;
        }
    }
    }else{
        $updatefile = false;
    }

    if(empty($errors)){
    $sql = "UPDATE employer SET username = '$username',companyName ='$companyname',alternative_name = '$alname', website = '$website', email = '$email', phoneNumber = '$phonenumber', about = '$about' ,location = '$location'";
    
    if($updatefile) {
        $sql .= ",logo= '$file'";
    }
    $sql .= " WHERE employer_id = '$_SESSION[employer_id]';";

    $result = $conn->query($sql);
    if($result){
        header("Location: employerProfile.php");
    }
    }
    else{
        $_SESSION['errors'] = $errors; 
        header("Location: employerProfileUpdate.php");
    }

   }
   ?>