<?php
session_start();

require_once("../db.php");
   if(isset($_POST)){
    $title = $_POST['blog_title'];
	$introduction = $_POST['introduction'];
    $content = $_POST['mainContent'];
    $conclusion = $_POST['conclusion'];
    $sid = $_SESSION['job_seeker_id'];
    $sql = "INSERT INTO blog(author_id,blog_title,introduction,content,conclusion)
            VALUES('$sid','$title','$introduction','$content','$conclusion');";
    $result = $conn->query($sql);
    if($result){
        $_SESSION['blog_id'] = $conn->insert_id;
        header("Location: ../JobSeeker/myblog.php");
    }

}

?>