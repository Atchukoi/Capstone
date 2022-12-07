<?php
include 'themes/navbar.php';
include 'config.php';


?>

<div style="background: rgb(255,255,255);
background: linear-gradient(183deg, rgba(255,255,255,1) 0%, rgba(163,163,163,1) 100%); height: 100vh;">

    <div class="card">
        <div class="card-header text-primary">
            <h4> <i class="fa-solid fa-hashtag"></i>
                Miscellaneous Charges </h4>
        </div>
    </div>

    <?php

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $cost = $_POST['cost'];


        $sql = "INSERT INTO `tblmisc`
    (`Description`, `Name`, `Quantity`, `Cost`) 
    VALUES 
    ('$description','$name','$quantity pc','$cost')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

    ' . $name . ' has been added to the list
    
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
    
    <a type="button" class="btn-close" href="misc.php" aria-label="Close"></a>
  </div>';
    }
    ?>

    <div class="container-fluid bg-light">
        <div class="row py-5">

            <div class="col-lg-6">
                <div class="row">
                    <label class="form-label mt-2"> <i class="fa-sharp fa-solid fa-basket-shopping"></i> List of Miscellaneous Charges </label>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Misc</th>
                            <th scope="col">Description</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM tblmisc";
                        $result = mysqli_query($conn, $sql);
                        $number = 1;
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <th><?php echo $row['Name'] ?></th>
                                <td><?php echo $row['Description'] ?></td>
                                <td><?php echo $row['Quantity'] ?> pc</td>
                                <td>₱ <?php echo $row['Cost'] ?></td>
                                <td>
                                    <a href="function/misc/edit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary mb-1"><i class="fa-solid fa-pen-to-square "></i> Update
                                    </a>
                                    <a href="function/misc/delete.php?id=<?php echo $row['Id'] ?>&misc=<?php echo $row['Name'] ?>" class="btn btn-danger mb-1"><i class="fa-solid fa-trash "></i> Delete
                                    </a>
                                </td>
                            </tr>

                        <?php

                        }
                        ?>

                    </tbody>
                </table>
            </div>

            <div class="col-lg-6 " style="border-left: solid black 5px;">
                <form method="POST">
                    <div class="row">

                        <label class="form-label mt-2"> <i class="fa-solid fa-utensils"></i> Miscellaneous</label>
                        <div class="col">
                            <label class="form-label mt-2"><strong>Misc :</strong></label>
                            <input type="text" class="form-control text-center" name="name" placeholder="e.g. Sphagetti">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label mt-2">Description :</label>
                            <input type="text" class="form-control text-center" name="description" placeholder="e.g. Solo Plate">
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-sm-6">
                            <label class="form-label mt-2">Quantity :</label>
                            <div class="input-group">
                                <div class="input-group-text">Pc</div>
                                <input type="text" class="form-control text-center" name="quantity" placeholder="e.g. 2">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label mt-2">Cost :</label>
                            <div class="input-group">
                                <div class="input-group-text">₱</div>
                                <input type="text" class="form-control text-center" name="cost" placeholder="e.g. 250">
                            </div>
                        </div>
                        <button class="btn btn-success mt-4 " type="submit" name="submit" style="width:50%; margin:auto;"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Submit</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>




</div>
<?php include 'themes/footer.php'; ?>