<?php
include 'config.php';
$id = $_GET['Id'];
$name = $_GET['name'];

$sql = "UPDATE `roomreservation` SET 
`Status`='Lapsed' 

WHERE Id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../hrraccepted.php?msg=$name reservation has been set to Lapsed.");
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
    }




?>