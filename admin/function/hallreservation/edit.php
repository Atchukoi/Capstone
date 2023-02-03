<?php
include 'config.php';
$Id = $_GET['id'];
error_reporting(1);

$asql = "SELECT rr.Id AS ReservationId, rr.GuestId, CONCAT(u.FirstName,' ',u.LastName) AS Name, rr.Arrival, roomrate.Title AS HallPackage, rrpt.Rate, rc.Title AS RcTitle, re.Title, re.Cost AS ExtraCost, fp.Title, fr.Quantity, fp.Cost, (fr.Quantity*fp.Cost) AS FoodTotal, rr.Deposit
FROM roomreservation rr
LEFT JOIN user u ON u.Id = rr.GuestId
LEFT JOIN roomrate ON roomrate.Id = rr.RoomRateId
LEFT JOIN roomcategory rc ON rc.Id = roomrate.RoomCategoryId
LEFT JOIN roomreservationextra rre ON rre.RoomReservationId = rr.Id
LEFT JOIN roomextra re ON re.Id = rre.RoomExtraId
LEFT JOIN foodreservation fr ON fr.RoomReservationId = rr.Id
LEFT JOIN foodpackage fp ON fp.Id = fr.FoodPackageId
LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = roomrate.RoomPriceTrailId

WHERE rr.Id =$Id";
$aresult = mysqli_query($conn, $asql);
$arow = mysqli_fetch_assoc($aresult);



if (isset($_POST['addextra'])) {
    $UserId = $arow['UserId'];

    $ExtraID = $_POST['ExtraId'];
    $ExtraQuantity = $_POST['ExtraQuantity'];


    $dresult = mysqli_query($conn, "SELECT Cost
    FROM  roomextra
    WHERE Id = $ExtraID");
    $drow = mysqli_fetch_assoc($dresult);

    $Cost = $ExtraQuantity * $drow['Cost'];

    $fsql = "INSERT INTO `roomreservationextra`
    (`RoomReservationId`, `RoomExtraId`, `Quantity`) 
    VALUES 
    ('$Id','$ExtraID','$ExtraQuantity')";
    $fresult = mysqli_query($conn, $fsql);
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Perfecta</title>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!--JS Query CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .cl {
            outline: 1px solid blue;
        }


        .tableWrap {
            height: 700px;
            border: 2px solid black;
            overflow: auto;
        }

        .tableWrap2 {
            height: 800px;
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

        tr:nth-child(even) {
            background-color: #f2f2f2;
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

    <div class="container-fluid">
        <div class="card  my-2" style="height: 98vh;">
            <div class="card-header text-center  bg-primary text-white fs-4">
                <div class="row">
                    <div class="col"></div>
                    <div class="col align-self-start">
                        Hall Reservation
                    </div>

                    <div class="col align-self-end " style="text-align-last: right;">
                        <a href="http://localhost/hms/capstone/admin/dashboard.php" class="btn btn-danger">X</a>
                    </div>

                </div>


            </div>



            <div class="card-body overflow-auto" style="background-color: #fcf0d5;">



                <div class="row mt-3">


                    <div class="container-fluid">
                        <div class="row mb-3">
                            <div class="container">
                                <div class="card border-3">
                                    <div class="card-header text-white bg-success">
                                        Hall Details
                                    </div>
                                    <div class="card-body " style="background-color:#f2f2f2;">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label for="" class="form-label">Guest Name : </label>
                                                <input type="text" class="form-control" value="<?php echo $arow['Name'] ?>" disabled>
                                            </div>

                                            <div class="col-md-2">
                                                <label for="" class="form-label">Arrival : </label>
                                                <input type="datetime-local" class="form-control" value="<?php echo $arow['Arrival'] ?>" disabled>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="" class="form-label">Hall Package : </label>
                                                <input type="text" class="form-control" value="<?php echo $arow['HallPackage'] ?>" disabled>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="" class="form-label">Food Package : </label>
                                                <input type="text" class="form-control" value="<?php echo $arow['Title'] ?>" disabled>
                                            </div>

                                            <div class="col-md-1">
                                                <label for="" class="form-label">Pax : </label>
                                                <input type="text" class="form-control" value="<?php echo $arow['Quantity'] ?>" disabled>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="" class="form-label">Cost : </label>
                                                <input type="text" class="form-control" value="<?php echo $arow['Cost']  ?>" disabled>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="container">
                        <div class="card border-3">
                            <div class="card-header text-white bg-success">
                                Rentals
                            </div>
                            <div class="card-body" style="background-color:#f2f2f2;">
                                <div class="row">
                                    <div class="col">
                                        <div class="card" style="height: 820px;">
                                            <h5 class="card-header"><i class="fa-solid fa-basket-shopping"></i> RESERVATION EXTRA'S</h5>
                                            <div class="card-body">
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
                                                            $bresult = mysqli_query($conn, "SELECT rre.RoomReservationId as RRID, re.Id AS ExtraId, re.Title,rre.Quantity, re.Cost, (rre.Quantity*re.Cost) AS Total 
FROM roomreservation rr
LEFT JOIN roomreservationextra rre ON rre.RoomReservationId = rr.Id
LEFT JOIN roomextra re ON re.Id = rre.RoomExtraId
WHERE rr.Id = $Id

");
                                                            $number = 1;

                                                            while ($brow = mysqli_fetch_assoc($bresult)) {;
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $number ?></td>
                                                                    <td><?php echo $brow['Title'] ?></td>
                                                                    <td><?php echo $brow['Quantity'] ?></td>
                                                                    <td><?php echo $brow['Cost'] ?></td>
                                                                    <td><?php echo $brow['Total'] ?></td>
                                                                    <td class="text-center">
                                                                        <a class="btn btn-danger" href="../hotel/deletereservationextra.php?Id=<?php echo $brow['RRID'] ?>&EId=<?php echo $brow['ExtraId'] ?>">
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


                                    </div>



                                </div>

                            </div>
                        </div>


                    </div>


                    <div class="row mt-3 mb-3">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="container">
                                    <div class="card border-3">
                                        <div class="card-header text-white bg-success">
                                            Add Extra
                                        </div>
                                        <div class="card-body " style="background-color:#f2f2f2;">
                                            <?php
                                            $csql = "SELECT * FROM roomextra WHERE ExtraCategoryId = 2 OR ExtraCategoryId = 4 OR ExtraCategoryId = 5 ";
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


                                                        <div class="col">
                                                            <label for="" class="form-label"> Quantity :</label>
                                                            <input type="number" name="ExtraQuantity" class="form-control" min="1" required>
                                                        </div>


                                                        <div class="col text-center mt-4">
                                                            <button type="submit" class="btn btn-success" name="addextra" style="width: 100%;"><i class="fa-solid fa-square-plus"></i> Add Extra </button>
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
                <div class="card-footer text-center bg-info ">
                    <div class="container-fluid">


                        <div class="row">


                            <div class="col-lg-2">
                                <label for="" class="form-label">Hall Charges : </label>
                                <div class="input-group">
                                    <div class="input-group-text">₱</div>
                                    <input type="number" class="form-control" name="HallCharges" id="HallCharges" step=".01" style="background-color: rgb(235,235,228)" readonly value="<?php echo $arow['Rate'] ?>">
                                </div>
                            </div>

                            <div class="col-lg-2">



                                <label for="" class="form-label">Extras Charges: </label>
                                <div class="input-group">
                                    <div class="input-group-text">₱</div>
                                    <input type="number" name="RETotal" id="RETotal" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php $kresult = mysqli_query($conn, " SELECT  SUM(re.Cost) AS ExtraCost
FROM roomreservation rr
LEFT JOIN user u ON u.Id = rr.GuestId
LEFT JOIN roomrate ON roomrate.Id = rr.RoomRateId
LEFT JOIN roomcategory rc ON rc.Id = roomrate.RoomCategoryId
LEFT JOIN roomreservationextra rre ON rre.RoomReservationId = rr.Id
LEFT JOIN roomextra re ON re.Id = rre.RoomExtraId
LEFT JOIN foodreservation fr ON fr.RoomReservationId = rr.Id
LEFT JOIN foodpackage fp ON fp.Id = fr.FoodPackageId




WHERE rr.Id = $Id");
                                                                                                                                                                                                                    $irow = mysqli_fetch_assoc($kresult);
                                                                                                                                                                                                                    echo $irow['ExtraCost']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <label for="" class="form-label">Food Total: </label>
                                <div class="input-group">
                                    <div class="input-group-text">₱</div>
                                    <input type="number" class="form-control" name="FoodTotal" id="FoodTotal" value="<?php echo $arow['FoodTotal'] ?>" step=".01" style="background-color: rgb(235,235,228)" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label for="" class="form-label">Total: </label>
                                <div class="input-group">
                                    <div class="input-group-text">₱</div>
                                    <input type="number" class="form-control" name="Total" id="Total" step=".01" style="background-color: rgb(235,235,228)" readonly>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label for="" class="form-label">Deposit: </label>
                                <div class="input-group">
                                    <div class="input-group-text">₱</div>
                                    <input type="number" class="form-control" id="Deposit" value="<?php echo $arow['Deposit'] ?>" style="background-color: rgb(235,235,228)" readonly>
                                </div>
                            </div>



                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</body>
<script>
    $(document).ready(function() {

        


        var Total = 0;
        var HT = Number($("#HallCharges").val());
        var EC = Number($("#RETotal").val());
        var FT = Number($("#FoodTotal").val());
        var D = Number($("#Deposit").val());
        var Total = HT + EC + FT ;
        $("#Total").val(Total);

    });









    function computedata() {
        var totalamount = 0;
        $('.rentals').each(function(index, obj) {
            if (this.checked === true) {
                var id = this.getAttribute("name");
                totalamount += parseFloat(document.getElementById(id).value);
            }
        });

        $('.rentals-input').each(function(index, obj) {
            if (this.value != "") {
                var id = this.getAttribute("name");
                var compute = parseFloat(this.value) * parseFloat(document.getElementById(id).value);
                totalamount += parseFloat(compute);
            }
        });

        $("#RentTotal").val(totalamount);
    }

    function corckage() {
        var totalamount = 0;
        $('.corkage-input').each(function(index, obj) {
            if (this.value != "") {
                var id = this.getAttribute("name");
                var compute = parseFloat(this.value) * parseFloat(document.getElementById(id).value);
                totalamount += parseFloat(compute);
            }
        });

        $("#CorkageTotal").val(totalamount);
    }

    function grandtotal() {
        var total = 0;
        var hall = Number($("#HallTotal").val());
        var rent = Number($("#RentTotal").val());
        var food = Number($("#FoodTotal").val());
        var additional = Number($("#AdditionalTotal").val());
        var corkage = Number($("#CorkageTotal").val());

        var total = hall + rent + food + additional + corkage;

        $("#GrandTotal").val(total);

        var atotal = 0;
        var a = Number($("#Deposit").val());
        var b = Number($("#GrandTotal").val());
        var atotal = b - a;
        $("#TotalDues").val(atotal);

    }

    // Calculate Hall Total 
    $("#Exceeding").keyup(function() {

        var Total = 0;
        var a = Number($("#HallPrice").val());
        var b = Number($("#Exceeding").val());
        var c = Number($("#HallTotal").val());
        var extra = a * b;
        var NewHallTotal = c + extra;
        $("#HallTotal").val(NewHallTotal);
    });
</script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


</html>