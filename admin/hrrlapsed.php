<?php
include 'themes/navbar.php';
include 'config.php';

?>


<div class="card mb-4">
    <div class="card-header text-primary">
        <h4><i class="fas fa-table me-1"></i>
            Room Reservation List</h4>
    </div>
</div>
<?php

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  
  ' . $msg . '
  
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

<div class="card-body">

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link " href="hrraccepted.php">Accepted</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="hrrpending.php">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active bg-primary text-white" href="hrrlapsed.php">Lapsed</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="hrrarchieved.php">Archieve</a>
        </li>
    </ul>


    <table id="datatablesSimple" class="table table-striped">
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
        <tbody>
            <?php
            $sql = "SELECT rr.Id, rr.Code, roomrate.RoomCategoryId, rr.Arrival, rr.Departure,u.Id AS GuestId, CONCAT(u.FirstName,' ', u.LastName) AS Name, u.Contact, rr.Status, rc.Title
            FROM roomreservation rr
            LEFT JOIN user u ON rr.GuestId = u.Id
             LEFT JOIN roomrate ON roomrate.Id = rr.RoomRateId
            LEFT JOIN roomcategory rc ON rc.Id = roomrate.RoomCategoryId
            WHERE rr.Status = 'Lapsed' AND rc.RoomTypeId=1;";
            $result = mysqli_query($conn, $sql);
            $number = 1;

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr class="text-center">
                    <th><?php echo $number ?></th>
                    <td style="width: 100px;"><?php echo $row['Title'] ?></td>
                    <td><?php echo $row['Arrival'] ?></td>
                    <td><?php echo $row['Departure'] ?></td>
                    <td><?php echo $row['Name'] ?></td>
                    <td><?php echo $row['Contact'] ?></td>
                    <td><?php echo $row['Status'] ?></td>
                    <td><?php echo $row['Code'] ?></td>
                    <td class="text-center ">


                        <a href="function/room_reservation/edit.php?Id=<?php echo $row['Id'] ?>" class="btn btn-secondary mb-1">
                            <i class="fa-solid fa-circle-info"></i>
                            View
                        </a>

                    </td>
                </tr>

            <?php
                $number++;
            }
            ?>
        </tbody>
    </table>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Send Payment Link</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <label for="" class="form-label">Gmail :</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="row">
                        <label for="" class="form-label">Payment Link :</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send Email</button>
            </div>
        </div>
    </div>
</div>





<?php include 'themes/footer.php'; ?>