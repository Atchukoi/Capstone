<?php 
include 'config.php';
$Id = $_GET['Id'];
$sql = "DELETE FROM `transactionextra` WHERE Id = $Id";
$result = mysqli_query($conn,$sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>