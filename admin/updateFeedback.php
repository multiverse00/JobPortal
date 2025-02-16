<?php
session_start();

require_once("../db.php");
   if(isset($_POST)){
    $category = $_POST['category'];
    $message = $_POST['message'];
    $rating = $_POST['rating'];
    $email = $_POST['email'];

    $sql = "UPDATE feedback SET category ='$category', message ='$message', rating = '$rating', email = '$email'
            WHERE id = '$_SESSION[feedback_id]'";
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