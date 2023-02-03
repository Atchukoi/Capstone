<?php
session_start();
error_reporting(0);
$GuestId = $_GET['Id'];
$SelectedDate = $_GET['d'];
include 'config.php';


$now = new DateTime($SelectedDate); //now

$hours = 4; // hours amount (integer) you want to add
$modified = (clone $now)->add(new DateInterval("PT{$hours}H")); // use clone to avoid modification of $now object

$Departure = $modified->format('Y-m-d H:i:s'); // 2021-09-12 13:01:55

if (isset($_POST['submit'])) {
    $userid = $_SESSION['adminid'];
    $Name = $_POST['FirstName'];
    $Code = mt_rand('100', '1000000000');

    $Arrival = $_POST['Arrival'];
    $Event = $_POST['Event'];

    $HallPackage = $_POST['HallPackage'];
    $HallTotal = $_POST['HallTotal'];




    $RentTotal = $_POST['RentTotal'];

    $FoodName = $_POST['FoodName'];
    $FoodPax = $_POST['FoodPax'];
    $FoodTotal = $_POST['FoodTotal'];

    $Additional = $_POST['Additional'];
    $AdditionalTotal = $_POST['AdditionalTotal'];

    $Corckage = $_POST['Corckage'];
    $CorkageTotal = $_POST['CorkageTotal'];
    $Remarks = $_POST['Remarks'];
    $Deposit = $_POST['Deposit'];
    $GrandTotal = $_POST['GrandTotal'];

    $asql = "INSERT INTO `roomreservation`
    (`Code`, `RoomRateId`, `Arrival`,`Departure`,`Event`, `Total`,`GuestId`, `Status`, `Notes`) 
    VALUES 
    ('$Code','$HallPackage','$SelectedDate','$Departure','$Event','$GrandTotal','$GuestId','Pending','$Remarks')";
    $aresult = mysqli_query($conn, $asql);
    $RRLastId = mysqli_insert_id($conn);


    for ($x = 0; $x < COUNT($_POST['R']); $x++) {
        if ($_POST['R'][$x] != "") {

            $Quantity = $_POST['R'][$x];
            $RentalId = $_POST['RID'][$x];

            $bsql = "INSERT INTO 
            `roomreservationextra`(`RoomReservationId`, `RoomExtraId`, `Quantity`) 
            VALUES 
            ('$RRLastId','$RentalId','$Quantity')";
            $bresult = mysqli_query($conn, $bsql);
        }
    }

    $xsql = "INSERT INTO `foodreservation`
    (`RoomReservationId`, `FoodPackageId`, `Quantity`)
       VALUES 
    ('$RRLastId','$FoodName','$FoodPax')";
    $xresult = mysqli_query($conn, $xsql);

    echo '<script type="text/javascript">alert("Reservation Successfully Send! Check your booking list on your Profile."); window.location.href = "http://localhost/hms/capstone/bookinglist.php?Id=' . $GuestId . '"; </script>';
}

if (isset($_POST['cancel'])) {
    header('Location: http://localhost/hms/capstone/halls.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Perfecta</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <!--JS Query CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>


<div class="card">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-table-columns"></i>
           Ballroom Hall Reservation </h4>
    </div>

</div>


    <div class="container-fluid bg-secondary" style="height: 100vh;">
        <form method="POST" >
            <input type="hidden" name="FirstName" class="form-control" value="<?php echo $FirstName ?>">
            <input type="hidden" name="LastName" class="form-control" value="<?php echo $LastName ?>">
            <input type="hidden" name="Contact" class="form-control" value="<?php echo $Phone ?>">
            <input type="hidden" name="LastId" class="form-control" value="<?php echo $LastId ?>">
            <div class="card border-3 mb-3">
                <div class="card-header bg-success text-white">
                    Reservation Details
                </div>
                <div class="card-body" style="background-color:#f2f2f2;">


                    <div class="row">
                        <div class="col-lg-3 mb-2">
                            <label for="Arrival" class="form-label">Guest Name :</label>
                            <input type="text" class="form-control" value="<?php $qresult = mysqli_query($conn, "SELECT CONCAT(Firstname,' ',Lastname) As GuestName FROM user WHERE Id = $GuestId"); $qrow = mysqli_fetch_assoc($qresult); echo $qrow['GuestName']; ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>

                        <div class="col-lg-3 mb-2">
                            <label for="Arrival" class="form-label">Reservation Date and Time :</label>
                            <input type="datetime-local" name="Arrival" id="Arrival" class="form-control" value="<?php echo $SelectedDate ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>

                        <div class="col-lg-3 mb-2">
                            <label for="Arrival" class="form-label">Event Type :</label>
                            <input type="text" name="Event" id="Event" class="form-control" required>
                        </div>

                        <div class="col-lg-3 mb-2">
                            <label for="" class="form-label text-danger">Hall Payment Total :</label>
                            <div class="input-group">
                                <div class="input-group-text">₱</div>
                                <input type="number" class="form-control" name="HallTotal" id="HallTotal" style="background-color: rgb(235,235,228)" readonly>
                            </div>





                        </div>







                        <div>
                            <div class="card card-body">
                                <div class="row mt-3">

                                    <div id="displayDataTable">

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="row ">
                <div class="container my-3">
                    <div class="row">
                        <div class="container">
                            <div class="card border-3">
                                <div class="card-header text-white bg-success">
                                    Rentals
                                </div>
                                <div class="card-body" style="background-color:#f2f2f2;">
                                    <div class="container-md-6">
                                        <div class="row">

                                            <div id="RentaldisplayDataTable">

                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-md-2">
                                                <label for="" class="form-label text-danger">Rent Payment Total :</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="number" class="form-control" name="RentTotal" id="RentTotal" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <div class="card border-3">
                                <div class="card-header text-white bg-success">
                                    Food Package
                                </div>

                                <?php
                                $foodsql = "SELECT * FROM foodpackage";
                                $foodresult = mysqli_query($conn, $foodsql);
                                ?>

                                <div class="card-body " style="background-color:#f2f2f2;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="" class="form-label">Food Bundle :</label>
                                            <select class="form-select form-select-md mb-3" name="FoodName" id="FoodName" aria-label=".form-select-lg example" onchange="fetchfood()">
                                                <option selected value="0">--Select Food Bundle-- </option>
                                                <?php
                                                while ($foodrow = mysqli_fetch_array($foodresult)) {
                                                    $foodid = $foodrow['Id'];
                                                    $foodname = $foodrow['Title'];
                                                    $min = $foodrow['Minimum'];
                                                    $max = $foodrow['Maximum'];
                                                    echo ' <option value= "' . $foodid . '">' . $foodname . '</option> ';
                                                }
                                                ?>

                                            </select>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="" class="form-label">Price per pax :</label>
                                            <div class="input-group">
                                                <div class="input-group-text ">₱</div>
                                                <input type="number" class="form-control" name="FoodCost" id="FoodCost" style="background-color: rgb(235,235,228)" readonly>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="" class="form-label">Description :</label>
                                            <input type="text" class="form-control" name="FoodDescription" id="FoodDescription" style="background-color: rgb(235,235,228)" readonly>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="" class="form-label">Pax :</label>
                                            <div class="input-group">
                                                <div class="input-group-text ">Pax</div>
                                                <input type="number" class="form-control" name="FoodPax" id="FoodPax" min="" max="" onKeyDown="return false" onchange="computefood()">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="" class="form-label">Menu :</label>
                                            <input type="text" class="form-control" name="FoodMenu" id="FoodMenu" style="background-color: rgb(235,235,228)" readonly>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-md-2 offset-md-10">
                                            <label for="" class="form-label text-danger">Food Total :</label>
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="text" class="form-control" name="FoodTotal" id="FoodTotal" style="background-color: rgb(235,235,228)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="row ">
                <div class="container mb-3">
                    <div class="row">
                        <div class="container">
                            <div class="card border-3">
                                <div class="card-header text-white bg-success mb-3 " style="background-color:#f2f2f2;">
                                    Additional Menu
                                </div>

                                <div id="additionaldisplayDataTable"></div>
                                <div class="col-md-2 offset-md-10 mb-2">
                                    <label for="" class="form-label text-danger">Additional Total :</label>
                                    <div class="input-group">
                                        <div class="input-group-text">₱</div>
                                        <input type="text" class="form-control" name="AdditionalTotal" id="AdditionalTotal" style="background-color: rgb(235,235,228)" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <div class="card border-3">
                                <div class="card-header text-white bg-success">
                                    Corkage Fee
                                </div>
                                <div class="card-body " style="background-color:#f2f2f2;">
                                    <div class="row">

                                        <div id="CorckagedisplayDataTable"></div>

                                        <div class="col-md-2 offset-md-10">
                                            <label for="" class="form-label text-danger">Corkage Total :</label>
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="text" class="form-control" name="CorkageTotal" id="CorkageTotal" style="background-color: rgb(235,235,228)" readonly>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Notes :</label>
                    <input type="text" name="Remarks" class="form-control">
                </div>
            </div>

            <div class="row justify-content-end ">
                
                <div class="col-2">

                    <label for="" class="form-label">Grand Total : <span><button type="button" onclick="grandtotal()">Calculate</button></span></label>
                    <div class="input-group">
                        <div class="input-group-text">₱</div>
                        <input type="text" class="form-control" name="GrandTotal" id="GrandTotal" style="background-color: rgb(235,235,228)" readonly>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-success mt-4" name="submit" style="width: 100%;" onmouseover="grandtotal()">Submit</button>
                </div>
            </div>
        </form>
        <form method="POST" class="d-flex justify-content-end mb-4">
            <input type="hidden" name="LastId" class="form-control" value="<?php echo $LastId ?>">
            <div class="col-sm-2 mt-4">
                <button type="cancel" name="cancel" class="btn btn-danger " style="width:100% ;">

                    Cancel</button>
            </div>
        </form>

    </div>




</div>
</div>



<script>
    // for display hall package
    $(document).ready(function() {
        displayData();
    });

    //display function
    function displayData() {
        var displayData = "true";
        $.ajax({
            url: "admin/function/bhdisplay.php",
            type: 'POST',
            data: {
                displaySend: displayData
            },
            success: function(data, status) {
                $('#displayDataTable').html(data);
            }
        })
    }

    // for display hall package
    $(document).ready(function() {
        rentaldisplayData();
    });

    //display function
    function rentaldisplayData() {
        var displayData = "true";
        $.ajax({
            url: "admin/function/rentaldisplay.php",
            type: 'POST',
            data: {
                displaySend: displayData
            },
            success: function(data, status) {
                $('#RentaldisplayDataTable').html(data);
            }
        })
    }

    // for display additional package
    $(document).ready(function() {
        additionaldisplayData();
    });

    //display function
    function additionaldisplayData() {
        var displayData = "true";
        $.ajax({
            url: "admin/function/additionaldisplay.php",
            type: 'POST',
            data: {
                displaySend: displayData
            },
            success: function(data, status) {
                $('#additionaldisplayDataTable').html(data);
            }
        })
    }

    // for display corckage package
    $(document).ready(function() {
        corckagedisplayData();
    });

    //display function
    function corckagedisplayData() {
        var displayData = "true";
        $.ajax({
            url: "admin/function/corckagedisplay.php",
            type: 'POST',
            data: {
                displaySend: displayData
            },
            success: function(data, status) {
                $('#CorckagedisplayDataTable').html(data);
            }
        })
    }

    // Add Hallpackage Cost Credits by Dennis Pogi dennis.jayvee.Patricio.03@gmail.com
    function addHall(id) {

        var button1 = document.getElementById("HallPackage" + id);
        var a1 = Number($("#a" + id).val());
        var Total = Number($("#HallTotal").val());

        if (button1.checked) {

            $("#HallTotal").val(Total + a1);
        } else {

            $("#HallTotal").val(Total - a1);
        }
    }

    // // Add Hallpackage Cost Credits by Dennis Pogi dennis.jayvee.Patricio.03@gmail.com
    // function computedata(id) {

    //     var button1 = document.getElementById("Rental" + id);
    //     var a1 = Number($("#b" + id).val());
    //     var Total = Number($("#RentTotal").val());

    //     if (button1.checked) {

    //         $("#RentTotal").val(Total + a1);
    //     } else {

    //         $("#RentTotal").val(Total - a1);
    //     }
    // }

    // add rental per pc
    function computedata(rentalid) {
        
        
       
        if (rentalid != 0 ) {
            var inputdata = document.getElementById(rentalid).value;

            if (inputdata.trim() == "") {
            document.getElementById("rental-id-"+rentalid).value = "";
        } else {
            document.getElementById("rental-id-"+rentalid).value = rentalid;
        }

        }

        
        
        var totalamount = 0;
        
        $('.rentals').each(function(index, obj) {
            if (this.checked === true) {
                // var id = ;
                var id = this.id;
                console.log();
                totalamount += parseFloat($("input[data-rental-check='" + id +"']").val());
            }
        }); 

        $('.rentals-input').each(function(index, obj) {
            if (this.value != "") {
                var id = this.getAttribute("id");
                var compute = parseFloat($("input[data-rental='rental-" + id +"']").val()) * parseFloat(document.getElementById("rental-"+id).value);
                totalamount += parseFloat(compute);
               
            }
        });

        $("#RentTotal").val(totalamount);
    }

    // Fetch Food Data
    function fetchfood() {
        var id = document.getElementById("FoodName").value;
        $.ajax({
            url: "admin/function/halladd/food.php",
            method: "POST",
            data: {
                x: id
            },
            dataType: "JSON",
            success: function(data) {
                document.getElementById("FoodDescription").value = data.Description;
                document.getElementById("FoodMenu").value = data.Menu;
                document.getElementById("FoodCost").value = data.Cost;
                var foodpax = document.getElementById("FoodPax");
                foodpax.setAttribute("min",data.Minimum);
                foodpax.setAttribute("max",data.Maximum);
                

            }
        })
    }

    // Compute Food Package
    function computefood() {
        var pax = Number($("#FoodPax").val());
        var price = Number($("#FoodCost").val());
        var NewTotal = pax * price; 
        $("#FoodTotal").val(NewTotal);
    }

    //Compute Food Additional
    function additional(rentalid) {

        
        if (rentalid != 0 ) {
            var inputdata = document.getElementById(rentalid).value;

            if (inputdata.trim() == "") {
            document.getElementById("rental-id-"+rentalid).value = "";
        } else {
            document.getElementById("rental-id-"+rentalid).value = rentalid;
        }

        }
        
        var totalamount = 0;

        $('.additional-input').each(function(index, obj) {
            if (this.value != "") {
                var id = this.getAttribute("id");
                var compute = parseFloat($("input[data-rental='rental-" + id +"']").val()) * parseFloat(document.getElementById("rental-"+id).value);
                totalamount += parseFloat(compute);
               
            }
        });
        $("#AdditionalTotal").val(totalamount);
    }

    //Compute Corckage
    function corckage(rentalid) {
        
        if (rentalid != 0 ) {
            var inputdata = document.getElementById(rentalid).value;

            if (inputdata.trim() == "") {
            document.getElementById("rental-id-"+rentalid).value = "";
        } else {
            document.getElementById("rental-id-"+rentalid).value = rentalid;
        }

        }
        
        var totalamount = 0;

        $('.corckage-input').each(function(index, obj) {
            if (this.value != "") {
                var id = this.getAttribute("id");
                var compute = parseFloat($("input[data-rental='rental-" + id +"']").val()) * parseFloat(document.getElementById("rental-"+id).value);
                totalamount += parseFloat(compute);
               
            }
        });
        $("#CorkageTotal").val(totalamount);
    }


    //Compute GrandTotal
    function grandtotal() {
        var total = 0;
        var hall = Number($("#HallTotal").val());
        var rent = Number($("#RentTotal").val());
        var food = Number($("#FoodTotal").val());
        var additional = Number($("#AdditionalTotal").val());
        var corkage = Number($("#CorkageTotal").val());

        var total = hall + rent + food + additional + corkage;

        $("#GrandTotal").val(total);
    }
</script>

</form>
</div>

<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<!--Table / Ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="extensions/resizable/bootstrap-table-resizable.js"></script>

</html>





