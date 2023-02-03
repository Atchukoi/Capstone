<?php
include 'themes/navbar.php';
include 'config.php';
?>



<div class="card mb-4">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-hotel"></i>
            Hall Package </h4>
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

<?php
if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $HallType = $_POST['HallType'];

    $Time = $_POST['Time'];
    $Cost = $_POST['Cost'];
    $Exceeding = $_POST['Exceeding'];



    $sql = "INSERT INTO `roomrate`
    (`Title`, `Description`, `RoomTypeID`, `RoomCategoryId`) 
    VALUES 
    ('$Name','$Description','2','$HallType')";

    $result = mysqli_query($conn, $sql);
    $RRLastId = mysqli_insert_id($conn);

    $bsql = "INSERT INTO `roomratepricetrail`
    (`RoomRateId`, `Rate`, `InitialTime`, `ExceedingRatePerHour`, `IsActive`) 
    VALUES 
    (' $RRLastId','$Cost','$Time','$Exceeding','1')";
    $bresult = mysqli_query($conn, $bsql);
    $RRPTLastId = mysqli_insert_id($conn);

    $csql = "UPDATE `roomrate` SET `RoomPriceTrailId`='$RRPTLastId' WHERE Id = $RRLastId";
    $cresult = mysqli_query($conn, $csql);



    if ($result) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

' . $Name . ' has been added to the list

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
    }
}
?>

<?php
$typesql = "SELECT * FROM roomcategory WHERE RoomTypeId = 2 ";
$typeresult = mysqli_query($conn, $typesql);


?>

<div class="container-fluid">
    <div class="container-fluid mb-3" style="border-bottom: solid black 5px;">
        <form method="Post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="Name" class="form-label">Name :</label>
                    <input type="text" name="Name" class="form-control" autofill="off" placeholder="e.g. 80 Pax - Function Hall Package B">
                </div>
                <div class="col-md-6">
                    <label for="Description" class="form-label">Description :</label>
                    <input type="text" name="Description" class="form-control" placeholder="e.g. High-Quality Sound with Full Lights Par Led Lights Tables with Cloth & Tiffany Chairs With Foam">
                </div>
            </div>
            <div class="row mb-3">
                
                <div class="col-md-3">
                    <label for="Pax" class="form-label">Hall Category:</label>
                    <select class="form-select" name="HallType" aria-label="Default select example">
                    
                        <?php
                        while ($trow = mysqli_fetch_assoc($typeresult)) {
                            $roomtypeid = $trow['Id'];
                            $roomtype = $trow['Title'];

                            echo ' <option value= "' . $roomtypeid . '"> ' . $roomtype . ' </option> ';
                        }
                        ?>

                    </select>
                </div>

                <div class="col-md-3">
                    <label for="Time" class="form-label">Initial Time :</label>
                    <div class="input-group">

                        <input type="number" name="Time" min="1" class="form-control" placeholder="e.g. 4">
                        <div class="input-group-text">hours</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="Cost" class="form-label">Rate :</label>
                    <div class="input-group">
                        <div class="input-group-text">₱</div>
                        <input type="number" name="Cost" min="1" class="form-control" placeholder="e.g. 10000">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="Exceeding" class="form-label">Rate per Extra hour :</label>
                    <div class="input-group">
                        <div class="input-group-text">₱</div>
                        <input type="number" name="Exceeding" min="1" class="form-control" placeholder="e.g. 1000">
                    </div>
                </div>

            </div>
            <div class="row mb-3">

                <div class="col-md-4 offset-md-8">
                    <button name="submit" class="btn btn-success mt-4" style="width: 100%;"> Create</button>

                </div>
            </div>
        </form>
    </div>



    <div class="row">
        <div class="col">
            <table id="datatablesSimple" class="table table-striped">
                <thead class="bg-info ">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Time</th>
                        <th>Cost</th>
                        <th>Exceeding</th>
                        <th>Inclusions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT rr.Id, rr.Title, rc.Description,rrpt.InitialTime, rrpt.Rate,rrpt.Id AS PriceId, rrpt.ExceedingRatePerHour, rr.Description AS Inclusion
                    FROM roomrate rr
                    LEFT JOIN roomcategory rc ON rc.Id = rr.RoomCategoryId
                    LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
                    WHERE rr.RoomTypeID = 2; 
                    ";

                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th><?php echo $row['Title'] ?></th>
                            <td><?php echo $row['Description'] ?></td>
                            <td><?php echo $row['InitialTime'] ?> hours</td>
                            <td>₱ <?php echo $row['Rate'] ?></td>
                            <td>₱ <?php echo $row['ExceedingRatePerHour'] ?> / hour</td>
                            <td><?php echo $row['Inclusion'] ?></td>
                            <td style="width:500px">
                                <div class="row mb-2">
                                    <a href="function/fhmanage/hpedit.php?id=<?php echo $row['Id'] ?>&pid=<?php echo $row['PriceId'] ?>" class="btn btn-secondary ">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Update
                                    </a>
                                </div>
                                <div class="row">
                                    <a href="function/fhmanage/hpdelete.php?id=<?php echo $row['Id'] ?>&name=<?php echo $row['Title'] ?>" class="btn btn-danger">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Delete
                                    </a>
                                </div>

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