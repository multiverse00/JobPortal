<?php
session_start();

require_once("../db.php");
   if(isset($_POST)){
    $cname = $_POST['category_name'];
	$cdescription = $_POST['category_description'];

    $sql = "INSERT INTO category(category_name,category_description)
            VALUES('$cname','$cdescription');";
    $result = $conn->query($sql);
    if($result){
        header("Location: allcategory.php");
    }

}

?>