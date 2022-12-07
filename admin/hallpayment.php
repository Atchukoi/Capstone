<?php
include 'config.php';
$Id = $_GET['Id'];
$GuestId = $_GET['GuestId'];

$result = mysqli_query($conn, "SELECT * FROM tblfunctionhall  WHERE Id = $Id ");
$row = mysqli_fetch_assoc($result);

$HallId = $row['HallId'];
$Code = $row['Code'];
$GuestId = $row['GuestId'];
$Arrival = $row['Arrival'];
$Event = $row['Event'];
$ExtraHours = $row['ExtraHours'];
$HallTotal = $row['HallTotal'];
$HalllPackageId = $row['HalllPackageId'];
$SoundSytem = $row['SoundSytem'];
$FullLights = $row['FullLights'];
$Projector = $row['Projector'];
$VenueBasic = $row['VenueBasic'];
$VenueDecoration = $row['VenueDecoration'];
$VenueFull = $row['VenueFull'];
$StageBasic = $row['StageBasic'];
$StageTheme	= $row['StageTheme'];
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
$GrandTotalDues = $row['GrandTotalDues'];
$Discount = $row['Discount'];
$GrandTotalDuesDiscount = $row['GrandTotalDuesDiscount'];
$PaymentType = $row['PaymentType'];
$Tender = $row['Tender'];
$TransactionCode = $row['TransactionCode'];
$Changes = $row['Changes'];

if (isset($_POST['next'])) {

    $esql = "INSERT INTO `tblhalltransaction`
    (`HallId`, `Code`, `GuestId`, `Arrival`, `Event`, `ExtraHours`, `HallTotal`, `HalllPackageId`, `SoundSytem`, `FullLights`, `Projector`, `VenueBasic`, `VenueDecoration`, `VenueFull`, `StageBasic`, `StageTheme`, `MovingLights`, `FurnishedRoundTable`, `RoundTable`, `RectangularTable`, `TiffanyChair`, `RentTotal`, `FoodPackageId`, `NumberPax`, `PricePax`, `FoodTotal`, `AddSeafood`, `AddPork`, `AddChicken`, `AddVegetables`, `AddTotal`, `Lechon`, `Wine`, `OtherFood`, `CorkageTotal`, `Remarks`, `Deposit`, `GrandTotal`, `GrandTotalDues`, `Discount`, `GrandTotalDuesDiscount`, `PaymentType`, `Tender`, `TransactionCode`, `Changes`) 
    VALUES 
    ('$HallId','$Code','$GuestId','$Arrival','$Event','$ExtraHours','$HallId','$HalllPackageId','$SoundSytem','$FullLights','$Projector','$VenueBasic','$VenueDecoration','$VenueFull','$StageBasic','$StageTheme','$MovingLights','$FurnishedRoundTable','$RoundTable','$RectangularTable','$TiffanyChair','$RentTotal','$FoodPackageId','$NumberPax','$PricePax','$FoodTotal','$AddSeafood','$AddPork','$AddChicken','$AddVegetables','$AddTotal','$Lechon','$Wine','$OtherFood','$CorkageTotal','$Remarks','$Deposit','$GrandTotal','$GrandTotalDues','$Discount','$GrandTotalDuesDiscount','$PaymentType','$Tender','$TransactionCode','$Changes')";
    $eresult = mysqli_query($conn, $esql);

    $fsql = "UPDATE `tblfunctionhall` SET `Code`='[value-3]',`GuestId`='[value-4]',`Arrival`='[value-5]',`Event`=' ',`ExtraHours`='[value-6]',`HallTotal`='[value-7]',`HalllPackageId`='[value-8]',`SoundSytem`='[value-9]',`FullLights`='[value-10]',`Projector`='[value-11]',`VenueBasic`='[value-12]',`VenueDecoration`='[value-13]',`VenueFull`='[value-14]',`StageBasic`='[value-15]',`StageTheme`='[value-16]',`MovingLights`='[value-17]',`FurnishedRoundTable`='[value-18]',`RoundTable`='[value-19]',`RectangularTable`='[value-20]',`TiffanyChair`='[value-21]',`RentTotal`='[value-22]',`FoodPackageId`='[value-23]',`NumberPax`='[value-24]',`PricePax`='[value-25]',`FoodTotal`='[value-26]',`AddSeafood`='[value-27]',`AddPork`='[value-28]',`AddChicken`='[value-29]',`AddVegetables`='[value-30]',`AddTotal`='[value-31]',`Lechon`='[value-32]',`Wine`='[value-33]',`OtherFood`='[value-34]',`CorkageTotal`='[value-35]',`Remarks`='0',`Deposit`='[value-37]',`GrandTotal`='[value-38]',`GrandTotalDues`='[value-39]',`Discount`='[value-40]',`GrandTotalDuesDiscount`='[value-41]',`PaymentType`='0',`Tender`='[value-43]',`TransactionCode`='0',`Changes`='[value-45]' WHERE Id = $Id";
    $fresult= mysqli_query($conn,$fsql);





    header("Location: halldashboard.php?msg=Successfully Checked-Out");

    





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
        .myDiv {
            display: none;
            padding: 10px;
        }
    </style>
</head>

<body style="background-color: rgba(237, 195, 238, 0.8);">



    <div class="container bg-light py-2 mt-4 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">


        <?php

        if (isset($_POST['proceed'])) {

            $PaymentType = $_POST['PaymentType'];
            $Tender = $_POST['Tender'];
            $TransactionCode = $_POST['TransactionCode'];
            $Discount = $_POST['Discount'];
            $TotalDues = $_POST['TotalDues'];
            $TotalDuesDiscount = $_POST['TotalDuesDiscount'];
            $Change = $_POST['Change'];

            $usql = "UPDATE `tblfunctionhall` SET 
            `Discount`='$Discount',
            `GrandTotalDues`='$TotalDues',
            `GrandTotalDuesDiscount`='$TotalDuesDiscount',
            `PaymentType`='$PaymentType',
            `Tender`='$Tender',
            `TransactionCode`='$TransactionCode',
            `Changes`='$Change' 
            WHERE Id = $Id";
            $uresult = mysqli_query($conn, $usql);

        ?>
            <div class="container ">
                <div class="col-lg-6 my-4" style="margin: auto;">
                    <div class="card text-center">
                        <?php
                        $cresult = mysqli_query($conn, "SELECT * FROM tblfunctionhall WHERE Id = $Id");
                        $crow = mysqli_fetch_assoc($cresult);
                        ?>
                        <div class="card-header">
                            Total Due : <b>₱ <?php echo $crow['GrandTotalDues'] ?></b> | Tendered <b>₱ <?php echo $crow['Tender'] ?></b> | Discount <b>₱ <?php echo $crow['Discount'] ?></b>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-regular fa-money-bill-1"></i> Change Due</h5>
                            <p class="card-text fs-2">₱ <?php echo $crow['Changes'] ?></p>



                            <form method="POST">
                                <button type="submit" class="btn btn-primary mb-2" name="next">Done</button>
                            </form>
                            <p>Click to back to Function Hall Dashboard</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center fs-4">
                            Function Hall Charges
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                <?php
                        $cresult = mysqli_query($conn, "SELECT * FROM tblfunctionhall WHERE Id = $Id");
                        $crow = mysqli_fetch_assoc($cresult);
                        ?>

                                    <div class="col-lg-6">
                                        <div class="card border-success border border-4">
                                            <div class="card-header text-center">
                                                <i class="fa-solid fa-hotel"></i> La Perfecta Hotel
                                            </div>

                                            <div class="card-body">
                                                <br /> Extra Hour : <?php echo $crow['ExtraHours'] ?>
                                                <br /> Hall Total : <?php echo $crow['HallTotal'] ?>
                                                <br /> Rent Total : <?php echo $crow['RentTotal'] ?>
                                                <br /> Food Total : <?php echo $crow['FoodTotal'] ?>
                                                <br /> Additional Total : <?php echo $crow['AddTotal'] ?>
                                                <br /> Corkage Total : <?php echo $crow['CorkageTotal'] ?>
                                                <br/>
                                                <br/> Grand Total: <?php echo $crow['GrandTotal'] ?>
                                                <br/> Deposit : <?php echo $crow['Deposit'] ?>
                                                <br/> Discount : <label id="labeldiscount"></label>
                                                <br/>
                                                <br/> Total Dues :  <?php echo $crow['GrandTotalDues'] ?>
                                                <br/> Total Dues with Discount :<label id="tdd"></label>
                                                <br/>
                                                <br/>




                                                <div class="row">
                                                    <form method="POST">
                                                        <label for="" class="form-label">Paid by :</label>
                                                        <select class="form-select form-select-sm" name="PaymentType" id="myselection">
                                                            <option selected>-- Select Payment Method -- </option>
                                                            <option value="Cash">Cash</option>
                                                            <option value="Paymongo">Paymongo</option>
                                                        </select>
                                                </div>
                                                <div id="showCash" class="myDiv">
                                                    <label for="" class="form-label">Tender :</label>
                                                    <input type="number" name="Tender" id="Tender" class="form-control fs-3">
                                                </div>
                                                <div id="showPaymongo" class="myDiv">
                                                    <label for="" class="form-label">PayMongo Link :</label>
                                                    <input type="text" name="TransactionCode" class="form-control fs-3">
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col">
                                                        <div class="input-group">
                                                            <div class="input-group-text bg-warning"> <i class="fa-solid fa-tags"></i> Discount </div>
                                                            <input type="number" class="form-control" id="Discount" placeholder="e.g. ₱ 250 " onkeyup="discount()" onchange="tdd()">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card border-success border border-4">
                                            <div class="card-header text-center">
                                                <i class="fa-solid fa-circle-info"></i> Details
                                            </div>
                                            <div class="card-body fs-5">
                                                <?php
                                                $rsql = "SELECT tblroom.Number, tblroomtype.Type, tblroomtype.Rate, tblroom.Status, tblroom.GuestId
                                            FROM tblroom
                                            INNER JOIN tblroomtype ON tblroom.RoomTypeId = tblroomtype.id
                                            WHERE tblroom.Id = $Id";
                                                $rresult = mysqli_query($conn, $rsql);
                                                $room = mysqli_fetch_assoc($rresult);
                                                ?>
                                                <b><i>Hall Information :</i></b>
                                                <br />This is a bill charges for <b>Function Hall # </b>and Rate per Extra Hour is <b>₱ </b>
                                                <br />
                                                <br />
                                                <?php
                                                $GuestId = $_GET['GuestId'];
                                                $gresult = mysqli_query($conn, "SELECT * FROM tblguest WHERE Id = $GuestId");
                                                $guest = mysqli_fetch_assoc($gresult);
                                                ?>
                                                <b><i>Customer Information :</i></b>
                                                <br />Name : <?php echo $guest['FirstName'] . ' ' . $guest['LastName']  ?>
                                                <br />Phone : <?php echo $guest['Phone'] ?>
                                                <br />Address : <?php echo $guest['Address'] ?>
                                                <br />
                                                <br />
                                            </div>
                                        </div>  
                                        <form method="POST">
                                        <input type="hidden" class="form-control" id="ADiscount" name="Discount">
                                        <input type="hidden" class="form-control" id="TotalDues" name="TotalDues" value="<?php echo $crow['GrandTotalDues'] ?>">
                                        <input type="hidden" class="form-control" id="TotalDuesDiscount" name="TotalDuesDiscount">
                                        <input type="hidden" class="form-control" id="Change" name="Change">
                                        <div class="row mt-3 ">
                                            <div class="col-lg-6">
                                                <button class="btn btn-danger" style="width:100%; margin:auto">Back</button>
                                            </div>
                                            <div class="col-lg-6">
                                                <button type="submit" name="proceed" class="btn btn-success " style="width: 100%; margin:auto">Proceed</button>
                                            </div>

                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>



<?php } ?>


















</body>

<script>
    $(document).ready(function() {
       



        $('#myselection').on('change', function() {
            var demovalue = $(this).val();
            $("div.myDiv").hide();
            $("#show" + demovalue).show();
        });
    });

    function discount() {

        var discount = Number($("#Discount").val());
        $('[id$=labeldiscount]').text(discount);
        $('#ADiscount').val(discount);
    }

    function tdd() {
        var tdd = 0;
        var tdues = Number($("#TotalDues").val());
        var discount = Number($("#Discount").val());
        var tdd = tdues - discount;
        $('[id$=tdd]').text(tdd);
        $('#TotalDuesDiscount').val(tdd);

        var change = 0;
        var tduediscount = Number($("#TotalDuesDiscount").val());
        var tender = Number($("#Tender").val());
        var change = tender - tduediscount;
        var achange = change.toFixed(2);
        $('#Change').val(achange);

    }
</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>