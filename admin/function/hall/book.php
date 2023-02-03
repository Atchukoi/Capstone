<?php
include 'config.php';
$id = $_GET['Id'];

if (isset($_POST['submit'])) {
    $RoomNumber = $_POST['bookroom'];
    $id = $_GET['Id'];

    $bsql = "SELECT  rr.Id, rr.Arrival, rr.Departure, rr.GuestId, rr.Notes,  rrpt.Id AS PriceTrail, rr.Total, rr.Deposit, CONCAT(u.FirstName,' ', u.LastName) AS Name
FROM roomreservation rr
LEFT JOIN roomrate ON roomrate.Id = rr.RoomRateId
LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = roomrate.RoomPriceTrailId
LEFT JOIN user u ON u.Id = rr.GuestId
WHERE rr.Id = $id";
    $bresult = mysqli_query($conn, $bsql);
    $brow = mysqli_fetch_assoc($bresult);

    
    $Name = $brow['Name'];
    $Arrival = $brow['Arrival'];
    $Departure = $brow['Departure'];
    $GuestId = $brow['GuestId'];
    $Notes = $brow['Notes'];
    $PriceTrail = $brow['PriceTrail'];
    $Deposit = $brow['Deposit'];
    $Total = $brow['Total'];


$csql = "UPDATE roomreservation SET `Status`='Booked' WHERE Id = $id ";
$cresult = mysqli_query($conn,$csql);

$fsql = "UPDATE `room` SET `RoomStatusId`='1' WHERE Id = $RoomNumber";
$fresult = mysqli_query($conn,$fsql);



    $dsql = "UPDATE `transaction` SET 

`ArrivalDateTime`='$Arrival',
`DepartureDateTime`='$Departure',
`RoomReservationId`='$id',
`UserId`='$GuestId',
`Notes`='$Notes',
`RoomChargesTotal`='$RoomChargesTotal',
`RoomPriceTrailId`='$PriceTrail',
`Deposit`='$Deposit',
`SubTotal`='$Total' 
WHERE RoomId = $RoomNumber";

    $dresult = mysqli_query($conn, $dsql);

    if ($dresult) {
        header("Location: ../../halldashboard.php?msg=$Name has been booked Succesfully");
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Perfecta</title>
    <!--Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--JS Query CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body style="background-color: rgba(237, 195, 238, 0.8);">

    <!-- Edit Reservation Modal -->

    <div class="container bg-light py-3 mt-5 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">

        <div class="row text-center my-5">
            <h1>Please assign a hall for the reservation</h1>
        </div>



        <div class="modal-body">
            <?php
            $sql = "SELECT rr.Code, CONCAT(u.FirstName,' ',u.LastName) AS Name, u.Contact, rr.Arrival, rr.Departure, rc.Title, rr.Deposit, rr.Total, rr.Notes, rr.Status, roomrate.RoomCategoryId
FROM roomreservation rr 
LEFT JOIN user u ON u.Id = rr.GuestId
LEFT JOIN roomrate ON roomrate.Id = rr.RoomRateId
LEFT JOIN roomcategory rc ON rc.Id = roomrate.RoomCategoryId
WHERE rr.Id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $RoomCategoryId = $row['RoomCategoryId'];
            ?>

            <div class="container">

                <div class="row mb-3">
                    <div class="col-lg-4 ">
                        <label for="update_confirmation" class="form-label">Confirmation Code :</label>
                        <input type="text" class="form-control" value="<?php echo $row['Code'] ?>" style="background-color: rgb(235,235,228)" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="update_name" class="form-label">Guest Name :</label>
                        <input type="text" class="form-control" value="<?php echo $row['Name'] ?>" style="background-color: rgb(235,235,228)" readonly>
                    </div>
                    <div class="col-lg-4">
                        <label for="update_contact" class="form-label">Contact :</label>
                        <input type="text" class="form-control" value="<?php echo $row['Contact'] ?>" style="background-color: rgb(235,235,228)" readonly>
                    </div>
                </div>
                <form action="" method="POST">
                    <div class="row mb-3">
                        <div class="col-lg-4">



                            <label for="update_room" class="form-label">Select Room :</label>
                            <select class="form-select form-select-md  mb-3" name="bookroom" aria-label=".form-select-lg example" required>
                                <option selected value="">Please Select a Room </option>
                                <?php
                                $asql = "SELECT r.Id, r.Title 
                FROM room r
                WHERE r.RoomStatusId = 2 AND r.RoomCategoryId = $RoomCategoryId";
                                $aresult = mysqli_query($conn, $asql);
                                while ($arow = mysqli_fetch_array($aresult)) {
                                    $RoomId = $arow['Id'];
                                    $RoomTitle = $arow['Title'];

                                    echo ' <option value= "' . $RoomId . '">' . $RoomTitle . '</option> ';
                                }
                                ?>

                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="update_arrival" class="form-label">Arrival :</label>
                            <input type="datetime" class="form-control" value="<?php echo $row['Arrival'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <label for="update_transaction" class="form-label">Room Category :</label>
                            <input type="text" class="form-control" value="<?php echo $row['Title'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label for="update_deposit" class="form-label">Deposit :</label>
                            <div class="input-group">
                                <div class="input-group-text">₱</div>
                                <input type="number" class="form-control" value="<?php echo $row['Deposit'] ?>" style="background-color: rgb(235,235,228)" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="update_total" class="form-label">Total :</label>
                            <div class="input-group">
                                <div class="input-group-text">₱</div>
                                <input type="number" name="RoomChargesTotal" class="form-control" style="background-color: rgb(235,235,228)" value="<?php echo $row['Total'] ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-">
                        <div class="col-lg-4">
                            <label for="update_remarks" class="form-label text-start"> Notes :</label>
                            <input type="text" class="form-control" value="<?php echo $row['Notes'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label for="update_status" class="form-label text-start">Status :</label>
                            <input type="text" class="form-control" value="<?php echo $row['Status'] ?>" style="background-color: rgb(235,235,228)" readonly>


                            </input>
                        </div>
                        <div class="col-lg-2 mt-4">
                            <button type="submit" class="btn btn-primary me-3" style="margin:auto; width:100%;" name="submit">Book Now</button>
                        </div>
                        <div class="col-lg-2 mt-4">
                            <a type="button" class="btn btn-danger" style="margin:auto; width:100%;" href="../../hrraccepted.php">Cancel</a>
                        </div>

                    </div>
                    <input type="hidden" value="<?php echo $id ?>">
                </form>

            </div>



        </div>
    </div>
</body>

<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>