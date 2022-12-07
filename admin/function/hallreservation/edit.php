<?php
include 'config.php';
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $Name = $_POST['GuestFirstName'] . $_POST['GuestLastname'];
    $Arrival = $_POST['Arrival'];
    $Event = $_POST['Event'];
    $Status = $_POST['Status'];

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

    $sql = "UPDATE `tblhallreservation` SET 
   
    `Status`='$Status',
  
    `Arrival`='$Arrival',
    `Event`='$Event',

    `HallId`='$HallName',
    `HallTotal`='$HallTotal',
    `HalllPackageId`='$HallPackage',
    `SoundSytem`='$SoundSystem',
    `FullLights`='$EveningEvent',
    `Projector`='$Projector',
    `VenueBasic`='$VenueBasic',
    `VenueDecoration`='$VenueDecoration',
    `VenueFull`='$VenueFull',
    `StageBasic`='$StageBasic',
    `StageTheme`='$StageTheme',
    `MovingLights`='$MovingLights',
    `FurnishedRoundTable`='$FullyRoundTable',
    `RoundTable`='$RoundTable',
    `RectangularTable`='$RectangularTable',
    `TiffanyChair`='$TiffanyChair',
    `RentTotal`='$RentTotal',
    `FoodPackageId`='$FoodName',
    `NumberPax`='$FoodPax',
    `PricePax`='$PricePax',
    `FoodTotal`='$FoodTotal',
    `AddSeafood`='$AddSeafood',
    `AddPork`='$AddPork',
    `AddChicken`='$AddChicken',
    `AddVegetables`='$AddVegetables',
    `AddTotal`='$AdditionalTotal',
    `Lechon`='$Lechon',
    `Wine`='$Wine',
    `OtherFood`='$OtherFood',
    `CorkageTotal`='$CorkageTotal',
    `Remarks`='$Remarks',
    `Deposit`='$Deposit',
    `GrandTotal`='$GrandTotal'
     WHERE Id= $id ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../hallreservationlist.php?msg=$Name reservation has been Updated Succesfully");
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
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
    <!--Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--JS Query CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body style="background-color: rgba(237, 195, 238, 0.8);">

    <!-- Edit Reservation Modal -->

    <div class="container bg-light py-3 mt-5 mb-5 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">


        <div class="row text-center my-5">
            <h1>Edit Hall Reservation </h1>
        </div>
        <div class="card mb-3">
            <?php
            $guestid = $_GET['guestid'];
            $guestsql = "SELECT * FROM tblguest WHERE Id = $guestid";
            $guestresult = mysqli_query($conn, $guestsql);
            $guestrow = mysqli_fetch_assoc($guestresult);
            ?>

            <?php
            $hsql = "SELECT tblhall.Id AS HallId, tblhall.Name, tblhallreservation.Id 
                                FROM tblhall
                                JOIN tblhallreservation ON tblhallreservation.HallId = tblhall.Id
                                WHERE tblhallreservation.Id = $id";
            $hresult = mysqli_query($conn, $hsql);
            $hrow = mysqli_fetch_assoc($hresult);
            ?>
            <div class="card-header bg-success text-white">
                Guest Details
            </div>
            <form method="POST">
                <div class="card-body" style="background-color:#f2f2f2;">
                    <div class="row">
                        <div class="col-lg-3 mb-2">
                            <label for="Guestname" class="form-label">First Name :</label>
                            <input type="text" name="GuestFirstName" class="form-control" value="<?php echo $guestrow['FirstName'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label for="GuestLastName" class="form-label">Last Name : </label>
                            <input type="text" name="GuestLastName" class="form-control" value="<?php echo $guestrow['LastName'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label for="GuestPhone" class="form-label">Phone :</label>
                            <input type="number" name="GuestPhone" class="form-control" value="<?php echo $guestrow['Phone'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label for="GuestAddress" class="form-label">Address :</label>
                            <input type="text" name="GuestAddress" class="form-control" value="<?php echo $guestrow['Address'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                    </div>
                </div>
        </div>

        <?php
        $hrsql = "SELECT * FROM tblhallreservation WHERE Id = $id";
        $hrresult = mysqli_query($conn, $hrsql);
        $hrrow = mysqli_fetch_assoc($hrresult);

        ?>
        <div class="card border-3 mb-3">
            <div class="card-header bg-success text-white">
                Reservation Details
            </div>
            <div class="card-body" style="background-color:#f2f2f2;">
                <div class="row">

                    <div class="col-lg-3 mb-2">
                        <label for="Arrival" class="form-label">Reservation Date and Time :</label>
                        <input type="datetime-local" name="Arrival" id="Arrival" class="form-control" value="<?php echo $hrrow['Arrival'] ?>">
                    </div>

                    <div class="col-lg-3 mb-2">
                        <label for="Arrival" class="form-label">Event :</label>
                        <input type="text" name="Event" id="Event" class="form-control" value="<?php echo $hrrow['Event'] ?>">
                    </div>



                    <!-- <div class="col-md-3 mb-2">
                        <label for="Exceeding" class="form-label">Extra Hours :</label>
                        <input type="text" name="Exceeding" id="Exceeding" class="form-control" value="<?php echo $hrrow['ExtraHours'] ?>">
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
                                            <select class="form-select form-select-md mb-2" name="HallName" id="HallName" aria-label=".form-select-lg example" onchange="Efetchhall()">
                                                <option selected value=" <?php echo $hrow['HallId'] ?>"> <?php echo $hrow['Name']  ?> </option>
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
                                                <input type="text" class="form-control" name="HallHours" id="HallHours" style="background-color: rgb(235,235,228)" readonly>
                                                <div class="input-group-text">hour</div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label for="" class="form-label">Price :</label>
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="text" class="form-control" name="HallPrice" id="HallPrice" style="background-color: rgb(235,235,228)" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <label for="" class="form-label">Per Extra Hour :</label>
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="text" class="form-control" name="ExtraHours" id="ExtraHours" style="background-color: rgb(235,235,228)" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-2 ">
                                            <label for="" class="form-label">Hall Payment Total :</label>
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="number" class="form-control" name="HallTotal" id="HallTotal" value="<?php echo $hrrow['HallTotal'] ?>" style="background-color: rgb(235,235,228)">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Hall Package -->
                    <div class="collapse mt-3" id="hallpackage">
                        <div class="card card-body">
                            <div class="row mt-3">
                                <div class="col-lg-3 mb-3">
                                    <div class="card border-3">
                                        <div class="card-header text-white bg-success">
                                            <div class="form-check form-switch">

                                                <input class="form-check-input" name="HallPackage" id="HallPackage1" value="1" type="checkbox" role="switch" <?php echo ($hrrow['HalllPackageId'] == '1') ? "checked" : ""; ?> onchange="add1()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"> 50 Pax Package</label>
                                            </div>
                                            <p>Fully Air Conditioned Function Hall</p>
                                            <div class="col-auto">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="number" id="a1" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Cost FROM tblhallpackage WHERE Id = 1;");
                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                    echo $row['Cost']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
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
                                                <input class="form-check-input" name="HallPackage" id="HallPackage2" value="2" type="checkbox" role="switch" <?php echo ($hrrow['HalllPackageId'] == '2') ? "checked" : ""; ?> onchange="add2()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">80 Pax Package</label>
                                            </div>
                                            <p>Fully Air Conditioned Function Hall</p>
                                            <div class="col-auto">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="a2" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Cost FROM tblhallpackage WHERE Id = 2;");
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                echo $row['Cost']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
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
                                                <input class="form-check-input" name="HallPackage" id="HallPackage3" value="3" type="checkbox" role="switch" <?php echo ($hrrow['HalllPackageId'] == '3') ? "checked" : ""; ?> onchange="add3()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"> 100 Pax Package</label>
                                            </div>
                                            <p>Fully Air Conditioned Ballroom Hall</p>
                                            <div class="col-auto">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="a3" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Cost FROM tblhallpackage WHERE Id = 3;");
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                echo $row['Cost']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
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
                                                <input class="form-check-input" name="HallPackage" id="HallPackage4" value="4" type="checkbox" role="switch" <?php echo ($hrrow['HalllPackageId'] == '4') ? "checked" : ""; ?> onchange="add4()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault"> 150 Pax Package</label>
                                            </div>
                                            <p>Fully Air Conditioned Ballroom Hall</p>
                                            <div class="col-auto">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="a4" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Cost FROM tblhallpackage WHERE Id = 4;");
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                echo $row['Cost']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
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
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="SoundSystem" <?php echo ($hrrow['SoundSytem'] == '1') ? "checked" : ""; ?> onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">High Quality Sound System</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="SoundSystem" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 1;");
                                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                                        echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="EveningEvent" <?php echo ($hrrow['FullLights'] == '1') ? "checked" : ""; ?> onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Evening or Full Lights</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="EveningEvent" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 2;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="Projector" <?php echo ($hrrow['Projector'] == '1') ? "checked" : ""; ?> onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Projector</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="Projector" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 4;");
                                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                                        echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="StageBasic" <?php echo ($hrrow['StageBasic'] == '1') ? "checked" : ""; ?> onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Stage Basic Decorations</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="StageBasic" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 5;");
                                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                                        echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="StageTheme" <?php echo ($hrrow['StageTheme'] == '1') ? "checked" : ""; ?> onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Stage Decorations with Motif / Theme</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="StageTheme" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 6;");
                                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                                        echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueBasic" <?php echo ($hrrow['VenueBasic'] == '1') ? "checked" : ""; ?> onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Venue Basic Decorations</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="VenueBasic" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 7;");
                                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                                        echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueDecoration" <?php echo ($hrrow['VenueDecoration'] == '1') ? "checked" : ""; ?> onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Venue Decorations</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="VenueDecoration" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 8;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueFull" <?php echo ($hrrow['VenueFull'] == '1') ? "checked" : ""; ?> onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Venue Full Decorations</label>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="VenueFull" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 9;");
                                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                                        echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-4 mb-4">
                                            <div class="input-group">
                                                <div class="input-group-text" style="width: 250px;">Moving Lights </div>
                                                <input type="text" name="MovingLights" class="form-control rentals-input" value="<?php echo $hrrow['MovingLights'] ?>" onkeyup="computedata()">
                                                <div class="input-group-text "> pc</div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="MovingLights" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 3;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mb-4">
                                            <div class="input-group">
                                                <div class="input-group-text" style="width: 250px;">Fully Furnished Round Table</div>
                                                <input type="text" name="FullyRoundTable" class="form-control rentals-input" value="<?php echo $hrrow['FurnishedRoundTable'] ?>" onkeyup="computedata()">
                                                <div class="input-group-text "> pc</div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="FullyRoundTable" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 10;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-4">
                                            <div class="input-group">
                                                <div class="input-group-text" style="width: 250px;">Round Table With Cloth</div>
                                                <input type="text" name="RoundTable" class="form-control rentals-input" value="<?php echo $hrrow['RoundTable'] ?>" onkeyup="computedata()">
                                                <div class="input-group-text "> pc</div>
                                            </div>
                                            <div class="col-md-4 mt-4">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="RoundTable" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 11;");
                                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                                        echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="input-group">
                                                <div class="input-group-text" style="width: 250px;">Rectangular Table With Cloth</div>
                                                <input type="text" name="RectangularTable" class="form-control rentals-input" value="<?php echo $hrrow['RectangularTable'] ?>" onkeyup="computedata()">
                                                <div class="input-group-text "> pc</div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="RectangularTable" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 12;");
                                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                                echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-4">
                                            <div class="input-group">
                                                <div class="input-group-text" style="width: 300px;">Tiffany Chair (Gold / Silver) with Foam</div>
                                                <input type="text" name="TiffanyChair" class="form-control rentals-input" value="<?php echo $hrrow['TiffanyChair'] ?>" onkeyup="computedata()">
                                                <div class="input-group-text "> pc</div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="TiffanyChair" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tblrentals WHERE Id = 13;");
                                                                                                                                            $row = mysqli_fetch_assoc($result);
                                                                                                                                            echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Rent Total :</label>
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="text" class="form-control" name="RentTotal" id="RentTotal" style="background-color: rgb(235,235,228)" value="<?php echo $hrrow['RentTotal'] ?>">
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

                            <?php
                            $fpsql = "SELECT tblfoodpackage.Id AS FoodId, tblfoodpackage.Name, tblhallreservation.Id 
                            FROM tblfoodpackage
                            JOIN tblhallreservation ON tblhallreservation.FoodPackageId = tblfoodpackage.Id
                            WHERE tblhallreservation.Id = $id";
                            $fpresult = mysqli_query($conn, $fpsql);
                            $fprow = mysqli_fetch_assoc($fpresult);
                            ?>


                            <div class="card-body " style="background-color:#f2f2f2;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Food Bundle :</label>
                                        <select class="form-select form-select-md mb-3" name="FoodName" id="FoodName" aria-label=".form-select-lg example" onchange="fetchfood()">
                                            <option selected value=" <?php echo $fprow['FoodId'] ?>"> <?php echo $fprow['Name']  ?> </option>
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
                                        <input type="number" name="FoodPax" class="form-control" id="FoodPax" value="<?php echo $hrrow['NumberPax'] ?>" onkeyup="foodpackage()">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="form-label">Price :</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="PricePax" id="PricePax" value="<?php echo $hrrow['PricePax'] ?> " onkeyup="foodpackage()">
                                            <div class="input-group-text ">/ Pax</div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <label for="" class="form-label">Food Total :</label>
                                        <div class="input-group">
                                            <div class="input-group-text">₱</div>
                                            <input type="text" class="form-control" name="FoodTotal" id="FoodTotal" style="background-color: rgb(235,235,228)" value="<?php echo $hrrow['FoodTotal'] ?>">
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
                                            <input type="number" name="AddSeafood" class="form-control additional-input" value="<?php echo $hrrow['AddSeafood'] ?>" onkeyup="additional()">
                                            <div class="input-group-text ">pc</div>
                                        </div>
                                        <div class="col-md-8 mt-2">
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="text" id="AddSeafood" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 1;");
                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                    echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2">
                                        <label for="" class="form-label">Pork 100 Pax :</label>
                                        <div class="input-group">
                                            <input type="number" name="AddPork" class="form-control additional-input" value="<?php echo $hrrow['AddPork'] ?>" onkeyup="additional()">
                                            <div class="input-group-text ">pc</div>
                                        </div>
                                        <div class="col-md-8 mt-2">
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="text" id="AddPork" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 2;");
                                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                                echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2">
                                        <label for="" class="form-label">Chicken 100 Pax :</label>
                                        <div class="input-group">
                                            <input type="number" name="AddChicken" class="form-control additional-input" value="<?php echo $hrrow['AddChicken'] ?>" onkeyup="additional()">
                                            <div class="input-group-text ">pc</div>
                                        </div>
                                        <div class="col-md-8 mt-2">
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="text" id="AddChicken" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 3;");
                                                                                                                                    $row = mysqli_fetch_assoc($result);
                                                                                                                                    echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2">
                                        <label for="" class="form-label">Vegetables 100 Pax :</label>
                                        <div class="input-group">
                                            <input type="number" name="AddVegetables" class="form-control additional-input" value="<?php echo $hrrow['AddVegetables'] ?>" onkeyup="additional()">
                                            <div class="input-group-text ">pc</div>
                                        </div>
                                        <div class="col-md-8 mt-2">
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="text" id="AddVegetables" placeholder="Price" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 4;");
                                                                                                                                        $row = mysqli_fetch_assoc($result);
                                                                                                                                        echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-md-3 offset-md-1">
                                        <label for="" class="form-label">Additional Total :</label>
                                        <div class="input-group">
                                            <div class="input-group-text">₱</div>
                                            <input type="text" class="form-control" name="AdditionalTotal" id="AdditionalTotal" style="background-color: rgb(235,235,228)" value="<?php echo $hrrow['AddTotal'] ?>">
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
                                            <input type="number" name="Lechon" class="form-control corkage-input" value="<?php echo $hrrow['Lechon'] ?>" onchange="corckage()">
                                            <div class="input-group-text ">pc</div>
                                        </div>

                                        <div class="col-md-8 mt-2">
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
                                            <input type="number" name="Wine" class="form-control corkage-input" value="<?php echo $hrrow['Wine'] ?>" onchange="corckage()">
                                            <div class="input-group-text ">pc</div>
                                        </div>
                                        <div class="col-md-8 mt-2">
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
                                            <input type="number" name="OtherFood" class="form-control corkage-input" value="<?php echo $hrrow['OtherFood'] ?>" onchange="corckage()">
                                            <div class="input-group-text ">pc</div>
                                        </div>
                                        <div class="col-md-8 mt-2">
                                            <div class="input-group">
                                                <div class="input-group-text">₱</div>
                                                <input type="text" id="OtherFood" class="form-control" value="<?php $result = mysqli_query($conn, "SELECT Price FROM tbladditional WHERE Id = 7;");
                                                                                                                $row = mysqli_fetch_assoc($result);
                                                                                                                echo $row['Price']; ?>" style="background-color: rgb(235,235,228)" readonly>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-2 offset-md-1">
                                        <label for="" class="form-label">Corkage Total :</label>
                                        <div class="input-group">
                                            <div class="input-group-text">₱</div>
                                            <input type="text" class="form-control" name="CorkageTotal" id="CorkageTotal" style="background-color: rgb(235,235,228)" value="<?php echo $hrrow['CorkageTotal'] ?>">
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <label class="form-label">Remarks :</label>
                <input type="text" name="Remarks" class="form-control" value="<?php echo $hrrow['Remarks'] ?>">
            </div>
        </div>

        <div class="row justify-content-end mb-5">
            <div class="col-lg-4">
                <label for="update_status" class="form-label text-start">Status :</label>
                <select type="text" class="form-select" name="Status">
                    <?php
                    echo "<option value=" . $hrrow['Status'] . "> " . $hrrow['Status'] . "</option>";
                    ?>
                    <option value="Accepted">Accepted</option>
                    <option value="Pending">Pending</option>

                </select>
            </div>
            <div class="col-2">
                <label class="form-label">Deposit :</label>
                <input type="number" name="Deposit" class="form-control" required value="<?php echo $hrrow['Deposit'] ?>">
            </div>
            <div class="col-2">

                <label for="" class="form-label">Grand Total : <span><button type="button" onclick="grandtotal()">Calculate</button></span></label>
                <div class="input-group">
                    <div class="input-group-text">₱</div>
                    <input type="text" class="form-control" name="GrandTotal" id="GrandTotal" style="background-color: rgb(235,235,228)" value="<?php echo $hrrow['GrandTotal'] ?>" readonly>
                </div>
            </div>
            <div class="col-lg-2 mt-4">
                <button type="submit" class="btn btn-success me-3" style="margin:auto; width:100%;" name="submit">Update</button>
            </div>

            <div class="col-lg-2 mt-4">
                <a type="button" class="btn btn-danger" style="margin:auto; width:100%;" href="../../hallreservationlist.php">Cancel</a>
            </div>
            <input type="hidden" value="<?php echo $id ?>">
        </div>
    </div>
    </form>








</body>


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
    function Efetchhall() {
        var id = document.getElementById("HallName").value;
        $.ajax({
            url: "../halladd/hall.php",
            method: "POST",
            data: {
                x: id
            },
            dataType: "JSON",
            success: function(data) {
                document.getElementById("HallHours").value = data.Hour;
                document.getElementById("HallPrice").value = data.Price;
                document.getElementById("ExtraHours").value = data.Exceeding;

            }
        })

    }


    // Fetch Food Data
    function fetchfood() {
        var id = document.getElementById("FoodName").value;
        $.ajax({
            url: "../halladd/food.php",
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
        var output = 0;
        var newTotal = Total;

        $("#HallTotal").val(newTotal);
        if (button1.checked) {
            var output = Total + a1;
            var newTotal = output;
        } else {
            var output = Total - a1;
            var newTotal = output;;
        }

        $("#HallTotal").val(newTotal);
    }

    function add2() {

        var button1 = document.getElementById("HallPackage2");
        var a1 = Number($("#a2").val());
        var Total = Number($("#HallTotal").val());
        var output = 0;
        var newTotal = Total;

        $("#HallTotal").val(newTotal);
        if (button1.checked) {
            var output = Total + a1;
            var newTotal = output;
        } else {
            var output = Total - a1;
            var newTotal = output;;
        }

        $("#HallTotal").val(newTotal);
    }

    function add3() {

        var button1 = document.getElementById("HallPackage3");
        var a1 = Number($("#a3").val());
        var Total = Number($("#HallTotal").val());
        var output = 0;
        var newTotal = Total;

        $("#HallTotal").val(newTotal);
        if (button1.checked) {
            var output = Total + a1;
            var newTotal = output;
        } else {
            var output = Total - a1;
            var newTotal = output;;
        }

        $("#HallTotal").val(newTotal);
    }

    function add4() {

        var button1 = document.getElementById("HallPackage4");
        var a1 = Number($("#a4").val());
        var Total = Number($("#HallTotal").val());
        var output = 0;
        var newTotal = Total;

        $("#HallTotal").val(newTotal);
        if (button1.checked) {
            var output = Total + a1;
            var newTotal = output;
        } else {
            var output = Total - a1;
            var newTotal = output;;
        }

        $("#HallTotal").val(newTotal);
    }

    function foodpackage() {
        var ft = 0;
        var fp = Number($("#FoodPax").val());
        var pp = Number($("#PricePax").val());
        var ft = fp * pp;
        $("#FoodTotal").val(ft);

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

<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>