<?php
include_once("db_connect.php");
$sqlEvents = "SELECT rr.Id, rr.Code, rr.Arrival, rr.Departure
FROM roomreservation rr
LEFT JOIN roomrate ON roomrate.Id = rr.RoomRateId
LEFT JOIN roomcategory rc ON rc.Id = roomrate.RoomCategoryId
WHERE rr.Status = 'Accepted' AND rc.Id = 6";
$resultset = mysqli_query($conn, $sqlEvents) or die("database error:". mysqli_error($conn));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	$start = strtotime($rows['Arrival']) * 1000;
	$end = strtotime($rows['Departure']) * 1000;	
	$calendar[] = array(
        'id' =>$rows['Id'],
        'title' => $rows['Code'],
        'url' => "#",
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$end"
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>