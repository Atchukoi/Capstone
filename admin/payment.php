<?php
include 'config.php';
$Id = $_GET['TId'];
$Days = $_GET['d'];


if (isset($_POST['submit'])) {

    $PaymentId = $_POST['PaymentId'];

    $jresult = mysqli_query($conn, "SELECT * FROM transaction WHERE Id = $Id ");
    $jrow = mysqli_fetch_assoc($jresult);


    $Id = $jrow['Id'];
    $RoomId = $jrow['RoomId'];
    $ArrivalDateTime = $jrow['ArrivalDateTime'];
    $DepartureDateTime = $jrow['DepartureDateTime'];
    $UserId = $jrow['UserId'];
    $Notes = $jrow['Notes'];
    $RoomPriceTrailId = $jrow['RoomPriceTrailId'];
    $RoomChargesTotal = $jrow['RoomChargesTotal'];
    $ExtraChargesTotal = $jrow['ExtraChargesTotal'];
    $SubTotal = $jrow['SubTotal'];
    $Deposit = $jrow['Deposit'];
    $Discount = $jrow['Discount'];
    $Total = $jrow['Total'];


    $esql = "INSERT INTO `transactionhistory`
    (`TransactionId`, `RoomId`, `ArrivalDateTime`, `DepartureDateTime`, `UserId`, `Notes`, `RoomPriceTrailId`, `RoomChargesTotal`, `ExtraChargesTotal`, `SubTotal`, `Deposit`, `Discount`, `Total`) 
    VALUES 
    ('$Id','$RoomId','$ArrivalDateTime','$DepartureDateTime','$UserId','$Notes','$RoomPriceTrailId','$RoomChargesTotal','$ExtraChargesTotal','$SubTotal','$Deposit','$Discount','$Total')";
    $eresult = mysqli_query($conn, $esql);
    $last_id = mysqli_insert_id($conn);

    $msql = "UPDATE `payments` SET `TransactionId`='$last_id' WHERE Id = $PaymentId  ";
    $mresult = mysqli_query($conn, $msql);

    $fsql = "UPDATE `transaction` SET `ArrivalDateTime`='0',`DepartureDateTime`='0',`UserId`='0',`Notes`='0',`RoomPriceTrailId`='0',`RoomChargesTotal`='0',`ExtraChargesTotal`='0',`SubTotal`='0',`Deposit`='0',`Discount`='0',`Total`='0' WHERE Id = $Id";
    $fresult = mysqli_query($conn, $fsql);

    $hsql = "UPDATE `room` SET `RoomStatusId`='4' WHERE Id = $RoomId";
    $hresult = mysqli_query($conn, $hsql);

    $ksql = "UPDATE `transactionextra` SET `IsActive`='0' WHERE TransactionId = $Id AND UserId = $UserId";
    $kresult = mysqli_query($conn, $ksql);
    header("Location: print.php?Id=$last_id");
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
        $jresult = mysqli_query($conn, "SELECT * FROM transaction WHERE Id = $Id ");
        $jrow = mysqli_fetch_assoc($jresult);
        $UserId = $jrow['UserId'];


        if (isset($_POST['proceed'])) {

            $PaymentType = $_POST['PaymentType'];
            $Tender = $_POST['Tender'];
            $Discount = $_POST['Discount'];
            $TotalDues = $_POST['TotalDues'];
            $TotalDuesDiscount = $_POST['TotalDuesDiscount'];
            $Change = $_POST['Change'];

            $usql = "INSERT INTO `payments`
    (`PaymentTerms`,`UserId`, `AmountTender`, `AmountChange`) 
    VALUES 
    ('$PaymentType','$UserId','$Tender','$Change')";
            $uresult = mysqli_query($conn, $usql);
            $PLastId = mysqli_insert_id($conn);




            $tsql = "UPDATE `transaction` SET `Discount`='$Discount' WHERE Id = $Id ";
            $tresult = mysqli_query($conn, $tsql);

            $cresult = mysqli_query($conn, "SELECT * FROM payments WHERE Id = $PLastId");
            $crow = mysqli_fetch_assoc($cresult);


        ?>


            <div class="container ">
                <div class="col-lg-6 my-4" style="margin: auto;">
                    <div class="card text-center">

                        <?php

                        $dresult = mysqli_query($conn, "SELECT t.Total, t.Discount 
                        FROM transaction t
                        WHERE t.Id = $Id");
                        $drow = mysqli_fetch_assoc($dresult);

                        ?>

                        <div class="card-header">
                            Total Due : <b>₱ <?php echo $drow['Total'] ?></b> | Tendered <b>₱ <?php echo $crow['AmountTender'] ?></b> | Discount <b>₱ <?php echo $drow['Discount'] ?></b>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-regular fa-money-bill-1"></i> Change Due / Payment Reference ID</h5>
                            <p class="card-text fs-2"> <?php echo $crow['AmountChange'] ?></p>



                            <form method="POST">
                                <input type="hidden" name="PaymentId" class="form-control" value="<?php echo $PLastId ?>">
                                <button name="submit" type="submit" class="btn btn-primary mb-2">Done</button>
                            </form>
                            <p>Click to back to Hotel Dashboard</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>

            <?php
            $asql = "SELECT r.Title AS RoomNumber, rc.Title AS RoomType, rrpt.Rate, CONCAT(u.FirstName,' ',u.LastName) AS GuestName, u.Contact, u.Address, t.DepartureDateTime, t.RoomChargesTotal, t.ExtraChargesTotal, t.Deposit, t.SubTotal, t.Total
                FROM transaction t
                LEFT JOIN room r ON r.Id = t.RoomId
                LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
                LEFT JOIN roomrate rr ON rr.Id = r.RoomCategoryId
                LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
                LEFT JOIN user u ON u.Id = t.UserId
                
                
                WHERE t.Id = $Id";
            $aresult = mysqli_query($conn, $asql);
            $arow = mysqli_fetch_assoc($aresult);
            ?>


            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center fs-4">
                            <i class="fa-solid fa-hashtag"></i> <?php echo $arow['RoomNumber'] ?> charges
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
                                                No. of Days : <?php echo number_format($Days, 2, '.', ','); ?>
                                                <br /> Room Charges : <?php echo number_format($arow['RoomChargesTotal'], 2, '.', ','); ?>
                                                <br /> Extra Charges : <?php echo number_format($arow['ExtraChargesTotal'], 2, '.', ','); ?>
                                                <br /> Discount : ₱ <label id="labeldiscount"></label>



                                                <br />
                                                <br /> Total : <?php echo number_format($arow['SubTotal'], 2, '.', ','); ?>
                                                <br /> Deposit : <?php echo number_format($arow['Deposit'], 2, '.', ','); ?>
                                                <br />
                                                <br /> Total Dues : ₱ <?php echo number_format($arow['Total'], 2, '.', ','); ?>

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
                                                            <option value="Gcash">Gcash</option>
                                                            <option value="PayMaya">PayMaya</option>
                                                            <option value="PayPal">PayPal</option>
                                                        </select>
                                                </div>
                                                <div class="mt-2">
                                                    <label for="" class="form-label"> Cash Amount or Transaction ID :</label>
                                                    <input type="text" name="Tender" id="Tender" class="form-control fs-3">
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
                                                                <th>Quantity</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $eresult = mysqli_query($conn, "SELECT re.Title ,te.Id, te.Quantity, re.Cost, te.TotalAmount
                                                            FROM transactionextra te
                                                            LEFT JOIN roomextra re ON re.Id = te.RoomExtraId
                                                            WHERE te.TransactionId = $Id AND IsActive = 1");

                                                            while ($erow = mysqli_fetch_assoc($eresult)) {;
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $erow['Title'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $erow['Quantity'] ?>
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

                                                <b><i>Room Information :</i></b>
                                                <br />This is a bill charges for <b> <?php echo $arow['RoomNumber'] ?> </b> with a category of <b><?php echo $arow['RoomType'] ?></b>, and Rate per Night is <b>₱ <?php echo $arow['Rate'] ?></b>
                                                <br />
                                                <br />

                                                <b><i>Customer Information :</i></b>
                                                <br />Name : <?php echo $arow['GuestName'] ?>
                                                <br />Phone : <?php echo $arow['Contact'] ?>
                                                <br />Address : <?php echo $arow['Address'] ?>
                                                <br />
                                                <br />
                                                <b><i>Check-out Date:</i></b>
                                                <br /> And you're guest checkout date <b><?php echo $arow['DepartureDateTime'] ?></b>

                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control" id="ADiscount" name="Discount">
                                        <input type="hidden" class="form-control" id="TotalDues" name="TotalDues" value="<?php echo $arow['Total'] ?>">
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