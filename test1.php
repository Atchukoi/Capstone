<?php
include 'config.php';

if (isset($_POST['displaySend'])) {
    $table = '
<table id="datatablesSimple" class="table-striped">
    <thead class="bg-info ">
      <tr>
        <th scope="col">ID.</th>
        <th scope="col">Room Type</th>
        <th scope="col">Arrival</th>
        <th scope="col">Departure</th>
        <th scope="col">Name</th>
        <th scope="col">Contact</th>
        <th scope="col">Status</th>
        <th scope="col">Reservation Code</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>';

    $sql = "SELECT rr.Id, rr.Code, roomrate.RoomCategoryId, rr.Arrival, rr.Departure,u.Id AS GuestId, CONCAT(u.FirstName,' ', u.LastName) AS Name, u.Contact, rr.Status, rc.Title
      FROM roomreservation rr
      LEFT JOIN user u ON rr.GuestId = u.Id
       LEFT JOIN roomrate ON roomrate.Id = rr.RoomRateId
      LEFT JOIN roomcategory rc ON rc.Id = roomrate.RoomCategoryId
      WHERE rr.Status = 'Accepted' AND rc.RoomTypeId=1;";
    $result = mysqli_query($conn, $sql);
    $number = 1;

    while ($row = mysqli_fetch_assoc($result)) {

        $Id = $row['Id'];
        $Title = $row['Title'];
        $Arrival = $row['Arrival'];
        $Departure = $row['Departure'];
        $Name = $row['Name'];
        $Contact = $row['Contact'];
        $Status = $row['Status'];
        $Code = $row['Code'];

        $table .= '<tr class="text-center">
          <th>' . $number . '</th>
          <td>' . $Title . '</td>
          <td>' . $Arrival . '</td>
          <td>' . $Departure . '</td>
          <td>' . $Name . '</td>
          <td>' . $Contact . '</td>
          <td>' . $Status . '</td>
            <td>' . $Code . '</td>
          
          <td class="text-center ">


          
          <button class="btn btn-secondary"
          onclick="GetDetails(' . $Id . ')"> <i class="fa-solid fa-right-from-bracket"></i></i> Book </button>
          </td>
        </tr>
        </tbody>';
        $number++;
    }
    $table .= '</table>';
    echo $table;
}
