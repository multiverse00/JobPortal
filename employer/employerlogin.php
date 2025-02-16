<?php
session_start();

require_once("../db.php");
   if(isset($_POST)){

      $email = $_POST["email"];
      $password = $_POST["password"];

      $sql = "SELECT employer_id FROM  employer WHERE email = '$email' AND PASSWORD = '$password'";
      $result = $conn->query($sql);
      if($result->num_rows >= 1){
        
        $row = $result->fetch_assoc();
        $_SESSION['employer_id'] = $row['employer_id'];
        header("Location: employerProfile.php");
        
      }
      else{
        $_SESSION['check'] = "Invalid email or password";
        header("Location: login.php");
      } 
    }

?>