<?php 
include 'config.php';

$Id = $_GET['Id'];
$name = $_GET['Name'];

$sql = "DELETE FROM `tblhallreservation` WHERE Id = $Id";
$result = mysqli_query($conn,$sql);

if($result) {
    header("Location: ../../hallreservationlist.php?msg=$name  reservation has been deleted.");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

?>