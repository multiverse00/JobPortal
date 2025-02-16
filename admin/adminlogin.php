<?php
session_start();
require_once("../db.php");
   if(isset($_POST)){

      $username = $_POST["name"];
      $password = $_POST["password"];

      $sql = "SELECT * FROM admin WHERE username = '$username' AND PASSWORD = '$password'";
      $result = $conn->query($sql);
      if($result->num_rows == 1){
        
        $row = $result->fetch_assoc();
        header("Location: catagory.html");
        
      }
      else{
            $_SESSION['msg'] = "Wrong admin name or password";
            header("Location: designadminlogin.php");
         } 
    }

?>