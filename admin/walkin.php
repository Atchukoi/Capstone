<?php
include 'config.php';
$Id =  $_GET['RId'];

if(isset($_POST['submit'])) {
    $arrival = date('Y-m-d h:i:s');
    $departure = $_POST['date'];
    $guestId = $_POST['LastId'];
    

    $sql= "UPDATE `transaction` SET 
    `ArrivalDateTime`='$arrival',
    `DepartureDateTime`='$departure',
    `UserId`='$guestId'
    WHERE RoomId = $Id";
    $result = mysqli_query($conn,$sql);

    $rsql = "UPDATE `room` SET `RoomStatusId`='1' WHERE Id = $Id";
    $rresult = mysqli_query($conn,$rsql);

    header("Location: dashboard.php?msg=Checked-In Successful!");


}

if (isset($_POST['cancel'])) {
    $GuestId = $_POST['LastId'];
    $sql = "DELETE FROM `user` WHERE Id= $GuestId";
    $result = mysqli_query($conn, $sql);
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

</head>
<?php
$sql = "SELECT r.Title, rc.Title AS RoomType, rrpt.Rate 
FROM room r
LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
LEFT JOIN roomrate rr ON rr.RoomCategoryId = rc.Id
LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
WHERE r.Id = $Id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$Title = $row['Title'];
$RoomType = $row['RoomType'];
$Rate = $row['Rate'];
?>

<body style="background-color: rgba(237, 195, 238, 0.8);">
    <div class="container bg-light py-3 mt-5 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">
        <div class="row text-center my-5">
            <?php echo '<h1><i class="fa-solid fa-bed"></i> Room <i class="fa-solid fa-hashtag"></i> ' . $Title . ' - ' . $RoomType . ' ₱ ' . $Rate . ' / Night</h1>' ?>
        </div>

        <div class="container">

            <?php
            if (isset($_POST['next'])) {

                $FirstName = $_POST['FirstName'];
                $LastName = $_POST['LastName'];
                $Address = $_POST['Address'];
                $Phone = $_POST['Phone'];

                $sql = "INSERT INTO `user`
            (`FirstName`, `LastName`, `Address`, `Contact`)
             VALUES 
            ('$FirstName','$LastName','$Address','$Phone')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $LastId = mysqli_insert_id($conn);
                }
            ?>
                <form method="POST">

                    <div class="card my-5" style="width: 50%; margin:auto">
                        <div class="card-header bg-success text-white">
                            Please, Select a Check out date
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="input-group">
                                            <input type="hidden" name="LastId" class="form-control" value="<?php echo $LastId ?>">
                                            <input type="Date" name="date"class="form-control">
                                            <button class="btn btn-outline-success" name="submit" type="submit">Check-in</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 offset-md-2">
                                        <form method="POST" class="d-flex justify-content-end">
                                            <input type="hidden" name="LastId" class="form-control" value="<?php echo $LastId ?>">

                                            <button type="cancel" name="cancel" class="btn btn-danger " style="width:100% ;">

                                                Cancel</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <div class="row text-end">
                    <div class="col mb-2 mt-2">
                        <a href="dashboard.php" class="btn btn-danger fs-4" style="height:50px">Go Back to Dashboard <i class="fa-solid fa-share"> </i></a>
                    </div>
                </div>

                <div class="card my-5">
                    <div class="card-header bg-success text-white">
                        Guest Details
                    </div>
                    <div class="card-body">
                        <form method="POST" autocomplete="off">
                            <div class="row mt-3 ">
                                <div class="col-md-6 ">
                                    <label class="form-label">First Name :</label>
                                    <input type="text" name="FirstName" class="form-control" placeholder="e.g. Juan" required>
                                </div>
                                <div class="col-md-6 ">
                                    <label class="form-label">Last Name :</label>
                                    <input type="text" name="LastName" class="form-control" placeholder="e.g. Dela Cruz" required>
                                </div>

                            </div>
                            <div class="row mt-3 ">
                                <div class="col-md-6 ">
                                    <label class="form-label">Phone :</label>
                                    <input type="number" name="Phone" class="form-control" placeholder="e.g. 0912-654-9845" required>
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
            <?php  } ?>






        </div>


</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


</html>