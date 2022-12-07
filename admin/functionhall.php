<?php
include 'config.php';
$id = $_GET['Id'];
error_reporting(0);

if (isset($_POST['submit'])) {

    $Exceeding = $_POST['Exceeding'];
    $HallTotal = $_POST['HallTotal'];

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

    $Lechon = $_POST['Lechon'];
    $Wine = $_POST['Wine'];
    $OtherFood = $_POST['OtherFood'];
    $CorkageTotal = $_POST['CorkageTotal'];
   $GrandTotalDues = $_POST['TotalDues'];
    $GrandTotal = $_POST['GrandTotal'];

    $sql = "UPDATE `tblfunctionhall` SET 
   
    `ExtraHours`='$Exceeding',
    `HallTotal`='$HallTotal',
    
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

    `Lechon`='$Lechon',
    `Wine`='$Wine',
    `OtherFood`='$OtherFood',
    `CorkageTotal`='$CorkageTotal',
    `GrandTotalDues` = '$GrandTotalDues',
    `GrandTotal`='$GrandTotal'
     WHERE Id = $id";
     $result = mysqli_query($conn,$sql);

     if ($result) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

Record has been updated Successfully!

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
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
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!--JS Query CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <?php
    $aresult = mysqli_query($conn, "SELECT *, tblhall.Name, CONCAT(tblguest.FirstName,' ',tblguest.LastName) AS GuestName, tblhallpackage.Name AS HallPackageName, tblfoodpackage.Name AS FoodName, tblfoodpackage.Description AS FoodDesc
    FROM `tblfunctionhall`
    LEFT JOIN tblguest ON tblfunctionhall.GuestId = tblguest.Id
    LEFT JOIN tblhall ON tblfunctionhall.HallId = tblhall.Id
    LEFT JOIN tblhallpackage ON tblfunctionhall.HalllPackageId = tblhallpackage.Id
    LEFT JOIN tblfoodpackage ON tblfunctionhall.FoodPackageId = tblfoodpackage.Id
    
    WHERE tblfunctionhall.Id = $id");
    $arow = mysqli_fetch_assoc($aresult);
    ?>
    <div class="container-fluid">
        <div class="card  my-2" style="height: 98vh;">
            <div class="card-header text-center  bg-primary text-white fs-4">
                <div class="row">
                    <div class="col"></div>
                    <div class="col align-self-start">
                        <?php echo $arow['Name'] ?>
                    </div>
                    
                    <div class="col align-self-end " style="text-align-last: right;">
                        <a href="halldashboard.php" class="btn btn-danger">X</a>
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

                                            <div class="col-md-3">
                                                <label for="" class="form-label">Guest Name : </label>
                                                <input type="text" class="form-control" value="<?php echo $arow['GuestName'] ?>" disabled>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="" class="form-label">Arrival : </label>
                                                <input type="datetime-local" class="form-control" value="<?php echo $arow['Arrival'] ?>" disabled>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="" class="form-label">Hall Package: </label>
                                                <input type="text" class="form-control" value="<?php echo $arow['HallPackageName'] ?>" disabled>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="" class="form-label">Food Package: </label>
                                                <input type="text" class="form-control" value="<?php echo $arow['FoodName'] . ' ' . $arow['FoodDesc'] ?>" disabled>
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
                                <div class="container-md-6">
                                <form method="POST">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="SoundSystem" <?php echo ($arow['SoundSytem'] == '1') ? "checked" : ""; ?> onchange="computedata()">
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
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="EveningEvent" <?php echo ($arow['FullLights'] == '1') ? "checked" : ""; ?> onchange="computedata()">
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
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="Projector" <?php echo ($arow['Projector'] == '1') ? "checked" : ""; ?> onchange="computedata()">
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
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="StageBasic" <?php echo ($arow['StageBasic'] == '1') ? "checked" : ""; ?> onchange="computedata()">
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
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="StageTheme" <?php echo ($arow['StageTheme'] == '1') ? "checked" : ""; ?> onchange="computedata()">
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
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueBasic" <?php echo ($arow['VenueBasic'] == '1') ? "checked" : ""; ?> onchange="computedata()">
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
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueDecoration" <?php echo ($arow['VenueDecoration'] == '1') ? "checked" : ""; ?> onchange="computedata()">
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
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueFull" <?php echo ($arow['VenueFull'] == '1') ? "checked" : ""; ?> onchange="computedata()">
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
                                                <input type="text" name="MovingLights" class="form-control rentals-input" value="<?php echo $arow['MovingLights'] ?>" onkeyup="computedata()">
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
                                                <input type="text" name="FullyRoundTable" class="form-control rentals-input" value="<?php echo $arow['FurnishedRoundTable'] ?>" onkeyup="computedata()">
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
                                                <input type="text" name="RoundTable" class="form-control rentals-input" value="<?php echo $arow['RoundTable'] ?>" onkeyup="computedata()">
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
                                                    <input type="text" name="RectangularTable" class="form-control rentals-input" value="<?php echo $arow['RectangularTable'] ?>" onkeyup="computedata()">
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
                                                    <input type="text" name="TiffanyChair" class="form-control rentals-input" value="<?php echo $arow['TiffanyChair'] ?>" onkeyup="computedata()">
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
                                                    <input type="number" class="form-control" name="RentTotal" value="<?php echo $arow['RentTotal'] ?>" id="RentTotal" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
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
                                        Corkage Fee
                                    </div>
                                    <div class="card-body " style="background-color:#f2f2f2;">
                                        <div class="row">

                                            <div class="col-md-3">
                                                <label for="" class="form-label">Lechon :</label>
                                                <div class="input-group">
                                                    <input type="number" name="Lechon" class="form-control corkage-input" value="<?php echo $arow['Lechon'] ?>" onkeyup="corckage()">
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
                                                    <input type="number" name="Wine" class="form-control corkage-input" value="<?php echo $arow['Wine'] ?>" onkeyup="corckage()">
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
                                                    <input type="number" name="OtherFood" class="form-control corkage-input" value="<?php echo $arow['OtherFood'] ?>" onkeyup="corckage()">
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
                                                    <input type="text" class="form-control" name="CorkageTotal" id="CorkageTotal" value="<?php echo $arow['CorkageTotal'] ?>" style="background-color: rgb(235,235,228)" readonly>
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>




                <input type="hidden" class="form-control fs-5" name="HallTotal" id="HallTotal" value="<?php echo $arow['HallTotal'] ?>">
            <input type="hidden" class="form-control fs-5" id="FoodTotal" value="<?php echo $arow['FoodTotal'] ?>">
            <input type="hidden" class="form-control fs-5" id="AdditionalTotal" value="<?php echo $arow['AddTotal'] ?>">
            <input type="hidden" class="form-control" id="HallPrice" value="<?php $bresult = mysqli_query($conn, "SELECT tblhall.Exceeding 
FROM tblhall
LEFT JOIN tblfunctionhall ON tblfunctionhall.HallId = tblhall.Id
WHERE tblfunctionhall.HallId = $id;
");
                                                                            $brow = mysqli_fetch_assoc($bresult);
                                                                            echo $brow['Exceeding'] ?>">


<input type="hidden" class="form-control" name="TotalDues" id="TotalDues">










            </div>
            <div class="card-footer text-center bg-info ">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-md-2">
                            <div class="input-group">
                                <div class="input-group-text fs-5">Deposit</div>
                                <input type="number" class="form-control fs-5" id="Deposit" value="<?php echo $arow['Deposit'] ?>" style="background-color: rgb(235,235,228)" readonly>
                            </div>

                        </div>

                        <div class="col-md-2">
                            <div class="input-group">
                                <div class="input-group-text fs-5">Extra Hours</div>
                                <input type="number" name="Exceeding" id="Exceeding" class="form-control fs-5">
                            </div>
                        </div>
                        <div class="col-md-3 offset-md-1">
                            <div class="input-group ">
                                <div class="input-group-text">Grand Total</div>
                                <input type="number" class="form-control fs-5" name="GrandTotal" id="GrandTotal" value="<?php echo $arow['GrandTotal'] ?>">
                                <button type="button" class="btn btn-warning" onclick="grandtotal()"><i class="fa-solid fa-arrows-rotate"></i></button>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-success fs-5" type="submit" name="submit" style="width: 100%;">Update</button>
                        </div>
                        </form>

                        <div class="col-md-2">
                            <a href="hallpayment.php?Id=<?php echo $id ?>&GuestId=<?php echo $arow['GuestId'] ?>" class="btn btn-warning fs-5" style="width: 100%;">Check-out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

</body>
<script>
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