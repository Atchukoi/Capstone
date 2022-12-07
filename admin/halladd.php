<?php
error_reporting(0);
include 'themes/navbar.php';
include 'config.php';

if (isset($_POST['submit'])) {
    $Name = $_POST['FirstName'];
    $Code = mt_rand('100', '1000000000');

    $GuestId = $_POST['LastId'];

    $Arrival = $_POST['Arrival'];
    $Event = $_POST['Event'];
    $Exceeding = $_POST['Exceeding'];

    $HallName = $_POST['HallName'];
    $HallTotal = $_POST['HallTotal'];

    $HallPackage = $_POST['HallPackage'];

    $SoundSystem = $_POST['SoundSystem'];
    $EveningEvent = $_POST['EveningEvent'];
    $Projector = $_POST['Projector'];
    $VenueBasic = $_POST['VenueBasic'];
    $VenueDecoration = $_POST['VenueDecoration'];
    $VenueFull = $_POST['VenueFull'];
    $StageBasic = $_POST['StageBasic'];
    $StageTheme = $_POST['StageTheme'];

    $MovingLights = $_POST['MovingLights'];
    $FullyRoundTable = $_POST['FullyRoundTable'];
    $RoundTable = $_POST['RoundTable'];
    $RectangularTable = $_POST['RectangularTable'];
    $TiffanyChair = $_POST['TiffanyChair'];
    $RentTotal = $_POST['RentTotal'];

    $FoodName = $_POST['FoodName'];
    $FoodPax = $_POST['FoodPax'];
    $PricePax = $_POST['PricePax'];
    $FoodTotal = $_POST['FoodTotal'];

    $AddSeafood = $_POST['AddSeafood'];
    $AddPork = $_POST['AddPork'];
    $AddChicken = $_POST['AddChicken'];
    $AddVegetables = $_POST['AddVegetables'];
    $AdditionalTotal = $_POST['AdditionalTotal'];

    $Lechon = $_POST['Lechon'];
    $Wine = $_POST['Wine'];
    $OtherFood = $_POST['OtherFood'];
    $CorkageTotal = $_POST['CorkageTotal'];
    $Remarks = $_POST['Remarks'];
    $Deposit = $_POST['Deposit'];
    $GrandTotal = $_POST['GrandTotal'];

    $sql = "INSERT INTO `tblhallreservation`
    (`Code`, `Status`,`GuestId`, `Arrival`,`Event`, `ExtraHours`, `HallId`, `HallTotal`, `HalllPackageId`, `SoundSytem`, `FullLights`, `Projector`, `VenueBasic`, `VenueDecoration`, `VenueFull`, `StageBasic`, `StageTheme`, `MovingLights`, `FurnishedRoundTable`, `RoundTable`, `RectangularTable`, `TiffanyChair`, `RentTotal`, `FoodPackageId`, `NumberPax`, `PricePax`, `FoodTotal`, `AddSeafood`, `AddPork`, `AddChicken`, `AddVegetables`, `AddTotal`, `Lechon`, `Wine`, `OtherFood`, `CorkageTotal`,`Remarks`,`Deposit`, `GrandTotal`) 
    VALUES 
    ('$Code','Accepted','$GuestId','$Arrival','$Event','$Exceeding','$HallName','$HallTotal','$HallPackage','$SoundSystem','$EveningEvent','$Projector','$VenueBasic','$VenueDecoration','$VenueFull','$StageBasic','$StageTheme','$MovingLights','$FullyRoundTable','$RoundTable','$RectangularTable','$TiffanyChair','$RentTotal','$FoodName','$FoodPax','$PricePax','$FoodTotal','$AddSeafood','$AddPork','$AddChicken','$AddVegetables','$AdditionalTotal','$Lechon','$Wine','$OtherFood','$CorkageTotal','$Remarks','$Deposit','$GrandTotal')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
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
    $sql = "DELETE FROM `tblguest` WHERE Id= $GuestId";
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

    $sql = "INSERT INTO `tblguest`
        (`FirstName`, `LastName`, `Address`, `Phone`)
            VALUES 
        ('$FirstName','$LastName','$Address','$Phone')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $LastId = mysqli_insert_id($conn);
    }

?>
    <div class="container">
        <form method="POST">
            <input type="hidden" name="FirstName" class="form-control" value="<?php echo $FirstName ?>">
            <input type="hidden" name="LastName" class="form-control" value="<?php echo $LastName ?>">
            <input type="hidden" name="LastId" class="form-control" value="<?php echo $LastId ?>">
            <div class="card border-3 mb-3">
                <div class="card-header bg-success text-white">
                    Reservation Details
                </div>
                <div class="card-body" style="background-color:#f2f2f2;">
                    <div class="row">

                        <div class="col-lg-3 mb-2">
                            <label for="Arrival" class="form-label">Reservation Date and Time :</label>
                            <input type="datetime-local" name="Arrival" id="Arrival" class="form-control" required>
                        </div>

                        <div class="col-lg-3 mb-2">
                            <label for="Arrival" class="form-label">Event Type :</label>
                            <input type="text" name="Event" id="Event" class="form-control" required>
                        </div>

                        <!-- <div class="col-md-3 mb-2">
                            <label for="Exceeding" class="form-label">Extra Hours :</label>
                            <input type="number" name="Exceeding" id="Exceeding" class="form-control">
                        </div> -->

                        <div class="col-lg-3 mt-4 text-center">
                            <p>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#halldetails" aria-expanded="false" aria-controls="collapseExample">
                                    Show / Hide Hall Details
                                </button>
                            </p>
                        </div>

                        <div class="col-lg-3 mt-4 text-center">
                            <p>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#hallpackage" aria-expanded="false" aria-controls="collapseExample">
                                    Show / Hide Hall Package
                                </button>
                            </p>
                        </div>

                    </div>


                    <div class="row">
                        <!-- Hall Details -->

                        <div class="collapse" id="halldetails">
                            <div class="card card-body">
                                <div class="card border-3">
                                    <div class="card-header text-white bg-success ">
                                        <div class="row justify-content-between">
                                            <div class="col-3">
                                                Hall Details
                                            </div>
                                            <div class="col-2">
                                                <button onclick="
                document.getElementById('HallName').value = '';
                document.getElementById('HallHours').value = ''; 
                document.getElementById('ExtraHours').value = ''; 
                document.getElementById('HallPrice').value = ''; 
                document.getElementById('HallExtra').value = ''; 
                document.getElementById('HallTotal').value = ''" class="btn btn-danger">
                                                    Clear Hall Details</button>
                                            </div>
                                        </div>
                                    </div>



                                    <?php
                                    $hallsql = "SELECT * FROM tblhall";
                                    $hallresult = mysqli_query($conn, $hallsql);
                                    ?>

                                    <div class="card-body" style="background-color:#f2f2f2;">
                                        <div class="row">
                                            <div class="col-md-3 mb-2">
                                                <label for="" class="form-label">Name :</label>
                                                <select class="form-select form-select-md mb-2" name="HallName" id="HallName" aria-label=".form-select-lg example" onchange="fetchhall()" required>
                                                    <option selected value="">-- Select --</option>
                                                    <?php
                                                    while ($hallrow = mysqli_fetch_array($hallresult)) {
                                                        $hallid = $hallrow['Id'];
                                                        $hallname = $hallrow['Name'];
                                                        echo ' <option value= "' . $hallid . '">' . $hallname . '</option> ';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <label for="" class="form-label">Hours : </label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="HallHours" id="HallHours" style="background-color: rgb(235,235,228)" readonly>
                                                    <div class="input-group-text">hour</div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <label for="" class="form-label">Price :</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="number" class="form-control" name="HallPrice" id="HallPrice" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <label for="" class="form-label">Per Extra Hour :</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="number" class="form-control" name="ExtraHours" id="ExtraHours" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-2 ">
                                                <label for="" class="form-label">Hall Payment Total :</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="number" class="form-control" name="HallTotal" id="HallTotal" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>




                        <!-- Hall Package -->
                        <div class="collapse" id="hallpackage">
                            <div class="card card-body">
                                <div class="row mt-3">
                                    <div class="col-lg-3 mb-3">
                                        <div class="card border-3">
                                            <div class="card-header text-white bg-success">
                                                <div class="form-check form-switch">

                                                    <input class="form-check-input" name="HallPackage" id="HallPackage1" value="1" type="checkbox" role="switch" onchange="add1()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> 50 Pax Package</label>
                                                </div>
                                                <p>Fully Air Conditioned Function Hall</p>
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="number" id="a1" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Cost FROM tblhallpackage WHERE Id = 1;");
                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                    echo $row['Cost']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                            <div class="card-body" style="background-color:#f2f2f2;">
                                                <p>
                                                    Inclusuions :
                                                </p>
                                                <ul>
                                                    <li>
                                                        4 Hours fully Air Conditioned
                                                    </li>
                                                    <li>
                                                        High Quality Sounds with Full Lights
                                                    </li>
                                                    <li>
                                                        Tables with Cloth
                                                    </li>
                                                    <li>
                                                        Tiffany Chairs with Foam
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <div class="card border-3">
                                            <div class="card-header text-white bg-success">
                                                <div class="form-check form-switch">

                                                    <input class="form-check-input" name="HallPackage" id="HallPackage2" value="2" type="checkbox" role="switch" onchange="add2()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">80 Pax Package</label>
                                                </div>
                                                <p>Fully Air Conditioned Function Hall</p>
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="a2" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Cost FROM tblhallpackage WHERE Id = 2;");
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                echo $row['Cost']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                            <div class="card-body" style="background-color:#f2f2f2;">
                                                <p>
                                                    Inclusuions :
                                                </p>
                                                <ul>
                                                    <li>
                                                        4 Hours fully Air Conditioned
                                                    </li>
                                                    <li>
                                                        High Quality Sounds with Full Lights
                                                    </li>
                                                    <li>
                                                        Tables with Cloth
                                                    </li>
                                                    <li>
                                                        Tiffany Chairs with Foam
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <div class="card border-3">
                                            <div class="card-header text-white bg-success">
                                                <div class="form-check form-switch">

                                                    <input class="form-check-input" name="HallPackage" id="HallPackage3" value="3" type="checkbox" role="switch" onchange="add3()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> 100 Pax Package</label>
                                                </div>
                                                <p>Fully Air Conditioned Ballroom Hall</p>
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="a3" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Cost FROM tblhallpackage WHERE Id = 3;");
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                echo $row['Cost']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                            <div class="card-body" style="background-color:#f2f2f2;">
                                                <p>
                                                    Inclusuions :
                                                </p>
                                                <ul>
                                                    <li>
                                                        4 Hours fully Air Conditioned
                                                    </li>
                                                    <li>
                                                        High Quality Sounds with Full Lights
                                                    </li>
                                                    <li>
                                                        Par Led Lights
                                                    </li>
                                                    <li>
                                                        Tables with Cloth
                                                    </li>
                                                    <li>
                                                        Tiffany Chairs with Foam
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <div class="card border-3">
                                            <div class="card-header text-white bg-success">
                                                <div class="form-check form-switch">

                                                    <input class="form-check-input" name="HallPackage" id="HallPackage4" value="4" type="checkbox" role="switch" onchange="add4()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"> 150 Pax Package</label>
                                                </div>
                                                <p>Fully Air Conditioned Ballroom Hall</p>
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="a4" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Cost FROM tblhallpackage WHERE Id = 4;");
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                echo $row['Cost']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                            <div class="card-body" style="background-color:#f2f2f2;">
                                                <p>
                                                    Inclusuions :
                                                </p>
                                                <ul>
                                                    <li>
                                                        4 Hours fully Air Conditioned
                                                    </li>
                                                    <li>
                                                        High Quality Sounds with Full Lights
                                                    </li>
                                                    <li>
                                                        Par Led Lights
                                                    </li>
                                                    <li>
                                                        Tables with Cloth
                                                    </li>
                                                    <li>
                                                        Tiffany Chairs with Foam
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>















            <div class="row mt-3">
                <div class="container">
                    <div class="row">
                        <div class="container">
                            <div class="card border-3">
                                <div class="card-header text-white bg-success">
                                    Rentals
                                </div>
                                <div class="card-body" style="background-color:#f2f2f2;">
                                    <div class="container-md-6">
                                        <div class="row">

                                            <div class="col-md-4 mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="SoundSystem" onchange="computedata()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">High Quality Sound System</label>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="SoundSystem" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 1;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="EveningEvent" onchange="computedata()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Evening or Full Lights</label>
                                                </div>

                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="EveningEvent" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 2;");
                                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                                echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="Projector" onchange="computedata()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Projector</label>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="Projector" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 4;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="StageBasic" onchange="computedata()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Stage Basic Decorations</label>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="StageBasic" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 5;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="StageTheme" onchange="computedata()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Stage Decorations with Motif / Theme</label>
                                                </div>

                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="StageTheme" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 6;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueBasic" onchange="computedata()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Venue Basic Decorations</label>
                                                </div>

                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="VenueBasic" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 7;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueDecoration" onchange="computedata()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Venue Decorations</label>
                                                </div>

                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="VenueDecoration" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 8;");
                                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                                echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueFull" onchange="computedata()">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Venue Full Decorations</label>
                                                </div>

                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="VenueFull" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 9;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-4 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text" style="width: 250px;">Moving Lights</div>
                                                    <input type="text" name="MovingLights" class="form-control rentals-input" onkeyup="computedata()">
                                                    <div class="input-group-text "> pc</div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" id="MovingLights" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 3;");
                                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                                echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text" style="width: 250px;">Fully Furnished Round Table</div>
                                                    <input type="text" name="FullyRoundTable" class="form-control rentals-input" onkeyup="computedata()">
                                                    <div class="input-group-text "> pc</div>
                                                </div>

                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" id="FullyRoundTable" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 10;");
                                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                                    echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text" style="width: 250px;">Round Table With Cloth</div>
                                                    <input type="text" name="RoundTable" class="form-control rentals-input" onkeyup="computedata()">
                                                    <div class="input-group-text "> pc</div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" id="RoundTable" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 11;");
                                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                                echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">



                                                <div class="col-md-4 mb-3">
                                                    <div class="input-group">
                                                        <div class="input-group-text" style="width: 250px;">Rectangular Table With Cloth</div>
                                                        <input type="text" name="RectangularTable" class="form-control rentals-input" onkeyup="computedata()">
                                                        <div class="input-group-text "> pc</div>
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <div class="input-group">
                                                            <div class="input-group-text">₱</div>
                                                            <input type="number" id="RectangularTable" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 12;");
                                                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                                                        echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <div class="input-group">
                                                        <div class="input-group-text" style="width: 300px;">Tiffany Chair (Gold / Silver) with Foam</div>
                                                        <input type="text" name="TiffanyChair" class="form-control rentals-input" onkeyup="computedata()">
                                                        <div class="input-group-text "> pc</div>
                                                    </div>
                                                    <div class="col-md-4 mt-2">
                                                        <div class="input-group">
                                                            <div class="input-group-text">₱</div>
                                                            <input type="number" id="TiffanyChair" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 13;");
                                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                                    echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row justify-content-end">
                                                <div class="col-md-2">
                                                    <label for="" class="form-label">Rent Total :</label>
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
            </div>





            <div class="row mt-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <div class="card border-3">
                                <div class="card-header text-white bg-success">
                                    Food Package
                                </div>

                                <?php
                                $foodsql = "SELECT * FROM tblfoodpackage";
                                $foodresult = mysqli_query($conn, $foodsql);
                                ?>

                                <div class="card-body " style="background-color:#f2f2f2;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="form-label">Food Bundle :</label>
                                            <select class="form-select form-select-md mb-3" name="FoodName" id="FoodName" aria-label=".form-select-lg example" onchange="fetchfood()">
                                                <option selected>--Select Food Bundle-- </option>
                                                <?php
                                                while ($foodrow = mysqli_fetch_array($foodresult)) {
                                                    $foodid = $foodrow['Id'];
                                                    $foodname = $foodrow['Name'];
                                                    echo ' <option value= "' . $foodid . '">' . $foodname . '</option> ';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="" class="form-label">Description :</label>
                                            <input type="text" class="form-control" name="FoodDescription" id="FoodDescription" style="background-color: rgb(235,235,228)" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="" class="form-label">Menu :</label>
                                            <input type="text" class="form-control" name="FoodMenu" id="FoodMenu" style="background-color: rgb(235,235,228)" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="" class="form-label">Minimum 50 Pax:</label>
                                            <div class="input-group">
                                                <div class="input-group-text ">Price</div>
                                                <input type="text" class="form-control" name="Pax50" id="Pax50" style="background-color: rgb(235,235,228)" readonly>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="form-label">80 Pax :</label>
                                            <div class="input-group">
                                                <div class="input-group-text ">Price</div>
                                                <input type="text" class="form-control" name="Pax80" id="Pax80" style="background-color: rgb(235,235,228)" readonly>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="form-label">100 Pax or More :</label>
                                            <div class="input-group">
                                                <div class="input-group-text "> Price</div>
                                                <input type="text" class="form-control" name="Pax100" id="Pax100" style="background-color: rgb(235,235,228)" readonly>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="form-label">Number of Pax :</label>
                                            <input type="number" name="FoodPax" id="FoodPax" class="form-control" onkeyup="foodpackage()">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="form-label">Price :</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="PricePax" id="PricePax" onkeyup="foodpackage()">
                                                <div class="input-group-text ">/ Pax</div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="form-label">Food Total :</label>
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

            <div class="row mt-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <div class="card border-3">
                                <div class="card-header text-white bg-success">
                                    Additional Menu
                                </div>
                                <div class="card-body " style="background-color:#f2f2f2;">
                                    <div class="row">

                                        <div class="col-md-2">
                                            <label for="" class="form-label">Seafood 100 Pax :</label>
                                            <div class="input-group">
                                                <input type="number" name="AddSeafood" class="form-control additional-input" onkeyup="additional()">
                                                <div class="input-group-text ">pc</div>
                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="AddSeafood" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 1;");
                                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                                        echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-2">
                                            <label for="" class="form-label">Pork 100 Pax :</label>
                                            <div class="input-group">
                                                <input type="number" name="AddPork" class="form-control additional-input" onkeyup="additional()">
                                                <div class="input-group-text ">pc</div>

                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="AddPork" name="" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 2;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-2">
                                            <label for="" class="form-label">Chicken 100 Pax :</label>
                                            <div class="input-group">
                                                <input type="number" name="AddChicken" class="form-control additional-input" onkeyup="additional()">
                                                <div class="input-group-text ">pc</div>
                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="AddChicken" name="" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 3;");
                                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                                echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-2">
                                            <label for="" class="form-label">Vegetables 100 Pax :</label>
                                            <div class="input-group">
                                                <input type="number" name="AddVegetables" class="form-control additional-input" onkeyup="additional()">
                                                <div class="input-group-text ">pc</div>
                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="AddVegetables" name="" class="form-control" placeholder="Price" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 4;");
                                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                                    echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="col-md-2 offset-md-2">
                                            <label for="" class="form-label">Additional Total :</label>
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
                </div>
            </div>

            <div class="row mt-3 mb-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="container">
                            <div class="card border-3">
                                <div class="card-header text-white bg-success">
                                    Corkage Fee
                                </div>
                                <div class="card-body " style="background-color:#f2f2f2;">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="" class="form-label">Lechon :</label>
                                            <div class="input-group">
                                                <input type="number" name="Lechon" class="form-control corkage-input" onkeyup="corckage()">
                                                <div class="input-group-text ">pc</div>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="Lechon" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 5;");
                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <label for="" class="form-label">Wine / Brandy :</label>
                                            <div class="input-group">
                                                <input type="number" name="Wine" class="form-control corkage-input" onkeyup="corckage()">
                                                <div class="input-group-text ">pc</div>

                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="Wine" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 6;");
                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="" class="form-label">Food and Others :</label>
                                            <div class="input-group">
                                                <input type="number" name="OtherFood" class="form-control corkage-input" onkeyup="corckage()">
                                                <div class="input-group-text ">pc</div>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="OtherFood" class="form-control" name="" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 7;");
                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-2 offset-md-1">
                                            <label for="" class="form-label">Corkage Total :</label>
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
                    <label class="form-label">Remarks :</label>
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

    <div class="container-fluid pt-2">

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





<script>
    // Hide button
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    // Fetch Data on Hall Details
    function fetchhall() {
        var id = document.getElementById("HallName").value;
        $.ajax({
            url: "function/halladd/hall.php",
            method: "POST",
            data: {
                x: id
            },
            dataType: "JSON",
            success: function(data) {
                document.getElementById("HallHours").value = data.Hour;
                document.getElementById("HallPrice").value = data.Price;
                document.getElementById("ExtraHours").value = data.Exceeding;
                document.getElementById("HallTotal").value = data.Price;

            }
        })

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
                document.getElementById("Pax50").value = data.Pax50;
                document.getElementById("Pax80").value = data.Pax80;
                document.getElementById("Pax100").value = data.Pax100;

            }
        })
    }

    // Calculate Hall Total 
    $("#Exceeding").keyup(function() {

        var NewHallTotal = 0;
        var x = Number($("#Exceeding").val());
        var y = Number($("#ExtraHours").val());
        var z = Number($("#HallPrice").val());
        var extra = x * y;
        var NewHallTotal = z + extra;
        $("#HallTotal").val(NewHallTotal);
    });

    // Add Hallpackage Cost
    function add1() {

        var button1 = document.getElementById("HallPackage1");
        var a1 = Number($("#a1").val());
        var Total = Number($("#HallTotal").val());
        var z = Number($("#HallPrice").val());
        var output = 0;
        var newTotal = Total;


        if (button1.checked) {
            $("#HallTotal").val(a1);
        } else {
            $("#HallTotal").val(z);
        }


    }

    function add2() {

        var button1 = document.getElementById("HallPackage2");
        var a1 = Number($("#a2").val());
        var Total = Number($("#HallTotal").val());
        var z = Number($("#HallPrice").val());
        var output = 0;
        var newTotal = Total;


        if (button1.checked) {
            $("#HallTotal").val(a1);
        } else {
            $("#HallTotal").val(z);
        }


    }

    function add3() {

        var button1 = document.getElementById("HallPackage3");
        var a1 = Number($("#a3").val());
        var Total = Number($("#HallTotal").val());
        var z = Number($("#HallPrice").val());
        var output = 0;
        var newTotal = Total;


        if (button1.checked) {
            $("#HallTotal").val(a1);
        } else {
            $("#HallTotal").val(z);
        }


    }

    function add4() {

        var button1 = document.getElementById("HallPackage4");
        var a1 = Number($("#a4").val());
        var Total = Number($("#HallTotal").val());
        var z = Number($("#HallPrice").val());
        var output = 0;
        var newTotal = Total;


        if (button1.checked) {
            $("#HallTotal").val(a1);
        } else {
            $("#HallTotal").val(z);
        }


    }


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

    function foodpackage() {
        var ft = 0;
        var fp = Number($("#FoodPax").val());
        var pp = Number($("#PricePax").val());
        var ft = fp * pp;
        $("#FoodTotal").val(ft);

    }

    function additional() {
        var totalamount = 0;
        $('.additional-input').each(function(index, obj) {
            if (this.value != "") {
                var id = this.getAttribute("name");
                var compute = parseFloat(this.value) * parseFloat(document.getElementById(id).value);
                totalamount += parseFloat(compute);
            }
        });

        $("#AdditionalTotal").val(totalamount);
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
    }
</script>








<?php include 'themes/footer.php'; ?>