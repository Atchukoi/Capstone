<?php 
include 'config.php';
$Id = $_GET['Id'];
$sql = "DELETE FROM `tblroomextra` WHERE Id = $Id";
$result = mysqli_query($conn,$sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>