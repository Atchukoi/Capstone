<?php
include 'config.php';
$id = $_GET['id'];

if (isset($_GET['id'])) {
    
    
    $sql = "UPDATE `room` SET  `RoomStatusId`='4' WHERE Id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../roommanage.php?msg=Room $id is now ready for cleaning");
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
    }
}
?>