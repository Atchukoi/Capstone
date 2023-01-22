<?php
include 'config.php';
$id = $_GET['Id'];
$FirstName = $_GET['FirstName'];
$LastName = $_GET['LastName'];

$sql = "UPDATE `roomreservation` SET 
`Status`='Accepted' 

WHERE Id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../hrraccepted.php?msg=$FirstName reservation has been accepted.");
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
    }




?>