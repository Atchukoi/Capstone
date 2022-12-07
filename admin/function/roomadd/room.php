<?php 
include 'config.php';
$id = $_POST["x"];
$sql = "SELECT tblroom.Id AS RoomId, tblroom.RoomTypeId, tblroomtype.Rate
FROM tblroom
JOIN tblroomtype ON tblroom.RoomTypeId = tblroomtype.Id
WHERE tblroom.Id = $id";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
$data['Rate'] = $row['Rate'];


}

echo json_encode($data);

?>