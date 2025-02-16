<?php
session_start();

require_once("../db.php");
   if(isset($_POST)){
    $cname = $_POST['category_name'];
	$cdescription = $_POST['category_description'];
    $sql = "UPDATE category SET category_name = '$cname', category_description = '$cdescription' WHERE category_id = '$_SESSION[category_id]'";
    $result = $conn->query($sql);
    if($result){
        header("Location: allcategory.php");
        exit();
    }

}

?>