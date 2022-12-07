<?php 
include 'config.php';
$id = $_POST["x"];
$sql = "SELECT * FROM tblhall WHERE Id = $id";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
$data['Hour'] = $row['Time'];
$data['Price'] = $row['Cost'];
$data['Exceeding'] = $row['Exceeding'];

}

echo json_encode($data);

?>