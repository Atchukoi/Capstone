<?php
include 'config.php';
$id = $_GET['Id'];
$name = $_GET['Name'];


$sql = "UPDATE `tblhallreservation` SET 
`Status`='Accepted' 

WHERE Id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../hallreservationlist.php?msg=$name reservation has been accepted.");
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
    }




?>