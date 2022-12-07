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
    <table id="datatablesSimple" class="table-striped">
        <thead class="bg-info ">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Hours</th>
                <th>Price</th>
                <th>Rate / Extra Hour</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM tblhall";

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <th><?php echo $row['Name'] ?></th>
                    <td><?php echo $row['Description'] ?></td>
                    <td><?php echo $row['Time'] ?> Hours</td>
                    <td>₱ <?php echo $row['Cost'] ?></td>
                    <td>₱ <?php echo $row['Exceeding'] ?></td>
                    <td>
                    <a href="function/fhmanage/hdedit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Update
                    </a>
                    </td>
                </tr>
            <?php
            }
            ?>



        </tbody>
    </table>
</div>




<?php include 'themes/footer.php'; ?>