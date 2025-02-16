<?php
session_start();

require_once("../db.php");
   if(isset($_POST)){
    $title = $_POST['blog_title'];
	$introduction = $_POST['introduction'];
    $content = $_POST['mainContent'];
    $conclusion = $_POST['conclusion'];
    $sid = $_SESSION['job_seeker_id'];

    $sql = "UPDATE blog SET author_id ='$sid',blog_title = '$title',introduction = '$introduction',content = '$content',conclusion = '$conclusion'
            WHERE blog_id = '$_SESSION[blog_id]'";
    $result = $conn->query($sql);
    if($result){
        header("Location: ../JobSeeker/myblog.php");
    }

}

?>