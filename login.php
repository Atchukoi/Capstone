<?php
include 'config.php';
error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM user WHERE Email='$email' AND Password='$password'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {
    echo "<script>alert('Welcome! Succesfuly Logged In.')</script>";
    $row = mysqli_fetch_assoc($result);
    $Id = $row['Id'];
      $_SESSION['Verify'] = $row['IsVerified'];
      
      


    if ($_SESSION['Verify'] == 0) {
      header("Location: verify.php?Id=$Id");
    } else {
      header("Location: index.php");
      $_SESSION['Guest'] = $row['FirstName'];
      $_SESSION['GuestId'] = $row['Id'];
     
    } 
      
  } else{
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <style>
    .hero {
      background-image: url(./images/backgroundpage1.jpg);
      width: 100%;
      height: 100vh;
      background-size: cover;
    }

    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right,
          #ee7724,
          #d8363a,
          #dd3675,
          #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right,
          #ee7724,
          #d8363a,
          #dd3675,
          #b44593);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: 0.3rem;
        border-bottom-right-radius: 0.3rem;
      }
    }
  </style>
</head>

<body>
  <section class="hero h-100 gradient-form">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-5">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col">
                <div class=" d-flex flex-row-reverse">
                  <a href="index.php" class="btn-close btn-close-black p-2"></a>
                </div>
                <div class="card-body  mx-md-4">
                  <div class="text-center">
                    <img src="./images/Logo.jpeg" style="width: 300px" alt="logo" />
                  </div>

                  <form action="" method="POST" class="form-login">
                    <?php if (isset($_GET['msg'])) {
                      $msg = $_GET['msg'];
                      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

                       ' . $msg . '
    
                        <a type="button" class="btn-close" data-bs-dismiss="alert"  aria-label="Close"></a>
                       </div>';
                    }
                    ?>

                    <div class="row">
                      <div class="col">
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example11">Email Address</label>
                          <input type="text" name="email" class="form-control" placeholder="Enter Email Address" value="<?php echo $email; ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example22">Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php echo $_POST['password']; ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row text-center">
                      <button class="btn btn-primary gradient-custom-2 mb-3 d-grid" name="submit">
                        Log in
                      </button>
                    </div>
                    <!-- <div class="row">
                      <div class="col">
                        <div class="text-center pt-1 mb-5 pb-1">
                          <a class="text-muted" href="#!">Forgot password?</a>
                        </div>
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="col">
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Don't have an account?</p>
                          <a href="signup.php" class="btn btn-outline-danger">Create New</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>