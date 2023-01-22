<?php
include 'themes/navbar.php';
include 'config.php';

?>
<div class="card mb-4">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-bed"></i>
            Rooms Types</h4>
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
            <div class="col-8">
                <div class="card-body">
                    <table id="datatablesSimple" class="table-striped">
                        <thead class="bg-info">
                            <tr>
                                <th>No.</th>
                                <th>Room Type</th>
                                <th>Description</th>
                                <th>Number of Person</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * FROM `roomcategory`";
                            $result = mysqli_query($conn, $sql);
                            $number = 1;

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr class="text-center">
                                    <th><?php echo $number ?></th>
                                    <td><strong><?php echo $row['Title'] ?></td>
                                    <td><?php echo $row['Description'] ?></td>
                                    <td><i class="fa-solid fa-person"></i> <?php echo $row['PersonCount'] ?></td>
                                    <td class="text-center">
                                        <a href="function/hrmanage/rtedit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary mb-1"><i class="far fa-pen-to-square"></i> Update</a>
                                        <a href="function/hrmanage/rtdelete.php?id=<?php echo $row['Id'] ?>" class="btn btn-danger mb-1"><i class="far fa-trash-alt"></i> Delete</a>
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



            <div class="col-sm-4 my-3" style="border-left: solid black 5px;">
                <form method="POST">

                    <?php
                    if (isset($_POST['submit'])) {
                        $Type = $_POST['Type'];
                        $Description = $_POST['Description'];
                        $Person = $_POST['Person'];
                       


                        $sql = "INSERT INTO `roomcategory`(`Title`, `Description`, `RoomTypeId`, `PersonCount`) VALUES ('$Type','$Description','1','$Person')";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                
                    ' . $Type . ' has been added to the list
                    
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                        } else {
                            echo "Failed: " . mysqli_connect_error($conn);
                        }
                    }
                    ?>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="Type" class="form-label">Room Type :</label>
                            <input type="text" name="Type" class="form-control" placeholder="e.g. Deluxe" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="Description" class="form-label">Description :</label>
                            <input type="text" name="Description" class="form-control" placeholder="e.g. 1 Full size bed" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="Person" class="form-label">Person :</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa-solid fa-person"></i></div>
                                <input type="text" name="Person" class="form-control" placeholder="e.g. 2" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success" name="submit" type="submit" style="width: 100%;"><i class="fa-solid fa-floppy-disk"></i> Create</button>
                        </div>
                    </div>
                </form>
            </div>




        </div>



    </div>
</div>
<?php include 'themes/footer.php'; ?>