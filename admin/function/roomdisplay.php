<?php
include 'config.php';


if (isset($_POST['displaySend'])) {
    $card = '<div class="row mt-2 mb-5 text-center">';
    $sql = "SELECT room.Id AS RoomId, room.Title AS RoomNumber, room.RoomCategoryId, room.RoomStatusId, roomcategory.Title AS RoomType FROM room 
    LEFT JOIN roomcategory ON room.RoomCategoryId = roomcategory.Id 
    LEFT join roomstatus ON room.RoomStatusId = roomstatus.Id 
    WHERE room.RoomTypeId = 1;";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {

        $Id = $row['RoomId'];
        $Number = $row['RoomNumber'];
        $Name = $row['RoomType'];
        $RoomStatusId = $row['RoomType'];
        $link = "";
        $linkname = "";

        if ($row['RoomStatusId'] == 1) {
          $RoomStatusId = "bg-danger";
          $link = "hotel.php";
          $linkname = '<i class="fa-solid fa-arrow-right-from-bracket"></i> View Room Details ';
        } 
        if ($row['RoomStatusId'] == 2) {
          $RoomStatusId = "bg-success";
          $link = "walkin.php";
          $linkname = '<i class="fa-solid fa-book-medical"></i> Check-in a Guess ';
        } 
        if ($row['RoomStatusId'] == 3) {
          $RoomStatusId = "bg-warning";
          $link = "";
          $linkname = '<i class="fa-solid fa-triangle-exclamation"></i> Under Maintenance ';
        } 
        if ($row['RoomStatusId'] == 4){
          $RoomStatusId = "bg-info";
          $link = "";
          $linkname = '<i class="fa-solid fa-broom"></i> Need Cleaning  ';
        }
      

        $card .= '
        <div class="col-lg-2 p-2 mb-2">
                <div class="card text-center">
                  <div class="card-header text-dark fs-6  '.$RoomStatusId.'">
                    ' . $Number . ' - ' . $Name . '
                  </div>
                  <div class="card-body">
                  <div class="container-fluid">
                  <div class="row">
                  

                    <div class="col">
                        <i class="fa-solid fa-bed "  style="width:auto; height: auto;"></i>
                    </div>

                    
                    </div>
                  </div>
                  
                    
                  </div>
                  <div class="card-footer text-muted">
                  <a href="' . $link . '?Id='.$Id.'" class="btn btn-primary" style="width:90%;">' . $linkname . '</a>
                  </div>
                </div>
              </div>
        ';
    }
    $card .= '</div>';
    echo $card;
}
