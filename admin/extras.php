<?php
include 'themes/navbar.php';
include 'config.php';
?>

<div class="card mb-4">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-cubes"></i>
            Extras </h4>

    </div>

    <?php

    if (isset($_POST['submit'])) {
        $Name = $_POST['Name'];
        $Quantity = $_POST['Quantity'];
        $Cost = $_POST['Cost'];


        $sql = "INSERT INTO `roomextra`
        (`Title`, `Description`, `Cost`, `ExtraCategoryId`, `RoomTypeID`) 
        VALUES
         ('$Name','$Quantity',' $Cost','1','1')";
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

    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

' . $msg . '

<a type="button" class="btn-close" href="extras.php" aria-label="Close"></a>
</div>';
    }
    ?>

    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-lg-8">
                <table id="datatablesSimple" class="table-striped">
                    <thead class="bg-info">
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

                        $sql = "SELECT * FROM `roomextra` WHERE ExtraCategoryId = 1";
                        $result = mysqli_query($conn, $sql);
                        $number = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <th><?php echo $number ?></th>
                                <td><strong><?php echo $row['Title'] ?></td>
                                <td><?php echo $row['Description'] ?></td>
                                <td>₱ <?php echo $row['Cost'] ?></td>
                                <td style="width:210px">
                                    <a href="function/hrmanage/extraedit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                                    <a href="function/hrmanage/extradelete.php?id=<?php echo $row['Id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</a>
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
                <form method="POST">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="Name" class="form-label">Name :</label>

                            <input type="text" name="Name" class="form-control " placeholder="e.g. Pillow">

                        </div>
                    </div>

                    <div class="col mb-3">
                        <label for="Quantity" class="form-label">Description :</label>
                        <div class="input-group">
                           
                            <input type="text" name="Quantity" class="form-control" placeholder="e.g. 1">
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="Cost" class="form-label">Cost :</label>
                        <div class="input-group">
                            <div class="input-group-text">₱</div>
                            <input type="number" name="Cost" class="form-control" placeholder="e.g. 100">
                        </div>
                    </div>
                    <div class="col">
                    <button class="btn btn-success mb-3" name="submit" type="submit" style="width:100%"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>
                    
            </div>





            </form>
        </div>
    </div>
</div>


<?php include 'themes/footer.php'; ?>