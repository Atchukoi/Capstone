<?php 
include 'config.php';

$Id = $_GET['Id'];
$FirstName = $_GET['FirstName'];
$LastName = $_GET['LastName'];

$sql = "DELETE FROM `tblreservation` WHERE Id = $Id";
$result = mysqli_query($conn,$sql);

if($result) {
    header("Location: ../../reservationlist.php?msg=$FirstName $LastName  reservation has been deleted.");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

?>