<?php
include 'themes/navbar.php';
include 'config.php';
?>

<div class="card mb-4">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-bed"></i>
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
        <div class="row">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> ADD A NEW ROOM</button>
        </div>
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

                        $sql = "SELECT r.Id, r.Title AS RoomName, rc.Title AS RoomType,CONCAT(rc.Description,' ', rr.Description) AS Description, rrpt.Rate, rc.PersonCount
                        FROM room r
                        LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
                        LEFT JOIN roomrate rr ON rr.RoomCategoryId = rc.Id
                        LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
                        WHERE r.RoomTypeId=1";


                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr class="text-center">
                                <td><strong><?php echo $row['RoomName'] ?></strong></td>
                                <td><?php echo $row['RoomType'] ?></td>
                                <td><?php echo $row['Description'] ?></td>
                                <td>₱ <?php echo $row['Rate'] ?></td>
                                <td><?php echo $row['PersonCount'] ?> <i class="fa-solid fa-person"></i></td>
                                <td class="text-center">
                                    <a href="function/hrmanage/rdedit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary mb-2"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                                    <a href="#?id=<?php echo $row['Id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</a>
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
    <!--  Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ROOM DETAILS</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">Room Name :</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label class="form-label">Select Room Type :</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Presidential villa</option>
                                    <option value="2">Suitte Villa</option>
                                    <option value="3">Mini Dorm</option>
                                    <option value="4">Standard </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="Cost" class="form-label">Price Per Nigt :</label>
                                <div class="input-group">
                                    <div class="input-group-text">₱</div>
                                    <input type="number" name="Cost" class="form-control" placeholder="e.g. 100">
                                </div>
                            </div>
                        </div>


                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php include 'themes/footer.php'; ?>