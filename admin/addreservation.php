<?php

use LDAP\Result;

include 'themes/navbar.php';

include 'config.php';
error_reporting();

if (isset($_POST['submit'])) {
    $userid = $_SESSION['adminid'];
    $Code = mt_rand('100', '1000000000');
    $Name = $_POST['Name'];
    $GuestId = $_POST['LastId'];
    $RoomId = $_POST['RoomId'];
    $Arrival = $_POST['Arrival'];
    $Departure = $_POST['Departure'];
    $Total = $_POST['Total'];
    $Remarks = $_POST['Remarks'];
    $Deposit = $_POST['Deposit'];

    $sql = "INSERT INTO `roomreservation`
    (`Code`, `RoomRateId`, `Arrival`, `Departure`, `Total`, `Deposit`, `GuestId`, `Status`, `Notes`,`UserId`)
     VALUES 
     ('$Code', '$RoomId','$Arrival','$Departure','$Total','$Deposit','$GuestId','Accepted','$Remarks','$userid')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

    ' . $Name . ' reservation has been added successfuly!
    
    <a  href="hrraccepted.php" >View</a>
  </div>';
    } else {
        echo "<script>'Failed to Create Reservation. Try Again!'</script>";
    }
}

if (isset($_POST['cancel'])) {
    $GuestId = $_POST['LastId'];
    $sql = "DELETE FROM `user` WHERE Id= $GuestId";
    $result = mysqli_query($conn, $sql);
}
?>


<div>

    <section class="bg-secondary">
        <div class="card mb-4">
            <div class="card-header text-primary">
                <h4> <i class="fa-solid fa-file-circle-plus"></i>Add Reservation</h4>
            </div>
            <div class="card-header text-info">



            </div>


            <?php
            if (isset($_POST['next'])) {
                $FirstName = $_POST['FirstName'];
                $LastName = $_POST['LastName'];
                $Address = $_POST['Address'];
                $Phone = $_POST['Phone'];

                $sql = "INSERT INTO `user`
            (`FirstName`, `LastName`,`RoleId`, `Address`, `Contact`)
             VALUES 
            ('$FirstName','$LastName','3','$Address','$Phone')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $LastId = mysqli_insert_id($conn);
                }
            ?>

                <?php
                $sql =
                    "SELECT  rr.Title, rrpt.Rate, rr.RoomCategoryId AS Id
                    FROM roomrate rr
                    LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
                    WHERE rr.RoomTypeId = 1;";
                $result = mysqli_query($conn, $sql);
                

                ?>

                
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header bg-success text-white ">
                            Reservation Details
                        </div>
                        <form method="POST">
                            <div class="card-body">


                                <div class="row">
                                    <input type="hidden" name="Price" id="Price" class="form-control">
                                    <input type="hidden" name="DateDifference" id="DateDifference" class="form-control">
                                    <input type="hidden" name="LastId" class="form-control" value="<?php echo $LastId ?>">
                                    <input type="hidden" name="Name" class="form-control" value="<?php echo $FirstName . " " . $LastName ?>">
                                    <div class="col-md-4 mt-2">
                                        <label class="form-label">Room Type :</label>
                                        <select class="form-select form-select-md  mb-3" name="RoomId" id="RoomId" aria-label=".form-select-lg example" onchange="fetchroom()"  required>
                                            <option selected value="">Select Room Type </option>
                                            <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                                $roomid = $row['Id'];
                                                $roomtype = $row['Title'];
                                                $roomprice = $row['Rate'];

                                                echo ' <option value= "' . $roomid . '">' . $roomtype . ' @ ' . $roomprice . ' </option>   ';
                                            }

                                            ?>
                                        </select>

                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <label class="form-label">Arrival :</label>
                                        <input type="date" name="Arrival" id="Arrival" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <label class="form-label">Departure :</label>
                                        <input type="date" name="Departure" id="Departure" class="form-control" onchange="getDays()" required>
                                    </div>
                                    <div class="col-md-2 mt-2">
                                        <label class="form-label">Total:</label>
                                        <div class="input-group">
                                            <div class="input-group-text">₱</div>
                                            <input type="number" name="Total" id="Total" class="form-control" required style="background-color: rgb(235,235,228)" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-8">
                                        <label class="form-label">Notes :</label>
                                        <input type="text" name="Remarks" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <label class="form-label">Deposit :</label>
                                        <input type="number" name="Deposit" class="form-control" required>
                                    </div>
                                    <div class="col-sm-2 mt-4">
                                        <button type="submit" name="submit" class="btn btn-success " style="width:100% ;">
                                            <i class="fa-solid fa-floppy-disk"></i>
                                            Reserve</button>
                                    </div>
                        </form>
                        <form method="POST" class="d-flex justify-content-end">
                            <input type="hidden" name="LastId" class="form-control" value="<?php echo $LastId ?>">
                            <div class="col-sm-2 mt-4">
                                <button type="cancel" name="cancel" class="btn btn-danger " style="width:100% ;">

                                    Cancel</button>
                            </div>
                        </form>
                    </div>

                </div>



        </div>
</div>


</div>




<?php
            } else {
?>
    <div class="container-fluid bg-secondary" style="height: 100vh;">
        <div class="card my-5">
            <div class="card-header bg-success text-white">
                Guest Details
            </div>
            <div class="card-body">
                <form method="POST" autocomplete="off">
                    <div class="row mt-3 ">
                        <div class="col-md-6 ">
                            <label class="form-label">First Name :</label>
                            <input type="text" name="FirstName" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" placeholder="e.g. Juan" required>
                        </div>
                        <div class="col-md-6 ">
                            <label class="form-label">Last Name :</label>
                            <input type="text" name="LastName" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" placeholder="e.g. Dela Cruz" required>
                        </div>

                    </div>
                    <div class="row mt-3 ">
                        <div class="col-md-6 ">
                            <label class="form-label">Phone :</label>
                            <input type="tel" name="Phone" class="form-control" placeholder="e.g. 09126549845" minlength="11" maxlength="11" required>
                        </div>

                        <div class="col-md-6 ">
                            <label class="form-label">Address :</label>
                            <input type="text" name="Address" class="form-control" placeholder="e.g. Purok 1, Street, City, Province" required>
                        </div>
                    </div>
                    <div class="row  my-3">
                        <button class="btn btn-success mx-auto" name="next" style="width: 50%;">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>


</section>

</div>
</div>


</secti>












<script>
    // Date Limitation
    var Arrival = new Date();
    Arrival = new Date(Arrival.setDate(Arrival.getDate() + 2)).toISOString().split('T')[0];
    document.getElementsByName("Arrival")[0].setAttribute('min', Arrival);

    var Departure = new Date();
    Departure = new Date(Departure.setDate(Departure.getDate() + 3)).toISOString().split('T')[0];
    document.getElementsByName("Departure")[0].setAttribute('min', Departure);




    // Calculate Date Difference
    function getDays() {

        var start_date = new Date(document.getElementById('Arrival').value);
        var end_date = new Date(document.getElementById('Departure').value);
        //Here we will use getTime() function to get the time difference
        var time_difference = end_date.getTime() - start_date.getTime();
        //Here we will divide the above time difference by the no of miliseconds in a day
        var days_difference = time_difference / (1000 * 3600 * 24);
        //alert(days);
        document.getElementById('DateDifference').value = days_difference;

        var Total = 0;
        var y = Number($("#Price").val());
        var Total = days_difference * y;
        $("#Total").val(Total);
    }

    // Fetch Data on Hall Details
    function fetchroom() {
        var id = document.getElementById("RoomId").value;
        $.ajax({
            url: "function/roomadd/room.php",
            method: "POST",
            data: {
                x: id
            },
            dataType: "JSON",
            success: function(data) {
                document.getElementById("Price").value = data.Rate;


            }
        })

    }
</script>





















<?php include 'themes/footer.php'; ?>