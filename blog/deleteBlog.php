<?php
session_start();
require_once("../db.php");
 $sql = "DELETE FROM blog WHERE blog_id = '$_GET[id]'";
$result = $conn->query($sql);
if($result) {
    header("Location: ../JobSeeker/myblog.php");
}
?>
                