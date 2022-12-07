<?php
include 'config.php';
$Id = $_GET['Id'];
$hsql = "SELECT * FROM tblhotel WHERE Id = $Id";
$hresult = mysqli_query($conn, $hsql);
$hrow = mysqli_fetch_assoc($hresult);
$GuestId = $hrow['GuestId'];
$RoomId = $hrow['RoomId'];

if (isset($_POST['date'])) {
    $Departure = $_POST['Departure'];

    $sql = "UPDATE `tblhotel` SET `Departure`='$Departure' WHERE Id = $Id";
    $result = mysqli_query($conn, $sql);
    echo "<meta http-equiv='refresh' content='0'>";
}

if (isset($_POST['submit'])) {
    $Days = $_POST['Days'];
    $RoomCharges  = $_POST['RoomCharges'];
    $ExtraCharges = $_POST['ExtraCharges'];
    $Total = $_POST['Total'];
    $TotalDues  = $_POST['TotalDues'];

    $csql = " UPDATE `tblhotel` SET 
   `Days`='$Days',
   `RoomCharges`=' $RoomCharges',
   `ExtraCharges`='$ExtraCharges',
   `Total`=' $Total',
   `TotalDues`='$TotalDues'
   WHERE Id = $Id";
    $result = mysqli_query($conn, $csql);
    header("Location: payment.php?Id=$Id & GuestId=$GuestId");
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

    <?php
    $sql = "SELECT tblroom.Number,tblroomtype.Type, tblroomtype.Rate
    FROM tblroom 
    JOIN tblroomtype ON tblroom.RoomTypeId = tblroomtype.Id
    WHERE tblroom.Id = $Id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>




    <div class="card">

        <div class="card-body" style="background-color:#acbfa3; height:100vh">
            <div class="container-fluid ">
                <div class="row mb-5">

                    <div class="col-lg-9  border border-5 border-dark bg-white">
                        <div class="container " style="height: 500px; ">
                            <div class="row text-center ">
                                <div class="col fs-3 mb-2">
                                    Room <i class="fa-solid fa-hashtag"></i> <?php echo $row['Number'] . ' - ' . $row['Type'] ?> - <i class="fa-solid fa-user"></i>
                                    <?php
                                    $nsql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name, tblguest.Id as GuestId 
                                    FROM tblroom 
                                    LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                                     WHERE tblroom.Id = $Id";
                                    $nresult = mysqli_query($conn, $nsql);
                                    $nrow = mysqli_fetch_assoc($nresult);
                                    $GuestId = $nrow['GuestId'];
                                    echo $nrow['Name'];
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="hidden" class="form-control" id="PerNight" value="<?php echo $row['Rate'] ?>">
                                </div>
                                <div class="col-lg-4">
                                    <input type="hidden" class="form-control" id="Arrival" value="<?php echo $hrow['Arrival'] ?>">
                                </div>
                                <div class="col-lg-4">
                                    <input type="hidden" class="form-control" id="Departure" value="<?php echo $hrow['Departure'] ?>">
                                </div>
                            </div>
                            <div class="row text-center mb-4">
                                <label for="" class="form-label"><i class="fa-solid fa-bed"></i> ₱ <?php echo $row['Rate'] ?> / Night</label>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="" class="form-label "><i class="fa-regular fa-calendar-days"></i><strong>Check-in : </strong> <?php echo $hrow['Arrival'] ?> </label>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label"><i class="fa-regular fa-calendar-days"></i><strong>Check-Out : </strong><?php echo $hrow['Departure'] ?> </label>
                                </div>
                            </div>
                            <div class="row">
                                <label for="" class="form-label fs-4"><i class="fa-solid fa-basket-shopping"></i> LIST OF EXTRA'S</label>
                                <div class="tableWrap">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th><span>Extra</span></th>
                                                <th><span>Quantity</span></th>
                                                <th><span>Price</span></th>
                                                <th><span>Action</span></th>
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
                                                    <td><?php echo $erow['Name'] ?></td>
                                                    <td><?php echo $erow['Quantity'] ?></td>
                                                    <td><?php echo $erow['Cost'] ?><span></span></td>
                                                    <td class="text-center">
                                                        <a class="btn btn-danger" href="function/hotel/deleteextra.php?Id=<?php echo $erow['Id'] ?>">
                                                            <i class="fa-solid fa-trash-can fa-xl"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="row my-2">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header fs-4 bg-info">
                                        <strong>Bill</strong>
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
                                                        <input type="number" class="form-control" name="RoomCharges" id="RoomCharges" step=".01" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">

                                                    <?php
                                                    $xresult = mysqli_query($conn, "SELECT SUM(tblextra.Cost) AS ExtraCharges, tblguest.Id AS GuestId
                                                 FROM tblroomextra 
                                                 LEFT JOIN tblextra ON tblroomextra.ExtraId = tblextra.Id
                                                 LEFT JOIN tblguest ON tblroomextra.GuestId = tblguest.Id
                                                 WHERE tblguest.Id = $GuestId AND tblroomextra.HotelId = $Id  AND tblroomextra.IsActive = 1");
                                                    $xrow = mysqli_fetch_assoc($xresult);
                                                    $xtotal = $xrow['ExtraCharges'];
                                                    ?>

                                                    <label for="" class="form-label">Extras Charges: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" class="form-control" name="ExtraCharges" id="ExtraCharges" step=".01" style="background-color: rgb(235,235,228)" readonly value="<?php echo $xtotal ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <label for="" class="form-label">Deposit: </label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" class="form-control" id="Deposit" value="<?php echo $hrow['Deposit'] ?>" style="background-color: rgb(235,235,228)" readonly>
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
                                                        <input type="number" class="form-control" name="TotalDues" id="TotalDues" step=".01" value="<?php echo $hrow['Total'] ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
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
                                        <div class="card-body">
                                            <div class="tableWrap2">
                                                <table class="table ">
                                                    <thead>
                                                        <tr>
                                                            <th class="bg-success">Name</th>
                                                            <th class="text-center bg-success">Qty</th>
                                                            <th class="text-center bg-success">Price</th>
                                                            <th class="text-center bg-success">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM tblextra";
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $row['Name'] ?></td>
                                                                <td class="text-center"><?php echo $row['Quantity'] ?></td>
                                                                <td class="text-center"><?php echo $row['Cost'] ?></td>
                                                                <td class="text-center"><a href="function/hotel/addextra.php?ExtraId=<?php echo $row['Id'] ?>&HotelId=<?php echo $Id ?>&GuestId=<?php echo $GuestId ?> "><i class="fa-solid fa-square-plus fa-2xl"></i></a></td>
                                                            </tr>

                                                        <?php } ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                    <div class="col">
                                        <label for="" class="form-label"><i class="fa-regular fa-calendar-check"></i> <strong>CHECKOUT DATE </strong> </label>

                                    </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <input type="datetime-local" name="Departure" class="form-control mb-2" >

                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-success mb-3" name="date" type="submit" style="float: right; width:100%"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Save</button>
                                </div>
                                
                            </div>


                            <!-- <div class="card">
                                <div class="card-header bg-info">
                                    <i class="fa-solid fa-utensils"></i> <strong> MISCELLANEOUS
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col">
                                                    <label class="form-label mt-2"><strong>Misc :</strong></label>
                                                    <input type="text" class="form-control text-center" name="name" placeholder="e.g. Sphagetti">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label class="form-label mt-2">Quantity :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">Pc</div>
                                                        <input type="text" class="form-control text-center" name="quantity" placeholder="e.g. 2">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label class="form-label mt-2">Cost :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" class="form-control text-center" name="cost" placeholder="e.g. 250">
                                                    </div>
                                                </div>
                                                <button class="btn btn-success mt-4 " type="submit" name="submit" style="width:50%; margin:auto;"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Submit</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div> -->
                            
                                <div class="row text-end">
                                    <div class="col mb-5 mt-5">
                                        <button type="submit" name="submit" class="btn btn-warning fs-4" style="width:100%"><i class="fa-solid fa-right-from-bracket"></i> Check-Out </button>
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
</script>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


</html>