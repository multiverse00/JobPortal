<?php
session_start();

require_once("../db.php");

$sql = "DELETE FROM job_seeker WHERE job_seeker_id = '$_GET[id]'";
$result = $conn->query($sql);
if($result){

 header("Location: alluser.php");

}

?>