<?php
include 'themes/navbar.php';
include 'config.php';
?>


<div class="card mb-4">
    <div class="card-header text-primary">
       <h4><i class="fa-solid fa-rotate-right"></i>
        Room Management <h4>
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
    <table id="datatablesSimple" class="table table-striped">
            <thead class="bg-info text-center">
                <tr>
                <th>No.</th>
                    <th>Room No.</th>
                    <th>Room Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                    $sql = 
                    "SELECT r.Id, r.Title AS RoomNumber, rs.Title AS RoomStatus, rc.Title AS RoomDescription
                    FROM `room` r
                    JOIN roomcategory rc ON rc.Id = r.RoomCategoryId 
                    JOIN roomstatus rs ON rs.Id = r.RoomStatusId
                    WHERE r.RoomTypeId = 1 ";


                    $result = $conn->query($sql);
                    $number = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                <tr>
                <td><?php echo $number ?></td>
                    <td><?php echo $row['RoomNumber'] ?></td>
                    <td><?php echo $row['RoomDescription'] ?></td>
                    <td><?php echo $row['RoomStatus'] ?></td>
                    <td class="text-center ">
                        
                        <a  href="function/roommanage/vacant.php?id=<?php echo $row['Id'] ?>" class="btn btn-success my-1"><i class="fa-solid fa-square-check"></i> Vacant</a>
                        <a  href="function/roommanage/cleaning.php?id=<?php echo $row['Id'] ?>" class="btn btn-primary my-1"><i class="fa-solid fa-broom"></i> Cleaning</a>
                        <a  href="function/roommanage/maintenance.php?id=<?php echo $row['Id'] ?>" class="btn btn-warning my-1"><i class="fa-solid fa-triangle-exclamation"></i> Has Problem</a>
                        
                    </td>
                </tr>

            <?php
            $number++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>



<?php include 'themes/footer.php'; ?>

