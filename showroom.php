<?php
include 'config.php';


if (isset($_POST['displaySend'])) {
    $card = '<div class="grid room-grid">';
    $sql = "SELECT rc.Id, rc.Image, rc.Title, rc.PersonCount, rc.Description, rr.Description AS Inclusion, rrpt.Rate
    FROM roomcategory rc
    LEFT JOIN roomrate rr ON rr.Id = rc.Id
    LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
    WHERE rc.RoomTypeId = 1";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {

      

        $card .= '<div class="grid-item featured-room">
        <div class="image-wrap">
                        <img class="room-image" src="images/'.$row['Image'].'" alt="">
                        <h5 class="room-name">'.$row['Title'].'</h5>
                    </div>
                    <div class="room-info-wrap">
                        <span class="room-price">
                            P '.$row['Rate'].' <span class="pernight">Per Night</span>
                            '.$row['PersonCount'].'
                            <i class="fa-sharp fa-solid fa-person" style="color:red;"></i></span>
                        <p class="paragraph">'.$row['Description'].$row['Inclusion'].'</p>
                        <p class="paragraph">Breakfast Meal Included</p>
                        <a href="rooms.php" class="btn rooms-btn">Book now &rrarr;</a>

                    </div>
                    </div>
             ';
    }
    $card .= '</div>';
    echo $card;
}
?>