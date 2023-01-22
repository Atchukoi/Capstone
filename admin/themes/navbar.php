<?php

session_start();
error_reporting();
include 'config.php';
$roleid = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>La Perfecta Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  <!--JS Query CDN-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="dashboard.php">La Perfecta</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#!">Settings</a></li>
          <li><a class="dropdown-item" href="#!">Activity Log</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">

          <!--====================================================================
                      Hotels
          ====================================================================== -->



          <div class="nav">

            <div class="sb-sidenav-menu-heading text-primary"> Hotel Rooms</div>

            <a class="nav-link" href="dashboard.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsReservations" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
              Reservations
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsReservations" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="addreservation.php">Add Reservation</a>
                <a class="nav-link" href="hrraccepted.php">Reservation Lists</a>
              </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsGuests" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
              Guests
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsGuests" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="activeguestlist.php">Active Guests</a>
                <a class="nav-link" href="archievedguest.php">Archieved Guests</a>
              </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsRooms" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-bed"></i></div>
              Rooms
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsRooms" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="roomlist.php">Lists of Rooms</a>
                <a class="nav-link" href="roommanage.php">Room Management</a>
              </nav>
            </div>

            <a class="nav-link" href="checkouts.php">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-forward"></i></div>
              Upcoming Check-outs
            </a>




            <a class="nav-link" href="reports.php">
              <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
              Hotel Reports
            </a>


            <!-- <a class="nav-link" href="misc.php">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-tv"></i></div>
              Miscellaneous
            </a> -->


            <!--====================================================================
                      Function Halls
          ====================================================================== -->

            <div class="sb-sidenav-menu-heading text-primary"> Function Halls</div>

            <a class="nav-link" href="halldashboard.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Hall Dashboard
            </a>



            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsHallReservations" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
              Reservations
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsHallReservations" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="halladd.php">Add Reservation</a>
                <a class="nav-link" href="fhrraccepted.php">Reservation Lists</a>
              </nav>
            </div>

            <a class="nav-link" href="hallreports.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Function Hall Report
            </a>



            <!--====================================================================
                               Admin
          ====================================================================== -->
            <div class="sb-sidenav-menu-heading text-primary">Admin</div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsHotelManage" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-gears"></i></div>
              Hotel Manage
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsHotelManage" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="roomdetails.php">Room Details</a>
                <a class="nav-link" href="roomtypes.php">Room Types</a>
                <a class="nav-link" href="extras.php">Extras</a>
                <a class="nav-link" href="userlist.php">User List</a>
              </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsHallManage" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-gears"></i></div>
              Hall Manage
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsHallManage" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <!-- <a class="nav-link" href="halldetails.php">Hall Details</a> -->
                <a class="nav-link" href="hallpackage.php">Hall Package</a>
                <a class="nav-link" href="rentals.php">Rental</a>
                <a class="nav-link" href="foodpackage.php">Food Package</a>
                <a class="nav-link" href="additional.php">Additional</a>
              </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsSystem" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
              System Config
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsSystem" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="#">Back-up Database</a>
                <a class="nav-link" href="settings.php">Web Page Settings</a>
              </nav>
            </div>


          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as: <?php $rresult=mysqli_query($conn,"SELECT * FROM role WHERE id = $roleid"); $rrow = mysqli_fetch_assoc($rresult);
          echo $rrow['Title'];  ?></div>
          <?php echo $_SESSION['admin'] ?>

        </div>
      </nav>
    </div>

    <div id="layoutSidenav_content">
      <main>