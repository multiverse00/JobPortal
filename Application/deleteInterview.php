<?php
session_start();

require_once("../db.php");
 
    $sql = "DELETE FROM interview WHERE interview_id = '$_GET[id]'";
    $result = $conn->query($sql);
    if($result){
        header("Location: viewInterview.php");
    }

?>