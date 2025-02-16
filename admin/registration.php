<?php

require_once("../db.php");
   if(isset($_POST)){

      $id = $_POST["id"];
      $username = $_POST["name"];
      $password = $_POST["password"];

      $sql = "INSERT INTO ADMIN(id_admin,username,password)
              VALUES('$id','$username','$password');";
      $result = $conn->query($sql);
      if($result){
        header("Location: catagory.html");
      } 
    }

?>