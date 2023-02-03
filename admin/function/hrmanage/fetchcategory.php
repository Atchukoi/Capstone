<?php 
include 'config.php';
$id = $_POST["x"];
$sql = "SELECT r.Id, r.Title, rc.Title AS Type, rc.Id as TypeId, rc.PersonCount, rrpt.Rate, rr.Description
FROM room r
LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
LEFT JOIN roomrate rr ON rr.RoomCategoryId = r.RoomCategoryId 
LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
WHERE rc.Id = $id AND r.RoomTypeId = 1 ";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {

$data['PersonCount'] = $row['PersonCount'];
$data['Rate'] = $row['Rate'];
$data['Description'] = $row['Description'];

}

echo json_encode($data);

?>