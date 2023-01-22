<?php
include 'themes/navbar.php';
include 'config.php';

if (isset($_POST['submit'])) {

    $roomcheckintime = strtotime($_POST['roomcheckin']);
    $roomcheckin = date('Y-m-d', $roomcheckintime);

    $roomcheckouttime = strtotime($_POST['roomcheckout']);
    $roomcheckout = date('Y-m-d', $roomcheckouttime);
    
    $roomtype = $_POST['roomtype'];

    $aresult = mysqli_query($conn, "SELECT COUNT(r.RoomCategoryId) AS Available FROM room r WHERE r.RoomCategoryId = $roomtype");
    $arow = mysqli_fetch_assoc($aresult);

    $Available = $arow['Available'];

    $bresult = mysqli_query($conn, "SELECT SUM(rr.Arrival) AS Reserved
    FROM roomreservation rr
    WHERE rr.Arrival = '$roomcheckin'");
    $brow = mysqli_fetch_assoc($bresult);
    $Reserved = $brow['Reserved'];
    

    if ($Reserved >= $Available) {
        echo "<script>alert('Room Not Available')</script>";
    } else {
        header("Location: bookroom.php?Id=$roomtype&i=$roomcheckin&o=$roomcheckout");
    }
}

?>

<main>



    <section class="booking" style="margin-top: 100px">
        <div class="container">
            <form method="post" class="book-form">

                <div class="input-group">
                    <label for="check-in" class="input-label">check-in</label>
                    <input type="date" class="input" id="check-in" name="roomcheckin">
                </div>
                <div class="input-group">
                    <label for="check-out" class="input-label">check-out</label>
                    <input type="date" class="input" id="check-out" name="roomcheckout">
                </div>

                <?php
                $sql =
                    "SELECT  rr.Title, rrpt.Rate, rr.RoomCategoryId AS Id
                    FROM roomrate rr
                    LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
                    WHERE rr.RoomTypeId = 1;";
                $result = mysqli_query($conn, $sql);


                ?>
                <div class="input-group">
                    <label for="children" class="input-label">Room Type</label>
                    <select class="options" id="children" name="roomtype">
                        <option selected value="">Select Room Type </option>

                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $roomid = $row['Id'];
                            $roomtype = $row['Title'];
                            $roomprice = $row['Rate'];

                            echo ' <option value= "' . $roomid . '">' . $roomtype . ' </option>   ';
                        }

                        ?>

                    </select>
                </div>
                <button name="submit" class="btn form-btn btn-purple">Check Availability
                    <span class="dots"><i class="fas fa-ellipsis-h"></i></span>
                    </span>
                </button>
            </form>
        </div>
    </section>




    <section class="rooms">
        <div class="container">
            <h5 class="section-head">
                <span class="heading">Luxurious</span>
                <span class="sub-heading">Affordable Rooms</span>
            </h5>

            <div id="displayrooms"></div>
        </div>
    </section>





</main>


<?php include 'themes/footer.php'; ?>