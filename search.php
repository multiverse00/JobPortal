<?php
session_start();

require_once("db.php");
   if(isset($_GET)){

      $keywords = $_GET["keywords"];
      $location = $_GET["location"];

      $sql = "SELECT * FROM jobs WHERE job_title LIKE '%$keywords%' OR keyword LIKE '%$keywords%'";
      if($location != ""){
        $sql .= "AND division = '$location'";
      }
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        
        $row = $result->fetch_assoc();
        header("Location: seekerProfile.php");
        
      }
    }

?>