<?php
session_start();

require_once("../db.php");
   if(isset($_POST)){

      $email = $_POST["email"];
      $password = $_POST["password"];

      $sql = "SELECT job_seeker_id FROM job_seeker WHERE email = '$email' AND PASSWORD = '$password'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        
        $row = $result->fetch_assoc();
        $_SESSION['job_seeker_id'] = $row['job_seeker_id'];
        header("Location: seekerProfile.php");
        
      }
      else{
         $_SESSION['invalid'] = "Wrong email or password";
         header("Location: designseekerlogin.php");
      } 
    }

?>