<?php 
include 'config.php';
$ExtraId = $_GET['ExtraId'];
$HotelId = $_GET['HotelId'];
$GuestId = $_GET['GuestId'];

$sql = "INSERT INTO `tblroomextra`
(`ExtraId`,`HotelId`, `GuestId`, `IsActive`) 
VALUES 
('$ExtraId','$HotelId','$GuestId','1')";
$result = mysqli_query($conn,$sql);
header('Location: ' . $_SERVER['HTTP_REFERER']);


?>