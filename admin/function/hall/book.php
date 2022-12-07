<?php 
include 'config.php';
error_reporting();
$Id = $_GET['Id'];
$GuestId = $_GET['Guestid'];

$sql ="SELECT *, CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS GuestName , tblhall.Name AS HallName 
FROM tblhallreservation
LEFT JOIN tblguest ON tblhallreservation.GuestId = tblguest.Id
LEFT JOIN tblhall ON tblhallreservation.HallId = tblhall.Id

WHERE tblhallreservation.Id = $Id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$GuestName = $row['GuestName'];
$HallName = $row['HallName'];

$Code = $row['Code'];
$GuestId = $row['GuestId'];
$Arrival = $row['Arrival'];
$Event = $row['Event'];
$ExtraHours = $row['ExtraHours'];
$HallId = $row['HallId'];
$HallTotal = $row['HallTotal'];
$HalllPackageId = $row['HalllPackageId'];
$SoundSytem = $row['SoundSytem'];
$FullLights = $row['FullLights'];
$Projector = $row['Projector'];
$VenueBasic = $row['VenueBasic'];
$VenueDecoration = $row['VenueDecoration'];
$VenueFull = $row['VenueFull'];
$StageBasic = $row['StageBasic'];
$StageTheme = $row['StageTheme'];
$MovingLights = $row['MovingLights'];
$FurnishedRoundTable = $row['FurnishedRoundTable'];
$RoundTable = $row['RoundTable'];
$RectangularTable = $row['RectangularTable'];
$TiffanyChair = $row['TiffanyChair'];
$RentTotal = $row['RentTotal'];
$FoodPackageId = $row['FoodPackageId'];
$NumberPax = $row['NumberPax'];
$PricePax = $row['PricePax'];
$FoodTotal = $row['FoodTotal'];
$AddSeafood = $row['AddSeafood'];
$AddPork = $row['AddPork'];
$AddChicken = $row['AddChicken'];
$AddVegetables = $row['AddVegetables'];
$AddTotal = $row['AddTotal'];
$Lechon = $row['Lechon'];
$Wine = $row['Wine'];
$OtherFood = $row['OtherFood'];
$CorkageTotal = $row['CorkageTotal'];
$Remarks = $row['Remarks'];
$Deposit = $row['Deposit'];
$GrandTotal = $row['GrandTotal'];

$asql = "UPDATE `tblfunctionhall` SET 
`Code`='$Code',
`GuestId`='$GuestId',
`Arrival`='$Arrival',
`Event`='$Event',
`ExtraHours`='$ExtraHours',
`HallTotal`='$HallTotal',
`HalllPackageId`='$HalllPackageId',
`SoundSytem`='$SoundSytem',
`FullLights`='$FullLights',
`Projector`='$Projector',
`VenueBasic`='$VenueBasic',
`VenueDecoration`='$VenueDecoration',
`VenueFull`='$VenueFull',
`StageBasic`='$StageBasic',
`StageTheme`='$StageTheme',
`MovingLights`='$MovingLights',
`FurnishedRoundTable`='$FurnishedRoundTable',
`RoundTable`='$RoundTable',
`RectangularTable`='$RectangularTable',
`TiffanyChair`='$TiffanyChair',
`RentTotal`='$RentTotal',
`FoodPackageId`='$FoodPackageId',
`NumberPax`='$NumberPax',
`PricePax`='$PricePax',
`FoodTotal`='$FoodTotal',
`AddSeafood`='$AddSeafood',
`AddPork`='$AddPork',
`AddChicken`='$AddChicken',
`AddVegetables`='$AddVegetables',
`AddTotal`='$AddTotal',
`Lechon`='$Lechon',
`Wine`='$Wine',
`OtherFood`='$OtherFood',
`CorkageTotal`='$CorkageTotal',
`Remarks`='$Remarks',
`Deposit`='$Deposit',
`GrandTotal`='$GrandTotal'

WHERE HallId = $HallId";
$aresult = mysqli_query($conn,$asql);
if ($aresult) {
    header("Location: ../../halldashboard.php?msg=$GuestName Is now set on $HallName ");
} else {
    echo "Failed: " . mysqli_connect_error($conn);
}

$dsql = "DELETE FROM `tblhallreservation` WHERE Id = $Id ";
$dresult = mysqli_query($conn,$dsql);


?>