<?php
include 'config.php';
session_start();
$GuestId = $_SESSION['GuestId'];
$Id = $_GET['Id'];


$sql = "DELETE FROM `roomreservation` WHERE Id = $Id";
$result = mysqli_query($conn,$sql);
header("Location: bookinglist.php?Id=$GuestId")


?>