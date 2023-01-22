<?php
include 'config.php';
$Id = $_GET['Id'];
error_reporting(1);

$asql = "SELECT CONCAT(u.FirstName,' ', u.LastName) AS GuestName, t.ArrivalDateTime, r.Title AS RoomNumber, t.Deposit ,t.Total, rr.Title AS Package 
FROM  transaction t
LEFT JOIN user u ON u.Id = t.UserId
LEFT JOIN room r ON r.Id = t.RoomId
LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
LEFT JOIN roomrate rr ON rr.Id = rc.Id
LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.Id
WHERE t.Id = $Id";
$aresult= mysqli_query($conn,$asql);
$arow = mysqli_fetch_assoc($aresult);



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
    
    <div class="container-fluid">
        <div class="card  my-2" style="height: 98vh;">
            <div class="card-header text-center  bg-primary text-white fs-4">
                <div class="row">
                    <div class="col"></div>
                    <div class="col align-self-start">
                        <?php echo $arow['RoomNumber'] ?>
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
                                                <input type="datetime-local" class="form-control" value="<?php echo $arow['ArrivalDateTime'] ?>" disabled>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="" class="form-label">Hall Package: </label>
                                                <input type="text" class="form-control" value="<?php echo $arow['Package'] ?>" disabled>
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
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="SoundSystem" onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">High Quality Sound System</label>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="SoundSystem" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="EveningEvent"  onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Evening or Full Lights</label>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="EveningEvent" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="Projector"  onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Projector</label>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="Projector" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="StageBasic"  onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Stage Basic Decorations</label>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="StageBasic" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="StageTheme"  onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Stage Decorations with Motif / Theme</label>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="StageTheme" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueBasic"  onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Venue Basic Decorations</label>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="VenueBasic" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueDecoration"  onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Venue Decorations</label>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="VenueDecoration" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input rentals" type="checkbox" role="switch" value="1" name="VenueFull"  onchange="computedata()">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Venue Full Decorations</label>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" id="VenueFull" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <div class="input-group-text" style="width: 250px;">Moving Lights</div>
                                                <input type="text" name="MovingLights" class="form-control rentals-input" value="" onkeyup="computedata()">
                                                <div class="input-group-text "> pc</div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="number" id="MovingLights" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <div class="input-group-text" style="width: 250px;">Fully Furnished Round Table</div>
                                                <input type="text" name="FullyRoundTable" class="form-control rentals-input" value="" onkeyup="computedata()">
                                                <div class="input-group-text "> pc</div>
                                            </div>

                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="number" id="FullyRoundTable" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="input-group">
                                                <div class="input-group-text" style="width: 250px;">Round Table With Cloth</div>
                                                <input type="text" name="RoundTable" class="form-control rentals-input" value="" onkeyup="computedata()">
                                                <div class="input-group-text "> pc</div>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="number" id="RoundTable" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">



                                            <div class="col-md-4 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text" style="width: 250px;">Rectangular Table With Cloth</div>
                                                    <input type="text" name="RectangularTable" class="form-control rentals-input" value="" onkeyup="computedata()">
                                                    <div class="input-group-text "> pc</div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" id="RectangularTable" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="input-group">
                                                    <div class="input-group-text" style="width: 300px;">Tiffany Chair (Gold / Silver) with Foam</div>
                                                    <input type="text" name="TiffanyChair" class="form-control rentals-input" value="" onkeyup="computedata()">
                                                    <div class="input-group-text "> pc</div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="number" id="TiffanyChair" class="form-control" placeholder="Price" value="" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="col-md-2">
                                                <label for="" class="form-label">Rent Total :</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="number" class="form-control" name="RentTotal" value="" id="RentTotal" style="background-color: rgb(235,235,228)" readonly>
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
                                                    <input type="number" name="Lechon" class="form-control corkage-input" value="" onkeyup="corckage()">
                                                    <div class="input-group-text ">pc</div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="Lechon" class="form-control" value=" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-3">
                                                <label for="" class="form-label">Wine / Brandy :</label>
                                                <div class="input-group">
                                                    <input type="number" name="Wine" class="form-control corkage-input" value="" onkeyup="corckage()">
                                                    <div class="input-group-text ">pc</div>

                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="Wine" class="form-control" value="" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label for="" class="form-label">Food and Others :</label>
                                                <div class="input-group">
                                                    <input type="number" name="OtherFood" class="form-control corkage-input" value="" onkeyup="corckage()">
                                                    <div class="input-group-text ">pc</div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="input-group">
                                                        <div class="input-group-text">₱</div>
                                                        <input type="text" id="OtherFood" class="form-control" name="" value="" style="background-color: rgb(235,235,228)" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-2 offset-md-1">
                                                <label for="" class="form-label">Corkage Total :</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">₱</div>
                                                    <input type="text" class="form-control" name="CorkageTotal" id="CorkageTotal" value="" style="background-color: rgb(235,235,228)" readonly>
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>




                <input type="hidden" class="form-control fs-5" name="HallTotal" id="HallTotal" value="">
            <input type="hidden" class="form-control fs-5" id="FoodTotal" value="">
            <input type="hidden" class="form-control fs-5" id="AdditionalTotal" value="">
            <input type="hidden" class="form-control" id="HallPrice" value="">


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
                                <input type="number" class="form-control fs-5" name="GrandTotal" id="GrandTotal" value="">
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