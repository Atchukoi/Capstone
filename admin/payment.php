<?php
include 'config.php';
$Id = $_GET['Id'];
$GuestId = $_GET['GuestId'];

$result = mysqli_query($conn, "SELECT *,tblroom.Number FROM tblhotel JOIN tblroom ON tblroom.Id = $Id WHERE tblhotel.Id = $Id ");
$row = mysqli_fetch_assoc($result);

?>



<?php
$dresult = mysqli_query($conn, "SELECT * FROM tblhotel WHERE Id = $Id");
$drow = mysqli_fetch_assoc($dresult);

$RoomId = $drow['RoomId'];
$Arrival = $drow['Arrival'];
$Departure = $drow['Departure'];
$GuestId = $drow['GuestId'];
$Days = $drow['Days'];
$Remarks = $drow['Remarks'];
$Deposit = $drow['Deposit'];
$RoomCharges = $drow['RoomCharges'];
$ExtraCharges = $drow['ExtraCharges'];
$Discount = $drow['Discount'];
$Total = $drow['Total'];
$TotalDues = $drow['TotalDues'];
$TotalDuesDiscount = $drow['TotalDuesDiscount'];
$PaymentType = $drow['PaymentType'];
$Tender = $drow['Tender'];
$TransactionCode = $drow['TransactionCode'];
$Changes = $drow['Changes'];

if (isset($_POST['next'])) {

    $esql = "INSERT INTO `tblhoteltransaction`
                                (`RoomId`, `Arrival`, `Departure`, `GuestId`, `Days`, `Remarks`, `Deposit`, `RoomCharges`, `ExtraCharges`, `Discount`, `Total`, `TotalDues`, `TotalDuesDiscount`, `PaymentType`, `Tender`, `TransactionCode`, `Changes`) 
                                VALUES 
                                ('$RoomId','$Arrival','$Departure','$GuestId','$Days','$Remarks','$Deposit','$RoomCharges','$ExtraCharges','$Discount','$Total','$TotalDues','$TotalDuesDiscount','$PaymentType','$Tender','$TransactionCode','$Changes')";
    $eresult = mysqli_query($conn, $esql);

    $fsql = "UPDATE `tblhotel` SET `Arrival`='0',`Departure`='0',`GuestId`='0',`Days`='0',`Remarks`='0',`Deposit`='0',`RoomCharges`='0',`ExtraCharges`='0',`Discount`='0',`Total`='0',`TotalDues`='0',`TotalDuesDiscount`='0',`PaymentType`='0',`Tender`='0',`TransactionCode`='0',`Changes`='0' WHERE Id = $Id";
    $fresult = mysqli_query($conn,$fsql);

    $hsql = "UPDATE `tblroom` SET `Status`='Cleaning',`GuestId`='0' WHERE Id = $Id";
    $hresult = mysqli_query($conn,$hsql);
    header("Location: dashboard.php?msg=Successfully Checked-Out");
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

        .cl {
            outline: 1px solid blue;
        }


        .tableWrap {
            height: 450px;
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

            $usql = "UPDATE `tblhotel` SET 
            `Discount`='$Discount',
            `TotalDues`='$TotalDues',
            `TotalDuesDiscount`='$TotalDuesDiscount',
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
                        $cresult = mysqli_query($conn, "SELECT * FROM tblhotel WHERE Id = $Id");
                        $crow = mysqli_fetch_assoc($cresult);
                        ?>
                        <div class="card-header">
                            Total Due : <b>₱ <?php echo $crow['TotalDues'] ?></b> | Tendered <b>₱ <?php echo $crow['Tender'] ?></b> | Discount <b>₱ <?php echo $crow['Discount'] ?></b>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-regular fa-money-bill-1"></i> Change Due</h5>
                            <p class="card-text fs-2">₱ <?php echo $crow['Changes'] ?></p>



                            <form method="POST">
                                <button type="submit" class="btn btn-primary mb-2" name="next">Done</button>
                            </form>
                            <p>Click to back to Hotel Dashboard</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center fs-4">
                            Room <i class="fa-solid fa-hashtag"></i> <?php echo $row['Number'] ?> charges
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="card border-success border border-4">
                                            <div class="card-header text-center">
                                                <i class="fa-solid fa-hotel"></i> La Perfecta Hotel
                                            </div>

                                            <div class="card-body">
                                                No. of Days : <?php echo number_format($row['Days'], 2, '.', ','); ?>
                                                <br /> Room Charges : <?php echo number_format($row['RoomCharges'], 2, '.', ','); ?>
                                                <br /> Extra Charges : <?php echo number_format($row['ExtraCharges'], 2, '.', ','); ?>
                                                <br /> Discount : ₱ <label id="labeldiscount"></label>



                                                <br />
                                                <br /> Total : <?php echo number_format($row['Total'], 2, '.', ','); ?>
                                                <br /> Deposit : <?php echo number_format($row['Deposit'], 2, '.', ','); ?>
                                                <br />
                                                <br /> Total Dues : ₱ <?php echo number_format($row['TotalDues'], 2, '.', ','); ?>

                                                <br /> Total Dues with Discount : ₱ <label id="tdd"></label>
                                                <br />
                                                <br />
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


                                    <div class="col-lg-4">
                                        <div class="card border-success border border-4">
                                            <div class="card-header text-center">
                                                <i class="fa-solid fa-basket-shopping"></i> List of Guest Extra's
                                            </div>
                                            <div class="card-body">
                                                <div class="tableWrap">
                                                    <table class="table-striped">
                                                        <thead style="border-bottom: solid black 4px;">
                                                            <tr>
                                                                <th>Extra</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $eresult = mysqli_query($conn, "SELECT tblextra.Name, tblextra.Quantity, tblextra.Cost, tblroomextra.Id
                                            FROM tblroomextra 
                                            LEFT JOIN tblextra ON tblroomextra.ExtraId = tblextra.Id
                                            LEFT JOIN tblguest ON tblroomextra.GuestId = tblguest.Id
                                            WHERE tblguest.Id = $GuestId AND tblroomextra.HotelId = $Id  AND tblroomextra.IsActive = 1");

                                                            while ($erow = mysqli_fetch_assoc($eresult)) {;
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $erow['Name'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $erow['Cost'] ?>
                                                                    </td>
                                                                </tr>
                                                        </tbody>
                                                    <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
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
                                                <b><i>Room Information :</i></b>
                                                <br />This is a bill charges for <b>Room # <?php echo $room['Number'] ?> </b> with a category of <b><?php echo $room['Type'] ?></b>, and Rate per Night is <b>₱ <?php echo $room['Rate'] ?></b>
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
                                                <b><i>Check-out Date:</i></b>
                                                <br /> And you're guest checkout date <b><?php echo $row['Departure'] ?></b>

                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control" id="ADiscount" name="Discount">
                                        <input type="hidden" class="form-control" id="TotalDues" name="TotalDues" value="<?php echo $row['TotalDues'] ?>">
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