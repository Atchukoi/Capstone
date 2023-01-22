<?php 
include 'config.php';
$id = $_POST["x"];
$sql = "SELECT   rc.Id, rrpt.Rate
FROM room r
LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
LEFT JOIN roomrate rr ON rr.RoomCategoryId  = rc.Id
LEFT JOIN roomratepricetrail rrpt ON rrpt.id = rr.RoomPriceTrailId
LEFT JOIN roomstatus rs ON rs.Id = r.RoomStatusId
LEFT JOIN transaction t ON t.Id = r.Id
LEFT JOIN user u ON u.Id = t.UserId
WHERE rc.Id = $id";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
$data['Rate'] = $row['Rate'];


}

echo json_encode($data);

?>