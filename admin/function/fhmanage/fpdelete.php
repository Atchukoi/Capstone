<?php 
include 'config.php';
$id = $_GET['id'];
$name = $_GET['name'];
$sql = "DELETE FROM `tblfoodpackage` WHERE Id = $id";
$result = mysqli_query($conn,$sql);
if($result) {
    header("Location: ../../foodpackage.php?msg=$name has been deleted Succesfully!");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

?>