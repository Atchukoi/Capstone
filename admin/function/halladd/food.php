<?php 
include 'config.php';
$id = $_POST["x"];
$sql = "SELECT * FROM tblfoodpackage WHERE Id = $id";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {

$data['Description'] = $row['Description'];
$data['Menu'] = $row['Menu'];
$data['Pax50'] = $row['Pax50'];
$data['Pax80'] = $row['Pax80'];
$data['Pax100'] = $row['Pax100'];

}

echo json_encode($data);

?>