<?php
include 'config.php';
session_start();
$Id = $_GET['Id'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Perfecta</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <!--JS Query CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body style="background-color:lightgray ;">
    <div class="container-fluid" >
        <div class="row mt-5 ">
            <div class="col-sm-3 offset-md-9">
                <a href="index.php" class="btn btn-danger" style="width:100%"><i class="fa-solid fa-share"></i> Go Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-white text-center fs-5">
                        Hotel Room Reservations
                    </div>
                    <div class="card-body text-center">
                        <table class="table table-striped">
                            <thead class="bg-">
                                <th scope="col">ID.</th>
                                <th scope="col">Room Number</th>
                                <th scope="col">Arrival</th>
                                <th scope="col">Departure</th>
                                <th scope="col">Status</th>
                                <th scope="col">Reservation Code</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT tblroom.Number, tblreservation.Arrival, tblreservation.Departure, tblreservation.Status, tblreservation.Code, tblreservation.Id AS ReservationId
                                FROM tblreservation
                                LEFT JOIN tblroom ON tblreservation.RoomId = tblroom.Id
                                LEFT JOIN tblguest  ON tblreservation.GuestId = tblguest.Id
                                WHERE tblguest.Id = $Id ";
                                $number=1;

                                $result = mysqli_query($conn,$sql);
                                while ($row = mysqli_fetch_assoc($result)){
                                
                                ?>
                                <tr>
                                    <th><?php echo $number ?></th>
                                    <td><?php echo $row['Number'] ?></td>
                                    <td><?php echo $row['Arrival'] ?></td>
                                    <td><?php echo $row['Departure'] ?></td>
                                    <td><?php echo $row['Status'] ?></td>
                                    <td><?php echo $row['Code'] ?></td>
                                    <td>
                                        <?php 
                                        if ($row['Status'] == 'Accepted') {
                                        ?>  
                                        <a type="button" class="btn btn-secondary" href=""><i class="fa-solid fa-magnifying-glass"></i> View</a>
                                        <?php } else { ?>
                                        <a href="deleterr.php?Id=<?php echo $row['ReservationId'] ?>" class="btn btn-danger" href=""><i class="fa-solid fa-trash"></i> Cancel</a>
                                    </td>
                                </tr>

                                <?php $number++;  } } ?>
                                
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col">
            <div class="card mt-5 ">
                    <div class="card-header bg-primary text-white text-center fs-5">
                      Function Hall Reservations
                    </div>
                    <div class="card-body text-center">
                        <table  class="table table-striped">
                            <thead >
                                <th >ID.</th>
                                <th >Hall Name</th>
                                <th >Arrival</th>
                                <th >Event</th>
                                <th >Status</th>
                                <th >Reservation Code</th>
                                <th >Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT tblhall.Name, tblhallreservation.Arrival, tblhallreservation.Event, tblhallreservation.Status, tblhallreservation.Code, tblhallreservation.Id as HallReservationId
                                FROM tblhallreservation 
                                LEFT JOIN tblhall ON tblhallreservation.HallId = tblhall.Id
                                WHERE tblhallreservation.GuestId = $Id";
                                $number=1;

                                $result = mysqli_query($conn,$sql);
                                while ($row = mysqli_fetch_assoc($result)){
                                
                                ?>
                                <tr>
                                    <th><?php echo $number ?></th>
                                    <td><?php echo $row['Name'] ?></td>
                                    <td><?php echo $row['Arrival'] ?></td>
                                    <td><?php echo $row['Event'] ?></td>
                                    <td><?php echo $row['Status'] ?></td>
                                    <td><?php echo $row['Code'] ?></td>
                                    <td>
                                    <?php 
                                        if ($row['Status'] == 'Accepted') {
                                        ?>  
                                        <a  class="btn btn-secondary" ><i class="fa-solid fa-magnifying-glass"></i> View</a>
                                        <?php } else { ?>
                                    <a  type="button" class="btn btn-secondary"><i class="fa-solid fa-magnifying-glass"></i> View</a>
                                    <a href="deletehr.php?Id=<?php echo $row['HallReservationId'] ?>" type="button" class="btn btn-danger" ><i class="fa-solid fa-trash"></i> Cancel</a>
                                    
                                    </td>
                                </tr>

                                <?php $number++;  } } ?>
                                
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>







</body>
<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<!--Table / Ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script src="extensions/resizable/bootstrap-table-resizable.js"></script>

</html>