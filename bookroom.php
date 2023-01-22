<?php
session_start();
include 'config.php';
$Id = $_GET['Id'];
$In = $_GET['i'];
$Out = $_GET['o'];
$GuestId = $_SESSION['GuestId'];

if (isset($_POST['submit'])) {

    if (isset($_SESSION['Guest']) && !empty($_SESSION['Guest'])) {
        $Code = mt_rand('100', '1000000000');
        $RoomTypeId = $Id;
        $Arrival = $_POST['arrival'];
        $Departure = $_POST['departure'];
        $Total = $_POST['total'];
        $GuestId = $_SESSION['GuestId'];
        $Remarks = $_POST['remarks'];

        $sql = "INSERT INTO `roomreservation`
        (`Code`,`RoomRateId`, `Arrival`, `Departure`, `Total`, `GuestId`, `Status`, `Notes`,`UserId`) 
        VALUES 
        ('$Code','$RoomTypeId','$Arrival','$Departure','$Total','$GuestId','Pending','$Remarks','$_SESSION[adminid]')";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Reservation Successfully Send! Check your booking list on your Profile.')</script>";
        header("Location: bookinglist.php?Id=$GuestId");
    } else {
        echo "<script>alert('Please Login before you can book a reservation')</script>";
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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body style="background-color: #94AABB;">
    <?php

    $result = mysqli_query($conn, "SELECT rr.Title, rrpt.Rate, rc.Description, rr.Description AS Inclusion
    FROM roomrate rr
    JOIN roomratepricetrail rrpt ON rrpt.id = rr.RoomPriceTrailId
    JOIN roomcategory rc ON rc.Id = rr.RoomCategoryId
    WHERE rr.RoomTypeID = 1 and rc.Id = $Id");
    $row = mysqli_fetch_assoc($result);
    ?>





    <div class="container">


        <div class="card mt-5 ">
            <h2 class="card-header text-center bg-info ">Hotel Room Reservation</h2>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h4> You have selected a Room of <span class="text-danger fs-2"><i><?php echo $row['Title'] ?></i></span> with a rate of<span class="text-danger fs-2"><i> ₱ <?php echo $row['Rate'] ?></i></span> Per Night </h4>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <h4 class="text-secondary"><?php echo $row['Description'] ?></h4>
                            </div>
                        </div>
                    </div>
                    <form method="POST">
                        <div class="row mt-5">
                            <div class="col-lg-4">

                                <input type="hidden" id="price" value="<?php echo $row['Rate'] ?>">
                                <input type="hidden" id="datedifference">
                                <label class="form-label">Arrival : </label>
                                <input type="date" class="form-control" name="arrival" id="arrival" value="<?php echo $In ?>" style="background-color: rgb(235,235,228)" readonly >
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Departure : </label>
                                <input type="date" class="form-control" name="departure" id="departure" value="<?php echo $Out ?>" style="background-color: rgb(235,235,228)" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Total</label>
                                <div class="input-group">

                                    <div class="input-group-text">₱</div>
                                    <input type="number" class="form-control" name="total" id="total"  style="background-color: rgb(235,235,228)" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="" class="form-label">Notes for the reservation :</label>
                                <input type="text" class="form-control" name="remarks"></input>
                            </div>
                        </div>
                </div>
            </div>

            <div class="card-footer text-muted">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <a href="rooms.php" class="btn btn-danger" style="width: 100%;">Cancel</a>
                    </div>
                    <div class="col-4">
                        <button type="submit" name="submit" class="btn btn-success" style="width: 100%;">Send Reservation</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>





</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


<script>

$(document).ready(function() {
        displayData();
    });

    function displayData() {
        var start_date = new Date(document.getElementById('arrival').value);
        var end_date =  new Date(document.getElementById('departure').value);
        //Here we will use getTime() function to get the time difference
        var time_difference = end_date.getTime() - start_date.getTime();
        //Here we will divide the above time difference by the no of miliseconds in a day
        var days_difference = time_difference / (1000 * 3600 * 24);
        //alert(days);
        document.getElementById('datedifference').value = days_difference;

        var Total = 0;
        var y = Number($("#price").val());
        var Total = days_difference * y;
        var aTotal = Total.toFixed(2);
        $("#total").val(aTotal);

    }
</script>

</html>