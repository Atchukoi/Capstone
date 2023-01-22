<?php 
include 'config.php';
$id = $_POST["x"];
$sql = "SELECT * FROM foodpackage WHERE Id = $id";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {

$data['Description'] = $row['Description'];
$data['Menu'] = $row['Menu'];
$data['Minimum'] = $row['Minimum'];
$data['Maximum'] = $row['Maximum'];
$data['Cost'] = $row['Cost'];

}

echo json_encode($data);

?>