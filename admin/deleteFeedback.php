<?php
session_start();

require_once("../db.php");
$id = $_GET['id'];
$sql = "DELETE FROM feedback WHERE id = '$id'";
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

?>