<?php
session_start();

require_once("../db.php");
   if(isset($_POST)){
    $category = $_POST['category'];
    $message = $_PO ST['message'];
    $rating = $_POST['rating'];
    $email = $_POST['email'];


    $folder_dir = "uploads/";
    $base = basename($_FILES["file_upload"]["name"]);
    $profile_type = pathinfo($base,PATHINFO_EXTENSION);

    $file = uniqid().".".$profile_type;
    $filename = $folder_dir.$file;

    if(file_exists($_FILES["file_upload"]["tmp_name"])){
        if($profile_type == "pdf"){
            move_uploaded_file($_FILES["file_upload"]["tmp_name"],$filename);
        }
    }
    if(isset($_SESSION['job_seeker_id'])){
        $sid = "$_SESSION[job_seeker_id]";
        $author_type = "seeker";
    }
    if(isset($_SESSION['employer_id'])){
        $sid = "$_SESSION[employer_id]";
        $author_type = "company";
    }
    
    $sql = "INSERT INTO feedback(author_id, author_type, category, message, rating, email, file_url)
            VALUES('$sid','$author_type','$category','$message','$rating','$email','$file');";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['id'] = $conn->insert_id;
        if(isset($_SESSION['job_seeker_id'])){
            header("Location: showFeedback.php");
        }
        if(isset($_SESSION['employer_id'])){
            header("Location: cshowFeedback.php");
        }
        

       
    }

}

?>