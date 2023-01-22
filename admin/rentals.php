<?php
include 'themes/navbar.php';
include 'config.php';
?>
<div class="card mb-4">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-money-bill-transfer"></i>
            Rentals </h4>
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
    $Price = $_POST['Price'];



    $sql = "INSERT INTO `roomextra`
    (`Title`, `Description`, `Cost`) 
    VALUES 
    ('$Name','$Description','$Price')";

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

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <table id="datatablesSimple" class="table-striped">
                <thead class="bg-info ">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `roomextra` WHERE ExtraCategoryId = 2";
                    
                    $result = mysqli_query($conn, $sql);
                    $number = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th><?php echo $number ?></th>
                            <th><?php echo $row['Title'] ?></th>
                            <td><?php echo $row['Description'] ?></td>
                            <td>₱ <?php echo $row['Cost'] ?></td>

                            <td>
                                <a href="function/fhmanage/rentaledit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary ">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Update
                                </a>
                                <a href="function/fhmanage/rentaldelete.php?id=<?php echo $row['Id'] ?>" class="btn btn-danger">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                        $number++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
         <div class="col-lg-5" style="border-left: solid black 5px;">
            <form method="POST">
                <div class="row mb-2">
                    <div class="col">
                        <label for="Name" class="form-label">Name :</label>
                        <input type="text" name="Name" class="form-control" placeholder="e.g. Table">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label for="Description" class="form-label">Description :</label>
                        <input type="text" name="Description" class="form-control" placeholder="e.g. Round Table">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="Price" class="form-label">Price :</label>
                        <div class="input-group">
                                <div class="input-group-text">₱</div>
                        <input type="number" name="Price" class="form-control" placeholder="e.g. 200">
                        </div>
                    </div>
                </div>
                <div class="row mb-">
                    <div class="col">
                        <button name="submit" class="btn btn-success" style="width: 100%;">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>










<?php include 'themes/footer.php'; ?>