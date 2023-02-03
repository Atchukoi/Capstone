<?php 
include 'config.php'; 
$id = $_GET['id'];


$sql = "DELETE FROM `room` WHERE Id = $id";
$result = mysqli_query($conn,$sql);
if($result) {
    header("Location:../../roomdetails.php?msg=Room has been Deleted Succesfully");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

?>