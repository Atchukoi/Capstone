<?php
session_start();
error_reporting(0);



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La Perfecta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css" />



</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="index.php" class="logo">
                    <img src="./images/RedLogo.png" alt="">
                </a>
                <div class="hamburger-menu">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times"></i>
                </div>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="rooms.php" class="nav-link">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a href="halls.php" class="nav-link">Halls</a>
                    </li>
                    <li class="nav-item">
                        <a href="aboutus.php" class="nav-link">About Us</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact</a>
                    </li> -->

                    <?php if (isset($_SESSION['Guest']) && !empty($_SESSION['Guest'])) {
                    ?>
                        <li class="dropdown">
                            <button href="#" class="sm-link"><i class="fa-solid fa-user"></i></button>

                            <div class="dropdown-content">
                                
                                <a href="#">Messages</a>
                                <a href="bookinglist.php?Id=<?php echo $_SESSION['GuestId'] ?>">Booking</a>
                                <a href="logout.php">Logout</a>
                            </div>
                        </li>
                        <div class="user" style="color: white; font-size:15px;">
                            <?php echo $_SESSION['Guest'] ?>
                        </div>




                    <?php } else { ?>
                        <li class="nav-item">
                            <button type="button" class="btn btn-gradient" id="loginbutton"><a href="login.php">Login</a> </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-gradient" id="loginbutton"><a href="signup.php">Signup</a> </button>
                        </li>
                    <?php } ?>


                </ul>
            </nav>
        </div>



    </header>