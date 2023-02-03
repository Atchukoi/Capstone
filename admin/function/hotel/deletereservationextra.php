<?php 
include 'config.php';
$Id = $_GET['Id'];
$EId = $_GET['EId'];
$sql = "DELETE FROM `roomreservationextra` WHERE RoomReservationId = $Id AND RoomExtraId = $EId";
$result = mysqli_query($conn,$sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>