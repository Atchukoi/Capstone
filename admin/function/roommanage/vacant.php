<?php
include 'config.php';
$id = $_GET['id'];

if (isset($_GET['id'])) {
    
    
    $sql = "UPDATE `tblroom` SET  `Status`='Vacant' WHERE Id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../roommanage.php?msg=Room $id is now Vacant");
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
    }
}
?>