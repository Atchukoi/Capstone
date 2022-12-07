<?php 
include 'config.php';
$id = $_GET['id'];
$name = $_GET['name'];
$sql = "DELETE FROM `tblextra` WHERE Id = $id";
$result = mysqli_query($conn,$sql);
if($result) {
    header("Location: ../../extras.php?msg=$name has been deleted Succesfully!");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

?>