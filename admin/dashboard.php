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
<div style="background: rgb(255,255,255);
background: linear-gradient(183deg, rgba(255,255,255,1) 0%, rgba(163,163,163,1) 100%); height: 80vh;">

  <div class="card mb-4">
    <div class="card-header text-primary">
      <h4><i class="fa-solid fa-table-columns"></i>
        Hotel Dashboard</h4>
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

    <section class="" style="background-color: #ACBFA3">
      <div class="container-fluid  ">
        <div class="row p-2">
          <div class="col-md-8  ">
            <div class="container">
              <div class="row mt-2 mb-5 text-center">

                <div class="col-lg-3 col-md-6  mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary">
                    <div><i class="fa-solid fa-bed card-img-top border 
                    <?php
                    $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 1");
                    $srow = mysqli_fetch_assoc($sresult);
                    $Status = $srow['Status'];

                    if ($Status == 'Vacant') {
                      echo "bg-success";
                    } elseif ($Status == 'Maintenance') {
                      echo "bg-warning";
                    } elseif ($Status == 'Occupied') {
                      echo "bg-danger";
                    } else {
                      echo "bg-primary";
                    }
                    ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 1");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 1";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=1" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 1 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 1";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>


                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room102">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 2");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 2");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id =2 ";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=2" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 2 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 2";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room103">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 3");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 3");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 3";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=3" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 3 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 3";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room201">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 4");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 4");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 4";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=4" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 4 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 4";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>

                    </div>
                  </div>
                </div>


                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room202">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 5");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 5");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 5";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=5" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 5 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 5";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>
                    </div>
                  </div>
                </div>


                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room203">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 6");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 6");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 6";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=6" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 6 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 6";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>
                    </div>
                  </div>
                </div>


                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room301">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 7");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 7");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 7";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=7" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 7 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 7";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>










                      </p>
                    </div>
                  </div>
                </div>




                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room302">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 8");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 8");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 8";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=8" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 8 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 8";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>









                    </div>
                  </div>
                </div>


                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room303">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 9");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 9");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 9";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=9" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 9 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 9";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>









                    </div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room401">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 10");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 10");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 10";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=10" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 10 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 10";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>









                    </div>
                  </div>
                </div>


                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room402">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 11");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 11");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 11";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=11" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 11 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 11";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>









                    </div>
                  </div>
                </div>



                <div class="col-lg-3 col-md-6 gx-3 mb-3">
                  <div class="card border-dark" style="width: auto;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#room403">
                    <div><i class="fa-solid fa-bed card-img-top border <?php
                                                                        $sresult = mysqli_query($conn, "SELECT Status FROM tblroom WHERE Id = 12");
                                                                        $srow = mysqli_fetch_assoc($sresult);
                                                                        $Status = $srow['Status'];

                                                                        if ($Status == 'Vacant') {
                                                                          echo "bg-success";
                                                                        } elseif ($Status == 'Maintenance') {
                                                                          echo "bg-warning";
                                                                        } elseif ($Status == 'Occupied') {
                                                                          echo "bg-danger";
                                                                        } else {
                                                                          echo "bg-primary";
                                                                        }
                                                                        ?>" style="height: 100px; "></i></div>
                    <div class="card-body" style="height: 100px;">
                      <h5 class="card-title text-center fs-6">Room
                        <?php
                        $result = mysqli_query($conn, "SELECT Number FROM tblroom Where Id = 12");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Number'];
                        ?>
                      </h5>
                      <?php
                      $asql = "SELECT Status FROM tblroom WHERE Id = 12";
                      $aresult = mysqli_query($conn, $asql);
                      $arow = mysqli_fetch_assoc($aresult);
                      $status = $arow['Status'];
                      if ($status == 'Vacant') {
                      ?>
                        <a href="walkin.php?Id=12" class="btn btn-primary" style="width: 100%">Check-in</a>

                      <?php } elseif ($status == 'Occupied') { ?>


                        <a href="hotel.php?Id=<?php echo 12 ?>"><?php
                                                                $sql = "SELECT CONCAT(tblguest.FirstName, ' ' , tblguest.LastName) AS Name 
                          FROM tblroom 
                          LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id
                          WHERE tblroom.Id = 12";
                                                                $result = mysqli_query($conn, $sql);
                                                                $row = mysqli_fetch_assoc($result);
                                                                echo $row['Name'];
                                                                ?> </a>
                      <?php  } elseif ($status == 'Maintenance') { ?>
                        <label for="" class="form-label">Is Under Maintenance</label>
                      <?php } else { ?>
                        <label for="" class="form-label">Is Now Ready For Cleaning</label>
                      <?php } ?>









                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-2 ">

            <div class="row mb-3 ">
              <div class="col">
                <div class="card border-dark my-2">
                  <div class="card-header bg-info">
                    <i class="fa-solid fa-bed "></i><strong> Rooms</strong>
                  </div>
                  <div class="card-body-fluid">
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <th>Total:</th>
                          <td>12</td>

                        </tr>
                        <tr>
                          <th>Occupied</th>
                          <td>
                            <?php
                            $result = mysqli_query($conn, "SELECT COUNT(Status) AS Available FROM tblroom WHERE Status = 'Occupied'");
                            $data = mysqli_fetch_assoc($result);
                            echo $data['Available'];
                            ?>
                          </td>

                        </tr>
                        <tr>
                          <th>Available</th>
                          <td>
                            <?php
                            $result = mysqli_query($conn, "SELECT COUNT(Status) AS Available FROM tblroom WHERE Status = 'Vacant'");
                            $data = mysqli_fetch_assoc($result);
                            echo $data['Available'];
                            ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


            </div>

            <div class="row">
              <div class="col">
                <div class="card border-dark my-2">
                  <div class="card-header bg-info">
                    <i class="fa-solid fa-bed"></i><strong> Available</strong>
                  </div>
                  <div class="card-body-fluid">
                    <table class="table table-striped">
                      <tbody>
                        <tr>

                          <?php
                          $result = mysqli_query($conn, "SELECT TRT.Type,  IFNULL(TR.Count,0) AS Available 
                            FROM tblroomtype AS TRT
                            LEFT OUTER JOIN (SELECT RoomTypeId, COUNT(Status) AS Count FROM tblroom WHERE Status = 'Vacant' GROUP BY RoomTypeId)
                            TR ON TR.RoomTypeId = TRT.Id ");

                          while ($row = mysqli_fetch_assoc($result)) {

                          ?>
                            <th>
                              <?php echo $row['Type'] ?>
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


            </div>
          </div>


          <div class="col-md-2 text-center  my-2 fs-6">

            <div class="card-header bg-info">
              <i class="fa-solid fa-table-columns"></i>
              Reservation List
            </div>
            <div class="row overflow-scroll" style="height: 80vh;">
              <?php
              $result = mysqli_query($conn, "SELECT CONCAT(tblguest.FirstName, ' ', tblguest.LastName) AS Name, tblguest.Phone, tblroom.Number, tblreservation.Arrival, tblreservation.Departure
            FROM tblreservation
            JOIN tblroom ON tblroom.Id = tblreservation.RoomId
            JOIN tblguest ON tblguest.Id = tblreservation.GuestId 
            WHERE tblreservation.Status = 'Accepted'");

              while ($row = mysqli_fetch_assoc($result)) {
                echo ' <div class="row-md-2 mt-3 ">
              <div class="col mb-2">
                <div class="card border-dark">
                  <div class="card-header ">
                    <strong>' . $row['Name'] . '</strong>
                  </div>
                  <div class="card-body-fluid">
                    <table class="table">
                      <tbody>
                        
                        <tr>
                          <th class="d-flex" >Phone </th>
                          <td>' . $row['Phone'] . '</td>
                        </tr>
                        <tr>
                          <th class="d-flex">Room # </th>
                          <td>' . $row['Number'] . '</td>
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
                    
                  </div>
                </div>
              </div>
            </div>';
              }
              ?>
            </div>







          </div>
        </div>
      </div>
  </div>

  </section>
</div>

<?php include 'themes/footer.php'; ?>