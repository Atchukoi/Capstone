<?php
session_start();
include 'config.php';
$Id = $_GET['Id'];
$GuestId = $_SESSION['GuestId'];



$aresult = mysqli_query($conn, "SELECT * FROM roomreservation WHERE Id = $Id");
$arow = mysqli_fetch_assoc($aresult);

if (isset($_POST['submit'])) {
    $mode = $_POST['mode'];
    $transactioncode = $_POST['transactioncode'];

    $bresult = mysqli_query($conn, "UPDATE `roomreservation` SET `PaymentType`='$mode',`PaymentLink`='$transactioncode' WHERE Id = $Id");
    header("Location: bookinglist.php?Id=$GuestId");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body style="background-color: rgba(237, 195, 238, 0.8);">

    <div class="container bg-light py-3 mt-5 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">



        <div class="row text-center">
            <div class="container">
                <div class="row">
                    <i class="fa-solid fa-circle-info"> Payment Instructions</i>
                    <p>Select a Mode of Payment </p>
                    <ul>
                        <li>1. Select your chosen type of QR Code in the dropdown list.</li>
                        <li>2. Continue Payment, Open your app and scan your chosen QR Code</li>
                        <li>3. When your done paying, copy your Transaction Code / ID </li>
                        <li>4. Paste it in the box below then submit.</li>
                    </ul>
                    <p>Reservation Status will be updated momentarily once the form is submited. You will be notified in your Email address once the reservation has been Accepted. </p>
                </div>
                <form method="POST">
                <div class="row">
                    
                        <div class="col-md-2">
                            <label for="" class="form-label">Room Reservation Code :</label>
                            <input type="number" min="0" maxlength="" class="form-control" value="<?php echo $arow['Code'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        <div class="col-md-2">
                            <label for="" class="form-label">Total :</label>
                            <input type="number" min="0" maxlength="" class="form-control" value="<?php echo $arow['Total'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Mode of Payment :</label>
                            <select class="form-select" name="mode" aria-label="Default select example">
                                <option selected>Select Type of Online Payment</option>
                                <option value="Gcash">Gcash</option>
                                <option value="Paymaya">Paymaya</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Transaction Code / Id :</label>
                            <input type="text" min="0" name="transactioncode" maxlength="" placeholder="<?php echo $arow['PaymentLink']?>" class="form-control">
                        </div>
                        <div class="col-md-2 mt-4">
                            <button type="submit" name="submit" class="btn btn-success" style="width:100% ;">Submit</button>
                        </div>
                        
                </div>
                </form>
                <div class="row">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col-md-6 ">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="images/Gcash.png" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Gcash QR COde</h5>
                                            <p class="card-text">La Perfecta Convention Center</p>
                                            <p class="card-text">0912-2992-291</p>
                                            <a href="www.gcash.com" class="card-text"><small>www.gcash.com</small></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="images/PayMaya.png" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">PayMaya QR Code </h5>
                                            <p class="card-text">La Perfecta Convention Center</p>
                                            <p class="card-text">0966-3220-281</p>
                                            <a href="www.maya.ph" class="card-text">www.maya.ph</a>
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


</body>
<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>