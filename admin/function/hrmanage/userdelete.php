<?php 
include 'config.php'; 
$id = $_GET['id'];
$name = $_GET['name'];

$sql = "DELETE FROM `user` WHERE Id = $id";
$result = mysqli_query($conn,$sql);
if($result) {
    header("Location:../../userlist.php?msg=$name Account has been Deleted Succesfully");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

?>
