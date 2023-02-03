<?php
include_once("db_connect.php");
$sqlEvents = "SELECT Id, Code, Arrival, Departure FROM roomreservation WHERE Status = 'Accepted' AND RoomRateId = 2 ";
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