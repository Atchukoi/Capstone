<?php
include 'config.php';


if (isset($_POST['displaySend'])) {
    $card = '<div class="row">';
    $sql = "SELECT  r.Id, r.Title AS RoomNumber
    FROM room r
    LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
    WHERE r.RoomTypeId = 2;
;";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {

        $Id = $row['Id'];
        $Number = $row['RoomNumber'];
        
        $bresult = mysqli_query($conn,"SELECT  CONCAT(u.FirstName,' ', u.LastName) AS GuestName
        FROM  transaction t 
        LEFT JOIN user u ON u.Id =  t.UserId
        WHERE t.Id =  $Id");
        $brow = mysqli_fetch_assoc($bresult);
        $Name = $brow['GuestName'];



        $card .= '
        <div class="col-lg-4 mb-5 ">
        <div class="card" style="width:95%; margin:auto;">
                <img src="../images/convention_center.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">'.$Number.'</h5>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="" class="form-label"><strong>Guest Name:</strong></label>
                            </div>
                            <div class="col-sm-8">
                                
                                
                                <input type="text" class="form-control text-center" value="'.$Name.'" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <a href="functionhall.php?Id='.$Id.'" class="btn btn-primary mt-2" >
                            View Hall Details
                        </a>
                    </div>
                    
                </div>
            </div>
            </div>
        ';
    }
    $card .= '</div>';
    echo $card;
}
