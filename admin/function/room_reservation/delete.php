<?php 
include 'config.php';

$Id = $_GET['Id'];
$name = $_GET['name'];

$sql = "DELETE FROM `roomreservation` WHERE Id = $Id";
$result = mysqli_query($conn,$sql);

if($result) {
    header("Location: ../../hrrpending.php?msg=$name  reservation has been deleted.");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

?>