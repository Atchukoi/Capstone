<?php
include 'themes/navbar.php';
include 'config.php';
?>

<div class="card mb-4">
    <div class="card-header text-primary">
      <h4>  <i class="fa-solid fa-cubes"></i>
        Extras </h4>
        
    </div>

    <?php

    if (isset($_POST['submit'])) {
        $Name = $_POST['Name'];
        $Quantity = $_POST['Quantity'];
        $Cost = $_POST['Cost'];


        $sql = "INSERT INTO `tblextra`
(`Name`,`Quantity`, `Cost`) 
VALUES 
('$Name','$Quantity','$Cost')";

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
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM `tblextra`";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><strong><?php echo $row['Name'] ?></td>
                                <td><?php echo $row['Quantity'] ?> pc</td>
                                <td>₱ <?php echo $row['Cost'] ?></td>
                                <td style="width:210px">
                                    <a href="function/hrmanage/extraedit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                                    <a href="function/hrmanage/extradelete.php?id=<?php echo $row['Id'] ?> & name=<?php echo $row['Name'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</a>
                                </td>
                            </tr>
                        <?php
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
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="Quantity" class="form-label">Quantity :</label>
                            <div class="input-group">
                                <div class="input-group-text">Pc</div>
                            <input type="number" name="Quantity" class="form-control" placeholder="e.g. 1">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <label for="Cost" class="form-label">Cost :</label>
                            <div class="input-group">
                                <div class="input-group-text">₱</div>
                            <input type="number" name="Cost" class="form-control" placeholder="e.g. 100">
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-success mb-3" name="submit" type="submit" style="float: right;"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>


    <?php include 'themes/footer.php'; ?>