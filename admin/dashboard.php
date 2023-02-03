<?php
include 'themes/navbar.php';
include 'config.php'
?>

<style>
  .cl {
    outline: 1px solid blue;
  }

  th {
    font-weight: normal;
  }
</style>

<div class="card mb-4">
  <div class="card-header text-primary">
    <div class="row align-items-center">
      <div class="col">
        <h4><i class="fa-solid fa-table-columns"></i>
          Hotel Dashboard</h4>
      </div>
      <div class="col">
        <h5><i class="fa-regular fa-square-full bg-success fs-1 text-white"></i>Vacant</h5>
      </div>
      <div class="col">
        <h5><i class="fa-regular fa-square-full bg-danger fs-1 text-white"></i>Occupied</h5>
      </div>
      <div class="col">
        <h5><i class="fa-regular fa-square-full bg-warning fs-1 text-white"></i>Maintenance</h5>
      </div>
      <div class="col">
        <h5><i class="fa-regular fa-square-full bg-info fs-1 text-white"></i>Cleaning</h5>
      </div>
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
  <section class="bg-secondary">
    <div class="container-fluid">
      <div class="row p-2">
        <div class="container-fluid">
          <div class="row mt-2 mb-5 text-center">


            <div id="displayDataTable"></div>

          </div>
        </div>
      </div>
      <div class="row mb-3 ">
        <div class="col-md-3">
          <div class="card border-dark my-2" style="height: 350px;">
            <div class="card-header text-center bg-info">
              <i class="fa-solid fa-bed  "></i><strong> Rooms</strong>
            </div>
            <div class="card-body-fluid">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>Total:</th>
                    <td>12</td>

                  </tr>
                  <tr>
                    <th>Not Available</th>
                    <td>
                      <?php
                      $aresult = mysqli_query($conn, "SELECT COUNT(RoomStatusId) AS Occupied FROM room WHERE RoomStatusId = '1'");
                      $data = mysqli_fetch_assoc($aresult);
                      echo $data['Occupied'];
                      ?>
                    </td>

                  </tr>
                  <tr>
                    <th>Available </th>
                    <td>
                      <?php
                      $bresult = mysqli_query($conn, "SELECT COUNT(RoomStatusId) AS Available FROM room WHERE RoomStatusId = '2'");
                      $data = mysqli_fetch_assoc($bresult);
                      echo $data['Available'];
                      ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card border-dark my-2" style="height: 350px;">
            <div class="card-header text-center bg-info">
              <i class="fa-solid fa-bed "></i><strong> Available Room Types </strong>
            </div>
            <div class="card-body-fluid">
              <table class="table table-striped">
                <tbody>
                  <tr>

                    <?php
                    $result = mysqli_query($conn, "SELECT Title, (SELECT COUNT(*) FROM room WHERE room.RoomCategoryId = roomcategory.Id AND room.RoomStatusId = 2 ) AS Available
                          FROM roomcategory 
                          WHERE RoomTypeId = 1");

                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                      <th>
                        <?php echo $row['Title'] ?>
                      </th>

                      <td>
                        <?php echo $row['Available'] ?>
                      </td>
                  </tr>

                <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6 text-center  my-2 fs-6">

          <div class="card-header bg-info">
            <i class="fa-solid fa-table-columns"></i>
            <strong>Reservation List</strong>
          </div>
          <div class="row" >
            <div class="container"  style="overflow: auto; white-space: nowrap">
                <?php
                $result = mysqli_query($conn, "SELECT rr.Id, CONCAT(u.FirstName,' ', u.LastName) AS Name, u.Contact, roomrate.Title, rr.Arrival,rr.Departure
            FROM roomreservation rr
            LEFT JOIN user u ON u.Id = rr.GuestId
            LEFT JOIN roomrate ON roomrate.Id = rr.RoomRateId 
            WHERE rr.Status = 'Accepted' AND roomrate.RoomTypeId = 1");

                while ($row = mysqli_fetch_assoc($result)) {
                  echo ' 

                <div class="col card border-dark my-2" style=" display: inline-block;">
                  <div class="card-header" style="width: auto;">
                    <strong>' . $row['Name'] . '</strong>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <tbody>
                        
                        <tr>
                          <th class="d-flex" >Phone </th>
                          <td>' . $row['Contact'] . '</td>
                        </tr>
                        <tr>
                          <th class="d-flex"> Room Type </th>
                          <td>' . $row['Title'] . '</td>
                        </tr>
                        <tr>
                          <th class="d-flex">Arrival </th>
                          <td>' . $row['Arrival'] . '</td>
                        </tr>
                        <tr>
                          <th class="d-flex">Departure </th>
                          <td>' . $row['Departure'] . '</td>
                        </tr>
                        
                      </tbody>
                    </table>
                    <a href="function/hotel/assignroom.php?Id=' . $row['Id'] . '" class="btn btn-primary mb-1" style="width:95%"><i class="fa-solid fa-right-from-bracket"></i></i> Book</a>
                  </div>
                </div>
            ';
                }
                ?>
              </div>
            
          </div>





        </div>
      </div>


    </div>
  </section>


</div>


<script>
  $(document).ready(function() {
    displayData();
  });

  //display function
  function displayData() {
    var displayData = "true";
    $.ajax({
      url: "function/roomdisplay.php",
      type: 'POST',
      data: {
        displaySend: displayData
      },
      success: function(data, status) {
        $('#displayDataTable').html(data);
      }
    })
  }


  window.onscroll = function() {
    myFunction()
  };

  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;

  function myFunction() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
</script>

<?php include 'themes/footer.php'; ?>