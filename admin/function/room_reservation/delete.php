<?php 
include 'config.php';

$Id = $_GET['Id'];
$FirstName = $_GET['FirstName'];
$LastName = $_GET['LastName'];

$sql = "UPDATE `roomreservation` SET 
`Status`='Lapsed";
$result = mysqli_query($conn,$sql);

if($result) {
    header("Location: ../../hrraccepted.php?msg=$FirstName $LastName  reservation has been deleted.");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

?>