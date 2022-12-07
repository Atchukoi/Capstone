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
        <table id="datatablesSimple" class="table-striped">
            <thead class="bg-info">
                <tr>
                    <th>Room No.</th>
                    <th>Room Type</th>
                    <th>Rate Per/Night</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                    $sql = 
                    "SELECT tblroom.Id,tblroom.Number, tblroomtype.Type, tblroomtype.Rate, tblroom.Status
                    FROM tblroom 
                    LEFT JOIN tblroomtype ON tblroom.RoomTypeId = tblroomtype.Id;";


                    $result = $conn->query($sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                <tr>
                    <td><?php echo $row['Number'] ?></td>
                    <td><?php echo $row['Type'] ?></td>
                    <td><?php echo $row['Rate'] ?></td>
                    <td><?php echo $row['Status'] ?></td>
                    <td class="text-center ">
                        
                        <a  href="function/roommanage/vacant.php?id=<?php echo $row['Id'] ?>" class="btn btn-success my-1"><i class="fa-solid fa-square-check"></i> Vacant</a>
                        <a  href="function/roommanage/cleaning.php?id=<?php echo $row['Id'] ?>" class="btn btn-primary my-1"><i class="fa-solid fa-broom"></i> Cleaning</a>
                        <a  href="function/roommanage/maintenance.php?id=<?php echo $row['Id'] ?>" class="btn btn-warning my-1"><i class="fa-solid fa-triangle-exclamation"></i> Has Problem</a>
                        
                    </td>
                </tr>

            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>



<?php include 'themes/footer.php'; ?>

