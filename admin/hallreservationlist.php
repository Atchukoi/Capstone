<?php
include 'themes/navbar.php';
include 'config.php';

?>


<div class="card mb-4">
  <div class="card-header text-primary">
    <h4><i class="fa-solid fa-table-columns"></i></i>
   Hall Reservation List</h4>
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

  <div class="card-body ">
    <table id="datatablesSimple" >
      <thead class="bg-info ">
        <tr>
          <th scope="col">ID.</th>
          <th scope="col">Name</th>
          <th scope="col">Hall Name</th>
          <th scope="col">Arrival</th>
          <th scope="col">Contact</th>
          <th scope="col">Status</th>
          <th scope="col">Code</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT CONCAT(u.FirstName,' ',u.LastName) AS GuestName, roomrate.Title, rr.Arrival, u.Contact, rr.Status, rr.Code  
        FROM roomreservation rr
        LEFT JOIN roomrate ON roomrate.Id = rr.RoomRateId
        LEFT JOIN user u ON u.Id = rr.GuestId
        WHERE  roomrate.RoomCategoryId = 2";
        $result = mysqli_query($conn, $sql);
        $number = 1;

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr class="text-center">
            <th><?php echo $number ?></th>
            <td><?php echo $row['GuestName'] ?></td>
            <td><?php echo $row['Title'] ?></td>
            <td><?php echo $row['Arrival'] ?></td>
            <td><?php echo $row['Contact'] ?></td>
            <td><?php echo $row['Status'] ?></td>
            <td><?php echo $row['Code'] ?></td>
            <td class="text-center ">
              <?php if ($row['Status'] == "Pending") {
              ?>
                 <a href="" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-circle-info"></i>
                Send Payment
              </a>

                <a href="function/hallreservation/edit.php?id=<?php echo $row['ReservationId'] ?>&guestid=<?php echo $row['GuestId'] ?>" class="btn btn-secondary mb-1">
                  <i class="fa-solid fa-circle-info"></i>
                  View
                </a>

                <a href="function/hallreservation/delete.php?Id=<?php echo $row['ReservationId'] ?> & Name=<?php echo $row['GuestName'] ?>" class="btn btn-danger mb-1"><i class="fa-solid fa-trash "></i>
                  Delete
                </a>

              <?php } else { ?>
                <a href="function/hall/book.php?Id=<?php echo $row['ReservationId'] ?>&Guestid=<?php echo $row['GuestId'] ?>" class="btn btn-primary mb-1"><i class="fa-solid fa-right-from-bracket"></i></i> Book</a>
                
                <a href="function/hallreservation/edit.php?id=<?php echo $row['ReservationId'] ?>&guestid=<?php echo $row['GuestId'] ?>" class="btn btn-secondary mb-1">
                  <i class="fa-solid fa-circle-info"></i>
                  View
                </a>

                <a href="function/hallreservation/delete.php?Id=<?php echo $row['ReservationId'] ?> & Name=<?php echo $row['GuestName'] ?>" class="btn btn-danger mb-1"><i class="fa-solid fa-trash "></i>
                  Delete
                </a>
              <?php } ?>

            </td>
          </tr>

        <?php
          $number++;
        }
        ?>
      </tbody>
    </table>

  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Send Payment Link</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <label for="" class="form-label">Gmail :</label>
            <input type="text" class="form-control">
          </div>
          <div class="row">
            <label for="" class="form-label">Payment Link :</label>
            <input type="text" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send Email</button>
      </div>
    </div>
  </div>
</div>


  




<?php include 'themes/footer.php'; ?>