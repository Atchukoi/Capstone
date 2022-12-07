<?php 
include 'config.php';

$id = $_GET['id'];
$misc = $_GET['misc'];

$sql = "DELETE FROM `tblmisc` WHERE Id = $id";
$result = mysqli_query($conn,$sql);
if($result) {
    header("Location:../../misc.php?msg=$misc is now removed form the list");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

?>