<?php
session_start();

require_once("../db.php");

$sql = "DELETE FROM employer WHERE employer_id = '$_GET[id]'";
$result = $conn->query($sql);
if($result){

 header("Location: allcompnay.php");

}

?>