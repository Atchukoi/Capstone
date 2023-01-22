<?php
include 'themes/navbar.php';
include 'config.php';
?>

<div class="card mb-4">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-hotel"></i>
            Hall Details </h4>
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
    <div class="row mt-2">
        <div class="col-lg-8">
            <table id="datatablesSimple" class="table-striped">
                <thead class="bg-info ">
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `roomcategory` WHERE RoomTypeId =2";
                    $number = 1;
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <th><?php echo $number ?></th>
                            <td><?php echo $row['Title'] ?></td>

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
                        <label for="Name" class="form-label">Hall Type :</label>

                        <input type="text" name="Name" class="form-control " placeholder="e.g. Function Hall">

                    </div>
                </div>

               
                <div class="col">
                    <button class="btn btn-success mb-3" name="submit" type="submit" style="width:100%"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Submit</button>
                </div>

        </div>






        </form>
    </div>
</div>

<?php include 'themes/footer.php'; ?>