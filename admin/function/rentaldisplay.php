<?php
include 'config.php';


if (isset($_POST['displaySend'])) {
    $card = '<div class="row">';
    $sql = "SELECT re.Id, re.Title, re.Cost
    FROM roomextra re
    WHERE re.RoomTypeID = 2 And re.ExtraCategoryId= 2 And NOT re.Description='per pc';";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {

        $Id = $row['Id'];
        $Title = $row['Title'];
        $Cost = $row['Cost'];





        $card .= ' <div class="col-md-4 mb-3">
        <div class="form-check form-switch">
            <input class="form-check-input rentals" type="checkbox" role="switch" value="' . $Id . '" name="Rental" id="Rental' . $Id . '" onchange="computedata(0)">
            <label class="form-check-label" for="flexSwitchCheckDefault">' . $Title . '</label>
        </div>

        <div class="col-md-4 mt-2">
            <div class="input-group">
                <div class="input-group-text">₱ </div>
                <input type="text" data-rental-check="Rental' . $Id . '"  id="check-Rental' . $Id . '" class="form-control" value="' . $Cost . '" style="background-color: rgb(235,235,228)" readonly>
            </div>
        </div>

    </div>';
}
    $card .= '</div>';
    echo $card;
}


if (isset($_POST['displaySend'])) {
    $card = '<div class="row">';
    $sql = "SELECT re.Id, re.Title, re.Cost
    FROM roomextra re
    WHERE re.RoomTypeID = 2 And re.ExtraCategoryId= 2 And re.Description='per pc';";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {

        $Id = $row['Id'];
        $Title = $row['Title'];
        $Cost = $row['Cost'];



        $card .= ' <div class="col-md-4 mb-3">
        <div class="input-group">
            <div class="input-group-text" style="width:auto;">' . $Title . '</div>
            <input type="number" name="R[]" data-rental="rental-'.$Id.'" id="' . $Id . '" class="form-control rentals-input" min="0"  onchange="computedata('.$Id.')" onkeyup="computedata('.$Id.')">
            <input type="hidden" name="RID[]" id="rental-id-'.$Id.'">
            <div class="input-group-text "> pc</div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="input-group">
                <div class="input-group-text">₱</div>
                <input type="number" name="' . $Id . '" id="rental-'.$Id.'" class="form-control"  value="' . $Cost . '" style="background-color: rgb(235,235,228)" readonly>
            </div>
        </div>

        

    </div>';
    }
    $card .= '</div>';
    echo $card;
}
