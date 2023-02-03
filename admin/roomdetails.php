<?php
include 'themes/navbar.php';
include 'config.php';

if (isset($_POST['submit'])) {
    $RoomName = $_POST['RoomName'];
    $RoomType = $_POST['RoomType'];

    $csql = "INSERT INTO `room`
    (`Title`, `RoomTypeId`, `RoomCategoryId`, `RoomStatusId`) 
    VALUES 
    ('$RoomName','1','$RoomType','2')
    ";
    $cresult = mysqli_query($conn, $csql);

    if ($cresult) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

    ' . $RoomName . ' has been added successfuly!
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
    }
}
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
            <div class="col-md-2 offset-md-10 ">
                <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-square-plus"></i> ADD A NEW ROOM</button>
            </div>

        </div>
        <div class="row ">
            <div class="col mt-2">
                <table id="datatablesSimple" class="table  table-striped">
                    <thead class="" >
                        <tr>
                            <th>No. </th>
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
                        $number = 1;


                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr class="text-center">
                                <td><strong><?php echo $number ?></strong></td>
                                <td><?php echo $row['RoomName'] ?></td>
                                <td><?php echo $row['RoomType'] ?></td>
                                <td><?php echo $row['Description'] ?></td>
                                <td>₱ <?php echo $row['Rate'] ?></td>
                                <td><?php echo $row['PersonCount'] ?> <i class="fa-solid fa-person"></i></td>
                                <td class="text-center">
                                    <div class="div">
                                        <a href="function/hrmanage/rdedit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary mb-2"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                                    </div>
                                    <div class="div">
                                        <a href="function/hrmanage/rdelete.php?id=<?php echo $row['Id'] ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</a>
                                    </div>


                                </td>
                            </tr>
                        <?php $number++;
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
                <form method="POST">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="" class="form-label">Room Name :</label>
                                    <input type="text" name="RoomName" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <?php
                                $typesql = "SELECT * FROM roomcategory WHERE RoomTypeId = 1 ";
                                $typeresult = mysqli_query($conn, $typesql);


                                ?>
                                <div class="col">
                                    <label for="Type" class="form-label">Room Category :</label>
                                    <select class="form-select form-select-md  mb-3" name="RoomType" aria-label=".form-select-lg example" onchange="fetchcategory()" required>
                                        <option selected value="">-- Please Select --</option>
                                        <?php
                                        while ($trow = mysqli_fetch_assoc($typeresult)) {
                                            $roomtypeid = $trow['Id'];
                                            $roomtype = $trow['Title'];

                                            echo ' <option value= "' . $roomtypeid . '"> ' . $roomtype . ' </option> ';
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success"> Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'themes/footer.php'; ?>