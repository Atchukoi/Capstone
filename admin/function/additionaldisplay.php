<?php
include 'config.php';


if (isset($_POST['displaySend'])) {
    $card = '<div class="row">';
    $sql = "SELECT re.Id, re.Title, re.Cost
    FROM roomextra re
    WHERE re.RoomTypeID = 2 And re.ExtraCategoryId= 4";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {

        $Id = $row['Id'];
        $Title = $row['Title'];
        $Cost = $row['Cost'];





        $card .= '
        <div class="col-md-2 mb-2">
        <label for="" class="form-label">' . $Title . ':</label>
        <div class="input-group">
            <input type="number" min="0" name="R[]" data-rental="rental-' . $Id . '" id="' . $Id . '" class="form-control additional-input" onchange="additional('.$Id.')" onkeyup="additional('.$Id.')">
            <input type="hidden" name="RID[]" id="rental-id-'.$Id.'">
            <div class="input-group-text ">pc</div>

        </div>
        <div class="col-md-8 my-2">
            <div class="input-group">
                <div class="input-group-text">₱</div>
                <input type="text"name="' . $Id . '" id="rental-'.$Id.'" class="form-control"  value="' . $Cost . '" style="background-color: rgb(235,235,228)" readonly>
            </div>
        </div>

    </div>';
    }
    $card .= '</div>';
    echo $card;
}
