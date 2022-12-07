<?php
include 'config.php';
$id = $_GET['Id'];




if (isset($_POST['submit'])) {
    $name = $_POST['update_name'];
    $update_room = $_POST['update_room'];
    $update_arrival = $_POST['update_arrival'];
    $update_departure = $_POST['update_departure'];
    $update_deposit = $_POST['update_deposit'];
    $update_total = $_POST['update_total'];
    $update_status = $_POST['update_status'];
    $update_remarks = $_POST['update_remarks'];


    $sql = "UPDATE `tblreservation` SET 
    
  
    
    `RoomId`='$update_room',
    `Arrival`='$update_arrival',
    `Departure`='$update_departure',
    `Total`='$update_total',
    `Deposit`='$update_deposit',
    `Status`='$update_status',
    `Remarks`='$update_remarks'
    
    WHERE Id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../reservationlist.php?msg=$name reservation has been Updated Succesfully");
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

    <div class="container bg-light py-3 mt-5 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">

        <div class="row text-center my-5">
            <h1>Edit Room Reservation</h1>
        </div>



        <div class="modal-body">

            <?php
            $sql =
                "SELECT tblreservation.Code, CONCAT(tblguest.FirstName, tblguest.LastName) AS Name, tblguest.Phone,tblroom.Number,tblroom.Id as RoomId, tblreservation.Arrival, tblreservation.Departure, tblreservation.TransactionDate, tblreservation.Deposit, tblreservation.Total, tblreservation.Remarks, tblreservation.Status, tblroomtype.Type, tblroomtype.Rate
                FROM tblreservation
                JOIN tblguest ON tblreservation.GuestId = tblguest.Id
                JOIN tblroom ON tblreservation.RoomId = tblroom.Id
                JOIN tblroomtype ON tblroom.RoomTypeId = tblroomtype.Id
                WHERE tblreservation.Id = $id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $name = $row['Name'];
            ?>
            <div class="container">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <div class="col-lg-4 ">
                            <label for="update_confirmation" class="form-label">Confirmation Code :</label>
                            <input type="text" name="update_confirmation" class="form-control" value="<?php echo $row['Code'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label for="update_name" class="form-label">Guest Name :</label>
                            <input type="text" class="form-control" name="update_name" value="<?php echo $row['Name'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label for="update_contact" class="form-label">Contact :</label>
                            <input type="text" class="form-control" name="update_contact" value="<?php echo $row['Phone'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                    </div>
                    <?php
                    $roomsql =
                        "SELECT tblroom.Id AS roomId, tblroom.Number, tblroomtype.Type, tblroomtype.Rate
            FROM tblroom
            JOIN tblroomtype ON tblroom.RoomTypeId = tblroomtype.Id";
                    $result = mysqli_query($conn, $roomsql);

                    ?>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <input type="hidden" name="Price" id="Price" class="form-control">
                            <!-- <label for="update_room" class="form-label">Room Number : <?php echo $number ?></label> -->
                            <label for="update_room" class="form-label">Select Room :</label>
                            <select class="form-select form-select-md  mb-3" name="update_room" id="update_room" aria-label=".form-select-lg example" required onchange="fetchroom()" >
                                <option selected value=" <?php echo $row['RoomId'] ?>"> <?php echo $row['Number'] . " " . $row['Type'] . " @" .  $row['Rate'] ?> </option>
                                <?php
                                while ($room = mysqli_fetch_array($result)) {
                                    $roomid = $room['roomId'];
                                    $roomnumber = $room['Number'];
                                    $roomtype = $room['Type'];
                                    $roomprice = $room['Rate'];

                                    echo ' <option value= "' . $roomid . '">' . $roomnumber . ' ' . $roomtype . ' @ ' . $roomprice . '</option> ';
                                }
                                ?>

                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="update_arrival" class="form-label">Arrival :</label>
                            <input type="datetime-local" class="form-control" name="update_arrival" id="Arrival" value="<?php echo $row['Arrival'] ?>">
                        </div>
                        <div class="col-lg-4">
                            <label for="update_departure" class="form-label">Departure :</label>
                            <input type="datetime-local" class="form-control" name="update_departure" id="Departure" value="<?php echo $row['Departure'] ?>" onchange="getDays()">
                            <input type="hidden" name="DateDifference" id="DateDifference" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <label for="update_transaction" class="form-label">Transaction Date :</label>
                            <input type="text" class="form-control" name="update_transaction" value="<?php echo $row['TransactionDate'] ?>" style="background-color: rgb(235,235,228)" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label for="update_deposit" class="form-label">Deposit :</label>
                            <div class="input-group">
                                <div class="input-group-text">₱</div>
                                <input type="number" class="form-control" name="update_deposit" value="<?php echo $row['Deposit'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="update_total" class="form-label">Total :</label>
                            <div class="input-group">
                                <div class="input-group-text">₱</div>
                                <input type="number" class="form-control" style="background-color: rgb(235,235,228)" name="update_total" id="Total" value="<?php echo $row['Total'] ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-">
                        <div class="col-lg-4">
                            <label for="update_remarks" class="form-label text-start" > Remarks :</label>
                            <input type="text" class="form-control" name="update_remarks" value="<?php echo $row['Remarks'] ?>" onclick="getDays()">
                        </div>
                        <div class="col-lg-4">
                            <label for="update_status" class="form-label text-start">Status :</label>
                            <select type="text" class="form-select" name="update_status">
                                <?php
                                echo "<option value=" . $row['Status'] . "> " . $row['Status'] . "</option>";
                                ?>
                                <option value="Accepted">Accepted</option>
                                <option value="Pending">Pending</option>

                            </select>
                        </div>
                        <div class="col-lg-2 mt-4">
                            <button type="submit" class="btn btn-success me-3" style="margin:auto; width:100%;" name="submit" >Update</button>
                        </div>
                        <div class="col-lg-2 mt-4">
                            <a type="button" class="btn btn-danger" style="margin:auto; width:100%;" href="../../reservationlist.php">Cancel</a>
                        </div>

                    </div>
                    <input type="hidden" value="<?php echo $id ?>">
                </form>

            </div>



        </div>
    </div>
</body>
<script>
    function fetchroom() {
        var id = document.getElementById("update_room").value;
        $.ajax({
            url: "../roomadd/room.php",
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
</script>
<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>