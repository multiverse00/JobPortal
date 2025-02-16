<?php
session_start();

require_once("../db.php");
$sql = "DELETE FROM feedback WHERE id = '$_GET[id]'";
$result = $conn->query($sql);
if($result){
    header("Location: allfeedback.php");

}

?>