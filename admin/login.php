<?php
include 'config.php';
error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM tbluser WHERE Username='$username' AND Password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    echo "<script>alert('Welcome! Succesfuly Logged In.')</script>";
    $row = mysqli_fetch_assoc($result);
    $_SESSION['adminid'] = $row['Id'];
    $_SESSION['role'] = $row['Role'];
    $_SESSION['admin'] = $row['FirstName'];
    
    
    header("Location: dashboard.php");
    
  } else {
    echo "<script>alert('Ooops! Username or Password is incorrect.')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>La Perfecta</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .cl {
            outline: 1px solid blue;
        }
    </style>
</head>

<body class="bg-secondary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>



                <div class="container ">
                    <div class="row-lg-5 text-center mt-1" style="height: 200px ;">
                        <img src="./assets/img/Logo1.png" class="rounded mx-auto d-block" style="height: 250px ;">
                    </div>
                    <p class="text-fluid text-center text-white mt-5" style="border-bottom: 2px solid white; margin-top: 10px;">La Perfecta Version 1.0</p>
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="#">
                                        <div class="form-floating mb-3">
                                            
                                            <input class="form-control" name="username" type="text" placeholder="name@example.com" required />
                                            <label for="inputEmail">Username</label>
                                            
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" type="password" placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-grid  mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="p bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; LaPerfecta.online 2022</div>
                        <div>
                            <?php 
                            echo "Today is " . date("d-m-Y"). " ". date("h:i:sa") ;
                            ?>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>