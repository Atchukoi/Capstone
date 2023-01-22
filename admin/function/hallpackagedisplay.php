<?php
include 'config.php';


if (isset($_POST['displaySend'])) {
    $card = '<div class="row">';
    $sql = "SELECT  rr.Id, rr.Title, rc.Description, rr.Description AS Inclusion, rrpt.Rate, rrpt.ExceedingRatePerHour, rrpt.InitialTime
    FROM roomrate rr
    LEFT JOIN roomcategory rc ON rc.Id = rr.RoomCategoryId
    LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
    WHERE rr.RoomTypeId = 2;";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {

        $Id = $row['Id'];
        $Title = $row['Title'];
        $Description = $row['Description'];
        $Inclusion = $row['Inclusion'];
        $Rate = $row['Rate'];
        $ExceedingRatePerHour = $row['ExceedingRatePerHour'];
        $InitialTime = $row['InitialTime'];
        
        


        $card .= ' <div class="col-lg-4 mb-3">
        <div class="card border-3">
            <div class="card-header text-white bg-success">
                <div class="form-check form-switch">
                    
                    <input class="form-check-input" name="HallPackage" id="HallPackage'.$Id.'" value="'.$Id.'" type="checkbox" role="switch" onchange="addHall('.$Id.')">
                    <label class="form-check-label mb-1" for="flexSwitchCheckDefault"> '.$Title.'</label>
                </div>
                <p>'.$Description.'</p>
                <div class="input-group">
                    <div class="input-group-text">₱</div>
                    <input type="number" id="a'.$Id.'" class="form-control" value="'.$Rate.'" style="background-color: rgb(235,235,228)" readonly>
                </div>
            </div>
            <div class="card-body" style="background-color:#f2f2f2;">
                <p>
                    Inclusuions :
                </p>
                <ul>
                    <li>
                       '.$Inclusion.'
                    
                </ul>
            </div>
        </div>
    </div>
        ';
    }
    $card .= '</div>';
    echo $card;
}
