<?php

include 'config.php';
$Id = $_GET['RId'];

$asql = "SELECT r.Title AS RoomNumber, rc.Title AS RoomType, u.Id AS UserId, CONCAT(u.FirstName,' ',u.LastName) AS GuestName, rrpt.Rate, t.ArrivalDateTime, t.DepartureDateTime, t.RoomChargesTotal, t.Deposit, t.Total  
FROM transaction t
LEFT JOIN room r ON r.Id = t.RoomId
LEFT JOIN user u ON u.Id = t.UserId
LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
LEFT JOIN roomrate rr ON rr.RoomCategoryId = rc.Id
LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
WHERE t.RoomId = $Id";
$aresult = mysqli_query($conn, $asql);
$arow = mysqli_fetch_assoc($aresult);
$UserId = $arow['UserId'];


if (isset($_POST['addextra'])) {
    $ExtraID = $_POST['ExtraId'];
    $ExtraQuantity = $_POST['ExtraQuantity'];
    $Id = $_GET['RId'];

    $dresult = mysqli_query($conn, "SELECT Cost
    FROM  roomextra
    WHERE Id = $ExtraID");
    $drow = mysqli_fetch_assoc($dresult);

    $Cost = $ExtraQuantity * $drow['Cost'];

    $fsql = "INSERT INTO `transactionextra`
    (`TransactionId`, `RoomExtraId`,`UserId`, `Quantity`, `TotalAmount`, `IsActive`) 
    VALUES 
    ('$Id','$ExtraID','$UserId','$ExtraQuantity',' $Cost','1')";
    $fresult = mysqli_query($conn, $fsql);
}


if (isset($_POST['date'])) {
    $Departure = $_POST['Departure'];

    $gresult = mysqli_query($conn, "UPDATE `transaction` SET `DepartureDateTime`='$Departure' WHERE Id = $Id");
    header("refresh: 0;");
}


if (isset($_POST['checkout'])) {

    $Days = $_POST['Days'];
    $RoomCharges  = $_POST['RoomCharges'];
    $ExtraCharges = $_POST['ExtraCharges'];
    $Total = $_POST['Total'];
    $TotalDues  = $_POST['TotalDues'];

    $jsql = "UPDATE `transaction` SET 
    
    `RoomChargesTotal`='$RoomCharges',
    `ExtraChargesTotal`='$ExtraCharges',
    `SubTotal`='$Total',
    `Total`='$TotalDues'
     WHERE Id = $Id";
    $jresult = mysqli_query($conn, $jsql);
    header("Location: payment.php?TId=$Id&d=$Days");
}





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Perfecta</title>

    <!-- Font Awesome CDN -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <style>
        .cl {
            outline: 1px solid blue;
        }


        .tableWrap {
            height: 300px;
            border: 2px solid black;
            overflow: auto;
        }

        .tableWrap2 {
            height: 300px;
            border: 2px solid black;
            overflow: auto;
        }


        thead tr th {
            position: sticky;
            top: 0;
        }


        table {
            border-collapse: collapse;
        }


        th {
            padding: 16px;
            padding-left: 15px;
            border-left: 1px dotted rgba(200, 209, 224, 0.6);
            border-bottom: 1px solid #e8e8e8;
            background: #5bc0de;
            text-align: left;

            box-shadow: 0px 0px 0 2px #e8e8e8;
        }


        table {
            width: 100%;
            font-family: sans-serif;
        }

        table td {
            padding: 16px;
        }

        tbody tr {
            border-bottom: 2px solid #e8e8e8;
        }

        thead {
            font-weight: 500;
            color: rgba(0, 0, 0, 0.85);
        }

        tbody tr:hover {
            background: #e6f7ff;
        }
    </style>
</head>

<body>





    <div class="card">

        <div class="card-body" style="background-color:rgba(237, 195, 238, 0.8); height:maxcontent;">
            <div class="container-fluid ">
                <div class="row mb-5">

                    <div class="col-lg-9  border border-5 border-dark bg-white">
                        <div class="container " style="height: 500px; ">
                            <div class="row text-center ">
                                <div class="col fs-3 mb-2">
                                    <?php echo $arow['RoomNumber'] . ' - ' . $arow['RoomType'] ?> - <i class="fa-solid fa-user"></i> <?php echo $arow['GuestName'];   ?> 

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="hidden" class="form-control" id="PerNight" value="<?php echo $arow['Rate'] ?>">
                                </div>
                                <div class="col-lg-4">
                                    <input type="hidden" class="form-control" id="Arrival" value="<?php echo $arow['ArrivalDateTime'] ?>">
                                </div>
                                <div class="col-lg-4">
                                    <input type="hidden" class="form-control" id="Departure" value="<?php echo $arow['DepartureDateTime'] ?>">
                                </div>
                            </div>
                            <div class="row text-center mb-4">
                                <label for="" class="form-label"><i class="fa-solid fa-bed"></i> ₱ <?php echo $arow['Rate'] ?> / Night</label>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="" class="form-label "><i class="fa-regular fa-calendar-days"></i><strong>Check-in : </strong> <?php echo $arow['ArrivalDateTime'] ?> </label>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label"><i class="fa-regular fa-calendar-days"></i><strong>Check-Out : </strong><?php echo $arow['DepartureDateTime'] ?> </label>
                                </div>
                            </div>
                            


                            <div class="row">
                                <label for="" class="form-label fs-4"><i class="fa-solid fa-basket-shopping"></i> LIST OF EXTRA'S</label>
                                <div class="tableWrap">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th><span>No.</span></th>
                                                <th><span>Name</span></th>
                                                <th><span>Quantity</span></th>
                                                <th><span>Price</span></th>
                                                <th><span>Total</span></th>
                                                <th><span>Action</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $bresult = mysqli_query($conn, "SELECT re.Title ,te.Id, te.Quantity, re.Cost, te.TotalAmount
                                            FROM transactionextra te
                                            LEFT JOIN roomextra re ON re.Id = te.RoomExtraId
                                            WHERE te.TransactionId = $Id AND IsActive = 1");
                                            $number = 1;

                                            while ($brow = mysqli_fetch_assoc($bresult)) {;
                                            ?>
                                                <tr>
                                                    <td><?php echo $number ?></td>
                                                    <td><?php echo $brow['Title'] ?></td>
                                                    <td><?php echo $brow['Quantity'] ?></td>
                                                    <td><?php echo $brow['Cost'] ?></td>
                                                    <td><?php echo $brow['TotalAmount'] ?></td>
                                                    <td class="text-center">
                                                        <a class="btn btn-danger" href="function/hotel/deleteextra.php?Id=<?php echo $brow['Id'] ?>">
                                                            <i class="fa-solid fa-trash-can fa-xl"></i></a>
                                                    </td>
                                                </tr>
                                            <?php $number++;
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="row my-2">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header fs-4 bg-info">
                                        <strong>Bill Details</strong>
                                    </div>
                                    <form method="POST">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <label for="" class="form-label">Days : </label>
                                                    <input type="number" class="form-control" name="Days" id="Days" step=".01" style="background-color: rgb(235,235,228)" readonly>
                                                </div>

                                                <div class="col-lg-2">
                                                    <label for="" class="form-label">Room Charges : </label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" class="form-control" name="RoomCharges" id="RoomCharges" step=".01" style="background-color: rgb(235,235,228)" readonly value="<?php echo $arow['RoomChargesTotal'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">



                                                    <label for="" class="form-label">Extras Charges: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" class="form-control" name="ExtraCharges" id="ExtraCharges" step=".01" style="background-color: rgb(235,235,228)" readonly value="<?php $iresult = mysqli_query($conn, " SELECT SUM(te.TotalAmount) AS ExtraChargesTotal
                                            FROM transactionextra te
                                            LEFT JOIN roomextra re ON re.Id = te.RoomExtraId
                                            WHERE te.TransactionId = $Id AND IsActive = 1");
                                                                                                                                                                                                                $irow = mysqli_fetch_assoc($iresult);
                                                                                                                                                                                                                echo $irow['ExtraChargesTotal']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <label for="" class="form-label">Deposit: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" class="form-control" id="Deposit" value="<?php echo $arow['Deposit'] ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <label for="" class="form-label">Total: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" class="form-control" name="Total" id="Total" step=".01" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 ">
                                                    <label for="" class="form-label">Total Dues: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" class="form-control" name="TotalDues" id="TotalDues" step=".01" value="<?php echo $arow['Total'] ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="row text-end">


                                        </div>

                                </div>
                                <div class="col mb-5 mt-5">
                                    <button type="submit" name="checkout" class="btn btn-warning fs-4" style="width:100%"><i class="fa-solid fa-right-from-bracket"></i> Proceed Check-Out </button>
                                </div>
                            </div>
                            </form>
                        </div>


                    </div>



                    <div class="col-lg-3" style="height: 700px;">
                        <div class="container">
                            <div class="row text-end">
                                <div class="col mb-2 mt-2">
                                    <a href="dashboard.php" class="btn btn-danger fs-4" style="height:50px">Go Back to Dashboard <i class="fa-solid fa-share"> </i></a>
                                </div>
                            </div>

                            <div class="row mb-4">

                                <div class="col">
                                    <div class="card border-dark">
                                        <div class="card-header bg-info">
                                            <i class="fa-solid fa-cubes"></i>
                                            <strong>Extras</strong>
                                        </div>

                                        <?php
                                        $csql = "SELECT * FROM roomextra WHERE ExtraCategoryId = 1";
                                        $cresult = mysqli_query($conn, $csql);
                                        ?>
                                        <form method="post">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col">


                                                        <label for="" class="form-label"> Extra :</label>
                                                        <select class="form-select" name="ExtraId" aria-label="Default select example" required>
                                                            <option selected>Open this select menu</option>
                                                            <?php
                                                            while ($crow = mysqli_fetch_assoc($cresult)) {
                                                                $eid = $crow['Id'];
                                                                $etitle = $crow['Title'];
                                                                $Cost = $crow['Cost'];


                                                                echo ' <option value= "' . $eid . '">' . $etitle . ' @ ' . $Cost . '</option> ';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="" class="form-label"> Quantity :</label>
                                                        <input type="number" name="ExtraQuantity" class="form-control" min="1" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col text-center">
                                                        <button type="submit" class="btn btn-success" name="addextra" style="width: 100%;"><i class="fa-solid fa-square-plus"></i> Add Extra </button>
                                                    </div>
                                                </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
if (isset($_POST['change'])) {

    $roomselect = $_POST['upgrade'];

    $jresult = mysqli_query($conn, "SELECT * FROM transaction WHERE Id = $Id");
    $jrow = mysqli_fetch_assoc($jresult);


    $aRoomId = $jrow['RoomId']; 
    $aRoomReservationId = $jrow['RoomReservationId']; 
    $aArrivalDateTime = $jrow['ArrivalDateTime']; 
    $aDepartureDateTime = $jrow['DepartureDateTime']; 
    $aUserId = $jrow['UserId']; 
    $aNotes = $jrow['Notes']; 
    $aRoomPriceTrailId = $jrow['RoomPriceTrailId']; 
    $aRoomChargesTotal = $jrow['RoomChargesTotal']; 
    $aExtraChargesTotal = $jrow['ExtraChargesTotal']; 
    $aSubTotal = $jrow['SubTotal']; 
    $aDeposit = $jrow['Deposit']; 
    $aDiscount = $jrow['Discount']; 
    $aTotal = $jrow['Total']; 
    

    $kresult = mysqli_query($conn, "SELECT * FROM transaction WHERE Id = $roomselect");
    $krow = mysqli_fetch_assoc($kresult);

    $bRoomId = $krow['RoomId']; 
    $bRoomReservationId = $krow['RoomReservationId']; 
    $bArrivalDateTime = $krow['ArrivalDateTime']; 
    $bDepartureDateTime = $krow['DepartureDateTime']; 
    $bUserId = $krow['UserId']; 
    $bNotes = $krow['Notes']; 
    $bRoomPriceTrailId = $krow['RoomPriceTrailId']; 
    $bRoomChargesTotal = $krow['RoomChargesTotal']; 
    $bExtraChargesTotal = $krow['ExtraChargesTotal']; 
    $bSubTotal = $krow['SubTotal']; 
    $bDeposit = $krow['Deposit']; 
    $bDiscount = $krow['Discount']; 
    $bTotal = $krow['Total']; 
    


 $lsql = "UPDATE `transaction` SET 
 
 `RoomReservationId`='$aRoomReservationId',
 `ArrivalDateTime`='$aArrivalDateTime',
 `DepartureDateTime`='$aDepartureDateTime',
 `UserId`='$aUserId',
 `Notes`='$aNotes',
 `RoomPriceTrailId`='$aRoomPriceTrailId',
 `RoomChargesTotal`='$aRoomChargesTotal',
 `ExtraChargesTotal`='$aExtraChargesTotal',
 `SubTotal`='$aSubTotal',
 `Deposit`='$aDeposit',
 `Discount`='$aDiscount',
 `Total`='$aTotal'
  WHERE Id =  $roomselect";
$lresult= mysqli_query($conn,$lsql);

$nsql = "UPDATE `room` SET `RoomStatusId`='1' WHERE Id = $roomselect";
$nresult = mysqli_query($conn,$nsql);

$psql = "UPDATE `transactionextra` SET `TransactionId`='$roomselect' WHERE TransactionId = $Id AND IsActive = 1";
$presult = mysqli_query($conn,$psql);




 $msql = "UPDATE `transaction` SET 
 
 `RoomReservationId`='$bRoomReservationId',
 `ArrivalDateTime`='$bArrivalDateTime',
 `DepartureDateTime`='$bDepartureDateTime',
 `UserId`='$bUserId',
 `Notes`='$bNotes',
 `RoomPriceTrailId`='$bRoomPriceTrailId',
 `RoomChargesTotal`='$bRoomChargesTotal',
 `ExtraChargesTotal`='$bExtraChargesTotal',
 `SubTotal`='$bSubTotal',
 `Deposit`='$bDeposit',
 `Discount`='$bDiscount',
 `Total`='$bTotal'
  WHERE Id = $Id";
  $mresult= mysqli_query($conn,$msql);

$osql = "UPDATE `room` SET `RoomStatusId`='2' WHERE Id = $Id";
$oresult = mysqli_query($conn,$osql);

echo '<script language="JavaScript" type="text/javascript">history.back(3)</script>';
echo '<script language="javascript">';
echo 'alert("Successfully Changed Room, go back to Dashboard")';
echo '</script>';
  
    



}
?>

                    <form method="POST">
                        <div class="row">

                            <div class="col">
                                <label for="" class="form-label"><i class="fa-regular fa-calendar-check"></i> <strong>CHECKOUT DATE </strong> </label>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <input type="datetime-local" name="Departure" class="form-control mb-2">

                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success mb-3" name="date" type="submit" style="float: right; width:100%"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Save</button>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col">
                                <label for="" class="form-label"><i class="fa-solid fa-cart-flatbed-suitcase"></i> <strong>CHANGE ROOM </strong> </label>

                            </div>
                        </div>
                        

                        

                    </form>

                    <form method="POST">
                    <div class="row mb-3">
                            <div class="col-md-8">
                            <select class="form-select form-select-md  mb-3" name="upgrade" aria-label=".form-select-lg example" required>
                                <option selected value="">Please Select a Room </option>
                                <?php
                                $asql = "SELECT r.Id, r.Title 
                FROM room r
                WHERE r.RoomStatusId = 2 AND r.RoomTypeId = 1";
                                $aresult = mysqli_query($conn, $asql);
                                while ($arow = mysqli_fetch_array($aresult)) {
                                    $RoomId = $arow['Id'];
                                    $RoomTitle = $arow['Title'];

                                    echo ' <option value= "' . $RoomId . '">' . $RoomTitle . '</option> ';
                                }
                                ?>

                            </select>

                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success mb-3"  type="submit" name="change" style="float: right; width:100%"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Change</button>
                            </div>

                        </div>  

                    </form>






                </div>

            </div>
        </div>

    </div>
    </div>
    </div>





</body>


<script>
    $(document).ready(function() {




        var start_date = new Date(document.getElementById('Arrival').value);
        var end_date = new Date(document.getElementById('Departure').value);
        //Here we will use getTime() function to get the time difference
        var time_difference = end_date.getTime() - start_date.getTime();
        //Here we will divide the above time difference by the no of miliseconds in a day
        var days_difference = time_difference / (1000 * 3600 * 24);
        //alert(days);
        document.getElementById('Days').value = days_difference.toFixed(2);

        var RoomTotal = 0;
        var y = Number($("#PerNight").val());
        var aRoomTotal = days_difference * y;
        var RoomTotal = aRoomTotal.toFixed(2);
        $("#RoomCharges").val(RoomTotal);

        var Total = 0;
        var a = Number($("#RoomCharges").val());
        var b = Number($("#ExtraCharges").val());
        var aTotal = a + b;
        var Total = aTotal.toFixed(2);
        $("#Total").val(Total);

        var TotalDues = 0;
        var d = Number($("#Deposit").val());
        var t = Number($("#Total").val());
        var TotalDues = t - d;
        $("#TotalDues").val(TotalDues);


    });

    // Date Limitation
    var Departure = new Date(document.getElementById('Departure').value);
    Departure = new Date(Departure.setDate(Departure.getDate() + 2)).toISOString().split('T')[0];
    document.getElementsByName("Departure")[0].setAttribute('min', Departure);
</script>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


</html>