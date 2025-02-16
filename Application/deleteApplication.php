<?php
session_start();

require_once("../db.php");
 
    $sql = "DELETE FROM application WHERE application_id = '$_GET[id]'";
    $result = $conn->query($sql);
    if($result){
        header("Location: userApplication.php");
    }

?>