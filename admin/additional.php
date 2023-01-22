<?php
include 'themes/navbar.php';
include 'config.php';

if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $Cost = $_POST['Cost'];
   


    $sql = "INSERT INTO `roomextra`
    (`Title`, `Description`, `Cost`, `ExtraCategoryId`, `RoomTypeID`) 
    VALUES 
    ('$Name','$Description','$Cost','4','2')";

    $result = mysqli_query($conn, $sql);

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

<div class="card mb-4">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-utensils"></i>
            Additional Menu </h4>
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
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <table id="datatablesSimple" class="table-striped">
                <thead class="bg-info ">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `roomextra` WHERE ExtraCategoryId = 4";
                    $result = mysqli_query($conn, $sql);
                    $number = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th><?php echo $number ?></th>
                            <th><?php echo $row['Title'] ?></th>
                            <td><?php echo $row['Description'] ?></td>
                            <td>₱ <?php echo $row['Cost'] ?> / pax</td>
                            <td>
                                <div>
                                    <a href="function/fhmanage/fpedit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary mb-2">
                                        <i class="fa-solid fa-pen-to-square"></i> Update
                                    </a>
                                </div>
                                <div>
                                    <a href="function/fhmanage/fpdelete.php?id=<?php echo $row['Id'] ?>" class="btn btn-danger">
                                        <i class="fa-solid fa-pen-to-square"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $number++;
                    }
                    ?>



                </tbody>
            </table>
        </div>
        <div class="col-lg-4" style="border-left: solid black 5px;">
            <div class="row">
                <div class="row mb-5">
                    <form method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="Name" class="form-label">Name :</label>
                                <input type="text" name="Name" class="form-control" placeholder="e.g. Seafood Bundle">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="Description" class="form-label">Description :</label>
                                <input type="text" name="Description" class="form-control" placeholder="e.g. 2 main Course">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="Price" class="form-label">Price :</label>
                                <div class="input-group">
                                    <div class="input-group-text">₱</div>
                                    <input type="number" name="Cost" class="form-control" placeholder="e.g. 200">
                                </div>
                            </div>
                        </div>
                    



                        <div class="row mb-3">
                            <div class="col mt-4">
                                <button type="submit" class="btn btn-success me-3" style="margin:auto; width:100%;" name="submit">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>




<?php include 'themes/footer.php'; ?>