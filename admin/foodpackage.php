<?php
include 'themes/navbar.php';
include 'config.php';

if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $Menu = $_POST['Menu'];
    $Pax50 = $_POST['Pax50'];
    $Pax80 = $_POST['Pax80'];
    $Pax100 = $_POST['Pax100'];


    $sql = "INSERT INTO `tblfoodpackage`
    (`Name`, `Description`, `Menu`, `Pax50`, `Pax80`, `Pax100`) 
    VALUES 
    ('$Name','$Description','$Menu','$Pax50','$Pax80','$Pax100')";

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
            Food Package </h4>
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
        <div class="col-lg-6">
            <table id="datatablesSimple" class="table-striped">
                <thead class="bg-info ">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Menu</th>
                        <th>50 Pax</th>
                        <th>80 Pax</th>
                        <th>100 Pax</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tblfoodpackage";

                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th><?php echo $row['Name'] ?></th>
                            <td><?php echo $row['Description'] ?></td>
                            <td><?php echo $row['Menu'] ?></td>
                            <td>₱ <?php echo $row['Pax50'] ?> / pax</td>
                            <td>₱ <?php echo $row['Pax80'] ?> / pax</td>
                            <td>₱ <?php echo $row['Pax100'] ?> / pax</td>
                            <td>
                                <div>
                                    <a href="function/fhmanage/fpedit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary mb-2">
                                        <i class="fa-solid fa-pen-to-square"></i> Update
                                    </a>
                                </div>
                                <div>
                                    <a href="function/fhmanage/fpdelete.php?id=<?php echo $row['Id'] ?>&name=<?php echo $row['Name'] ?>" class="btn btn-danger">
                                        <i class="fa-solid fa-pen-to-square"></i> Delete
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
        <div class="col-lg-6" style="border-left: solid black 5px;">
            <div class="row">
                <div class="row mb-5">
                    <form method="POST">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="Name" class="form-label">Name :</label>
                                <input type="text" name="Name" class="form-control" placeholder="e.g. Seafood Bundle">
                            </div>

                            <div class="col">
                                <label for="Description" class="form-label">Description :</label>
                                <input type="text" name="Description" class="form-control" placeholder="e.g. 2 main Course">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="Pax50" class="form-label">50 Pax :</label>
                                <div class="input-group">
                                    <div class="input-group-text">₱</div>
                                    <input type="number" name="Pax50" class="form-control" placeholder="e.g. 400">
                                    <div class="input-group-text">/ pc</div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="Pax80" class="form-label">80 Pax :</label>
                                <div class="input-group">
                                    <div class="input-group-text">₱</div>
                                    <input type="number" name="Pax80" class="form-control" placeholder="e.g. 350 ">
                                    <div class="input-group-text">/ pc</div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="Pax100" class="form-label">100 Pax :</label>
                                <div class="input-group">
                                    <div class="input-group-text">₱</div>
                                    <input type="number" name="Pax100" class="form-control" placeholder="e.g. 300">
                                    <div class="input-group-text">/ pc</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="Menu" class="form-label">Menu :</label>
                                <input type="text" name="Menu" class="form-control" placeholder="e.g. Buttered Crabs and Shrimps">
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