<?php
include 'config.php';
$id = $_GET['Id'];

$sql = "SELECT *, CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name , tblroom.Number
FROM roomreservation
LEFT JOIN tblguest ON tblreservation.GuestId = tblguest.Id
LEFT JOIN tblroom ON tblreservation.RoomId = tblroom.Id
Where tblreservation.Id = $id";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $Number = $row['Number'];
    $Name = $row['Name'];
    $RoomId = $row['RoomId'];
    $Arrival = $row['Arrival'];
    $Departure = $row['Departure'];
    $GuestId = $row['GuestId'];
    $Remarks = $row['Remarks'];
    $Deposit = $row['Deposit'];
    $Total = $row['Total'];
}

$bsql = "UPDATE `tblhotel` SET 

`RoomId`= $RoomId,
`Arrival`='$Arrival',
`Departure`='$Departure',
`GuestId`='$guestid',
`Remarks`='$Remarks',
`Deposit`='$Deposit',
`Total`='$Total' 
WHERE Id = $RoomId";
$bresult = mysqli_query($conn, $bsql);
if ($bresult) {
    header("Location: ../../dashboard.php?msg=$Name Is now set on Room $Number ");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

$osql = "UPDATE `tblroom` SET 
`GuestId`='$guestid',
`Status`='Occupied'
 WHERE Id = $RoomId";
 $oresult = mysqli_query($conn, $osql);

 $dsql = "DELETE FROM `tblreservation` WHERE Id = $id ";
 $dresult = mysqli_query($conn,$dsql);

?>
