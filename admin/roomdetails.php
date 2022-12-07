<?php 
include 'themes/navbar.php'; 
include 'config.php';
?>

<div class="card mb-4">
    <div class="card-header text-primary">
     <h4>   <i class="fa-solid fa-bed"></i>
        Rooms Details </h4>
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

    <div class="container-fluid">
        <div class="row ">
            <div class="col mt-2">
                <table id="datatablesSimple" class="table-striped">
                    <thead class="bg-info">
                        <tr>
                            <th>Room Number</th>
                            <th>Room Type</th>
                            <th>Description</th>
                            <th>Rate / Night</th>
                            <th>Number of Person</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT tblroom.Id, tblroom.Number, tblroomtype.Type, tblroomtype.Description, tblroomtype.Rate, tblroomtype.Person
                        FROM tblroom
                        LEFT JOIN tblroomtype ON tblroom.RoomTypeId = tblroomtype.Id";


                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr class="text-center">
                                <td ><strong><?php echo $row['Number'] ?></strong></td>
                                <td ><?php echo $row['Type'] ?></td>
                                <td ><?php echo $row['Description'] ?></td>
                                <td >₱ <?php echo $row['Rate'] ?></td>
                                <td><?php echo $row['Person'] ?> <i class="fa-solid fa-person"></i></td>
                                <td class="text-center">
                                    <a href="function/hrmanage/rdedit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                                    
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php include 'themes/footer.php'; ?>