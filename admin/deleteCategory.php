<?php
session_start();
require_once("../db.php");
    $sql = "DELETE FROM category WHERE category_id = '$_GET[id]'";
    $result = $conn->query($sql);
    if($result){
        header("Location: allcategory.php");
        exit();
    }


?>