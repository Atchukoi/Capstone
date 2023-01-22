<?php 
include 'config.php'; 
$id = $_GET['id'];
$name = $_GET['name'];

$sql = "DELETE FROM `roomcategory` WHERE Id = $id";
$result = mysqli_query($conn,$sql);
if($result) {
    header("Location:../../roomtypes.php?msg=$name Type has been Deleted Succesfully");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

?>