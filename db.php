<?php
    $dbhost = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname ="jobportal";

    $conn = new mysqli($dbhost,$dbusername,$dbpassword,$dbname);

    if($conn->connect_error){
        die("Connection Error: ".$conn->connect_error);
    }
?>