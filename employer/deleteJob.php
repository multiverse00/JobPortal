<?php
session_start();

require_once("../db.php");
 
    $sql = "DELETE FROM jobs WHERE job_id = '$_GET[id]'";
    $result = $conn->query($sql);
    if($result){
        header("Location: myJob.php");
    }

?>