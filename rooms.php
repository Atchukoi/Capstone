<?php
include 'themes/navbar.php';
include 'config.php';

// if (isset($_POST['submit'])) {

//     $roomcheckintime = strtotime($_POST['roomcheckin']);
//     $roomcheckin = date('Y-m-d', $roomcheckintime);

//     $roomcheckouttime = strtotime($_POST['roomcheckout']);
//     $roomcheckout = date('Y-m-d', $roomcheckouttime);
    
//     $roomtype = $_POST['roomtype'];

//     $aresult = mysqli_query($conn, "SELECT COUNT(r.RoomCategoryId) AS Available FROM room r WHERE r.RoomCategoryId = $roomtype");
//     $arow = mysqli_fetch_assoc($aresult);

//     $Available = $arow['Available'];

//     $bresult = mysqli_query($conn, "SELECT SUM(rr.Arrival) AS Reserved
//     FROM roomreservation rr
//     WHERE rr.Arrival = '$roomcheckin'");
//     $brow = mysqli_fetch_assoc($bresult);
//     $Reserved = $brow['Reserved'];
    

//     if ($Reserved >= $Available) {
//         echo "<script>alert('Room Not Available')</script>";
//     } else {
//         header("Location: bookroom.php?Id=$roomtype&i=$roomcheckin&o=$roomcheckout");
//     }
// }

$UserId = $_SESSION['GuestId'];

?>

<main>



    <!-- <section class="booking" style="margin-top: 100px">
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
    </section> -->




    <!-- <section class="rooms">
        <div class="container">
            <h5 class="section-head">
                <span class="heading">Luxurious</span>
                <span class="sub-heading">Affordable Rooms</span>
            </h5>

            <div id="displayrooms"></div>
        </div>
    </section> -->

    <section class="rooms">
            <div class="container">
                <h5 class="section-head">
                    <span class="heading">Luxurious</span>
                    <span class="sub-heading">Affordable Rooms</span>
                </h5>
                <div class="grid room-grid">
                    <div class="grid-item featured-room">
                        <div class="image-wrap">
                            <img class="room-image" src="./images/Presidential.png" alt="">
                            <h5 class="room-name">Presidential Villa </h5>
                        </div>
                        <div class="room-info-wrap">
                            <span class="room-price">
                            P 3,500 <span class="pernight">Per Night</span>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i></span>
                            <p class="paragraph">Fully Airconditioned room with a Queen Size Bed</p>
                            <p class="paragraph">Breakfast Meal Included</p>
                            <a href="presidentialcalendar/index.php?Id=<?php echo $UserId ?>" class="btn rooms-btn">Book now &rrarr;</a>
                        </div>
                    </div>

                    <div class="grid-item featured-room">
                        <div class="image-wrap">
                            <img class="room-image" src="./images/SuiteVilla.png" alt="">
                            <h5 class="room-name">Suite Villa</h5>
                        </div>
                        <div class="room-info-wrap">
                            <span class="room-price">P 3,200 <span class="pernight">Per Night</span>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i></span>
                            <p class="paragraph">Fully Airconditioned room with a King Size Bed</p>
                            <p class="paragraph">Breakfast Meal Included</p>
                            <a href="suittecalendar/index.php?Id=<?php echo $UserId ?>" class="btn rooms-btn">Book now &rrarr;</a>
                        </div>
                    </div>

                    <div class="grid-item featured-room">
                        <div class="image-wrap">
                            <img class="room-image" src="./images/DormRoom.png" alt="">
                            <h5 class="room-name">Mini Dorm</h5>
                        </div>
                        <div class="room-info-wrap">
                            <span class="room-price">P 3,000 <span class="pernight">Per Night</span>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i></span>
                            <p class="paragraph">Fully Airconditioned room with 2 Bunk Beds</p>
                            <p class="paragraph">Breakfast Meal Included</p>
                            <a href="dormcalendar/index.php?Id=<?php echo $UserId ?>" class="btn rooms-btn">Book now &rrarr;</a>
                        </div>
                    </div>

                    <div class="grid-item featured-room">
                        <div class="image-wrap">
                            <img class="room-image" src="./images/Standard.png" alt="">
                            <h5 class="room-name">Standard</h5>
                        </div>
                        <div class="room-info-wrap">
                            <span class="room-price">P 2,500 <span class="pernight">Per Night</span>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i>
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i></span>
                            <p class="paragraph">Fully Airconditioned room with 2 Single Beds</p>
                            <p class="paragraph">Breakfast Meal Included</p>
                            <a href="standardcalendar/index.php?Id=<?php echo $UserId ?>" class="btn rooms-btn">Book now &rrarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>





</main>


<?php include 'themes/footer.php'; ?>