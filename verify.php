<?php
include 'config.php';
error_reporting();
session_start();
$Id = $_GET['Id'];

if (isset($_POST['submit'])) {
    $OTP = $_POST['OTP'];

    $sql = "SELECT OTP From tblguest WHERE  Id = $Id AND OTP = $OTP Limit 1";
    $result = mysqli_query($conn,$sql);
    $usql = mysqli_query($conn,"SELECT * FROM tblguest WHERE Id=$Id");
    $urow = mysqli_fetch_assoc($usql);

    if ($result->num_rows > 0) {
        $gsql= "UPDATE tblguest SET `OTP`= '0', `Verify`= '1' ";
        $gresult = mysqli_query($conn,$gsql);
        $_SESSION['Guest'] = $urow['FirstName'];
        $_SESSION['GuestId'] = $urow['Id'];
        header("Location: index.php");
    
    } else {
        echo "<script>alert('Ooops! OTP does not matched.')</script>";
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
                    <img src="./images/Logo1.png" style="width: 300px" alt="logo" />
                  </div>

                  <form action="" method="POST" class="form-login">
                    
                   
                    <div class="row">
                      <div class="col-lg-9">
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example11">Get your OTP and Check your Email :</label>
                          <input type="number" name="OTP" class="form-control" placeholder="Enter your 5 digit OTP"  required>
                        </div>
                      </div>
                      <div class="col-md-3 mt-4">
                        <a href="otp.php?Id=<?php echo $Id ?>" class="btn btn-primary">Get OTP</a>
                      </div>
                    </div>
                    
                    <div class="row text-center">
                      <button class="btn btn-primary gradient-custom-2 mb-3 d-grid" name="submit">
                        Submit
                      </button>
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