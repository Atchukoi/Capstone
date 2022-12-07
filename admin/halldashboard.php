<?php
include 'themes/navbar.php';
include 'config.php';
?>

<div class="card ">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-table-columns"></i>
            Hall Dashboard </h4>
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

<div class="container-fluid pt-4" style="background-color: #ACBFA3; height:max-content">
    <div class="row ">
        <div class="col-lg-4 mb-5 ">
            <div class="card" style="width:95%; margin:auto;">
                <img src="../images/convention_center.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Function Hall 1 </h5>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="" class="form-label"><strong>Name:</strong></label>
                            </div>
                            <div class="col-sm-8">
                                <?php $sql = "SELECT  CONCAT(tblguest.FirstName,' ',tblguest.LastName) AS Name, tblfunctionhall.GuestId, tblfunctionhall.Event
FROM tblfunctionhall
LEFT JOIN tblguest ON tblfunctionhall.GuestId = tblguest.Id
WHERE tblfunctionhall.Id = 1";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <input type="text" class="form-control" value="<?php echo $row['Name'] ?>" disabled>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-2">
                                <label for="" class="form-label"><strong>Event:</strong></label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo $row['Event'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Button trigger modal -->
                        <a href="functionhall.php?Id=1" class="btn btn-primary mt-2" >
                            View Details
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-5">
            <div class="card" style="width:95%; margin:auto;">
                <img src="../images/convention_center.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Function Hall 2</h5>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="" class="form-label"><strong>Name:</strong></label>
                            </div>
                            <div class="col-sm-8">
                            <?php $sql = "SELECT CONCAT(tblguest.FirstName,' ',tblguest.LastName) AS Name, tblfunctionhall.GuestId, tblfunctionhall.Event
FROM tblfunctionhall
LEFT JOIN tblguest ON tblfunctionhall.GuestId = tblguest.Id
WHERE tblfunctionhall.Id = 2";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
 ?>
                                <input type="text" class="form-control" value="<?php echo $row['Name'] ?>" readonly>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-2">
                                <label for="" class="form-label"><strong>Event:</strong></label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo $row['Event'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Button trigger modal -->
                        <a href="functionhall.php?Id=2" class="btn btn-primary mt-2" >
                            View Details
                        </a>
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-5">
            <div class="card" style="width:95%; margin:auto;">
                <img src="../images/convention_center.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Ballroom Hall</h5>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2">
                                <label for="" class="form-label"><strong>Name:</strong></label>
                            </div>
                            <div class="col-sm-8">
                            <?php $sql = "SELECT CONCAT(tblguest.FirstName,' ',tblguest.LastName) AS Name, tblfunctionhall.GuestId, tblfunctionhall.Event
FROM tblfunctionhall
LEFT JOIN tblguest ON tblfunctionhall.GuestId = tblguest.Id
WHERE tblfunctionhall.Id = 3";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
 ?>
                                <input type="text" class="form-control" value="<?php echo $row['Name'] ?>" readonly>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-sm-2">
                                <label for="" class="form-label"><strong>Event:</strong></label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo $row['Event'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Button trigger modal -->
                        <a href="functionhall.php?Id=3" class="btn btn-primary mt-2" >
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'themes/footer.php'; ?>