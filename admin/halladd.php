<?php
session_start();
error_reporting(0);
include 'themes/navbar.php';
include 'config.php';



if (isset($_POST['submit'])) {
    $userid = $_SESSION['adminid'];
    $Name = $_POST['FirstName'];
    $Code = mt_rand('100', '1000000000');

    $GuestId = $_POST['LastId'];

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
    (`Code`, `RoomRateId`, `Arrival`, `Total`, `Deposit`, `GuestId`, `Status`, `Notes`,`UserId`) 
    VALUES 
    ('$Code','$HallPackage','$Arrival','$GrandTotal','$Deposit','$GuestId','Accepted','$Remarks',' $userid')";
    $aresult = mysqli_query($conn, $asql);
    $RRLastId = mysqli_insert_id($conn);


    for ($x = 0; $x < COUNT($_POST['R']); $x++){
        if($_POST['R'][$x] != ""){

            $Quantity = $_POST['R'][$x];
            $RentalId = $_POST['RID'][$x];

            $bsql = "INSERT INTO 
            `roomreservationextra`(`RoomReservationId`, `RoomExtraId`, `Quantity`) 
            VALUES 
            ('$RRLastId','$RentalId','$Quantity')";
            $bresult = mysqli_query($conn, $bsql);
           
        
        } 
      }
   
    if ($aresult) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

    ' . $Name . ' Hall Reservation has been added successfuly!
    
    <a  href="hallreservationlist.php" >View</a>
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



<div class="card">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-table-columns"></i>
            Hall Reservation </h4>
    </div>

</div>


<?php

if (isset($_POST['next'])) {
    $FirstName = $_POST['GuestFirstName'];
    $LastName = $_POST['GuestLastName'];
    $Address = $_POST['GuestAddress'];
    $Phone = $_POST['GuestPhone'];

    $sql = "INSERT INTO `user`
        (`FirstName`, `LastName`, `Address`, `Contact`)
            VALUES 
        ('$FirstName','$LastName','$Address','$Phone')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $LastId = mysqli_insert_id($conn);
    }

?>
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
                            <input type="text" class="form-control" value="<?php echo $FirstName . " " . $LastName ?>" disabled>
                        </div>

                        <div class="col-lg-3 mb-2">
                            <label for="Arrival" class="form-label">Reservation Date and Time :</label>
                            <input type="datetime-local" name="Arrival" id="Arrival" class="form-control" required>
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
                    <label class="form-label">Deposit :</label>
                    <input type="number" name="Deposit" class="form-control" required>
                </div>
                <div class="col-2">

                    <label for="" class="form-label">Grand Total : <span><button type="button" onclick="grandtotal()">Calculate</button></span></label>
                    <div class="input-group">
                        <div class="input-group-text">₱</div>
                        <input type="text" class="form-control" name="GrandTotal" id="GrandTotal" style="background-color: rgb(235,235,228)" readonly>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-success mt-4" name="submit" style="width: 100%;">Submit</button>
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








<?php  } else {  ?>

    <div class="container-fluid pt-2 bg-secondary" style="height: 100vh;">

        <div class="card border-3 mb-3">
            <form method="POST">
                <div class="card-header bg-success text-white">
                    Guest Details
                </div>
                <div class="card-body" style="background-color:#f2f2f2;">
                    <div class="row">
                        <div class="col-lg-3 mb-2">
                            <label for="Guestname" class="form-label">First Name :</label>
                            <input type="text" name="GuestFirstName" class="form-control" required>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label for="GuestLastName" class="form-label">Last Name : </label>
                            <input type="text" name="GuestLastName" class="form-control" required>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label for="GuestPhone" class="form-label">Phone :</label>
                            <input type="number" name="GuestPhone" class="form-control" required>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label for="GuestAddress" class="form-label">Address :</label>
                            <input type="text" name="GuestAddress" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-end">
                        <div class="col-md-2">
                            <button class="btn btn-success" name="next" style="width: 100%;">Proceed</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>






<?php }  ?>


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
            url: "function/hallpackagedisplay.php",
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
            url: "function/rentaldisplay.php",
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
            url: "function/additionaldisplay.php",
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
            url: "function/corckagedisplay.php",
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
            url: "function/halladd/food.php",
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







<?php include 'themes/footer.php'; ?>