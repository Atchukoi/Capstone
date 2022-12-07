<?php
include 'config.php';
error_reporting(0);

if (isset($_POST['submit'])) {
  $otp = mt_rand('10000', '99999');
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $bday = $_POST['bday'];
  $phone = $_POST['phone'];
  $company = $_POST['company'];
  $caddress = $_POST['caddress'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  $zip = $_POST['zip'];

  if ($password == $cpassword) {
    $sql = "SELECT * FROM tblguest WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO tblguest 
            (FirstName, LastName, Address, BirthDay, Phone, Company, CompanyAddress, Email, Password, OTP, Verify) 
            VALUES 
            ('$fname',' $lname','$address','$bday','$phone','$company','$caddress','$email','$password','$otp','0')";
      $result = mysqli_query($conn, $sql);
      if ($result) {

        $fname = "";
        $lname = "";

        $address = "";
        $bday = "";
        $phone = "";
        $company = "";
        $caddress = "";
        $email = "";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";

        header("Location: login.php?msg=Account Created Succesfuly, You May now Login");
      } else {
        echo "<script>alert('Ooops! Something went wrong.')</script>";
      }
    } else {
      echo "<script>alert('Ooops! Email already Exists.')</script>";
    }
  } else {
    echo "<script>alert('Ooops! Password does not matched.')</script>";
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
      background-image: url(./images/backgroundpage0.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      width: auto;
      height: auto;
    }

    .gradient-custom {
      /* fallback for old browsers */
      background: #f093fb;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
      font-size: 1rem;
      line-height: 2.15;
      padding-left: .75em;
      padding-right: .75em;
    }

    .card-registration .select-arrow {
      top: 13px;
    }
  </style>
</head>

<body>
  <section class="hero vh-100">
    <div class="container  h-100">

      <div class="row justify-content-center align-items-center h-100">

        <div class="col-12 col-lg-9 col-xl-7">

          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">

            <div class="card-body  p-md-5">
              <div class=" d-flex flex-row-reverse">
                <a href="index.php" class="btn-close btn-close-black p-2"></a>
              </div>
              <h3 class="mb-2 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
              <form action="" method="POST" class="form-login">

                <div class="row">
                  <div class="col-md-6 mb-2">

                    <div class="form-floating mb-2">
                      <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?php echo $fname; ?>" required>
                      <label>First Name</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-2">

                    <div class="form-floating mb-2">
                      <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $lname; ?>" required>
                      <label>Last Name</label>
                    </div>

                  </div>
                </div>

                <div class="row">

                  <div class="col-md-6 mb-2">

                    <div class="form-floating mb-2">
                      <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $address; ?>" required>
                      <label>Address</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-2">

                    <div class="form-floating mb-2">
                      <input type="number" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $phone; ?>" required>
                      <label>Phone Number</label>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-2 d-flex align-items-center">

                    <div class="form-floating mb-2">
                      <input type="date" name="bday" class="form-control" placeholder="Birthdate" value="<?php echo $bday; ?>" required>
                      <label>Birthdate</label>
                    </div>

                  </div>

                </div>

                <div class="row">
                  <!-- <div class="col-md-6 mb-2 pb-2">
                    <div class="row">
                      <label style="margin-left: 5px; color: red;">Optional</label>
                    </div>
                    <div class="row">
                      <div class="form-floating mb-2">
                        <input type="text" name="company" class="form-control" placeholder="Company" value="<?php echo $company; ?>">
                        <label style="margin-left: 10px;">Company </label>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6 mb-2 pb-2">
                    <div class="row">
                      <label style="margin-left: 5px; color: red;">Optional</label>
                    </div>
                    <div class="row">
                      <div class="form-floating mb-2">
                        <input type="text" name="caddress" class="form-control" placeholder="Company" value="<?php echo $caddress; ?>">
                        <label style="margin-left: 10px;">Company Address </label>
                      </div>
                    </div>

                  </div> -->







                </div>
                <div class="row">

                  <div class="col-md-4 mb-2">

                    <div class="form-floating mb-2">
                      <input type="email" name="email" class="form-control" placeholder="Email Adress" value="<?php echo $email; ?>" required>
                      <label>Email Adress</label>
                    </div>

                  </div>
                  <div class="col-md-4 mb-2">

                    <div class="form-floating mb-2">
                      <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
                      <label>Password</label>
                    </div>

                  </div>
                  <div class="col-md-4 mb-2">

                    <div class="form-floating mb-2">
                      <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
                      <label>Confirm Password</label>
                    </div>

                  </div>
                </div>

                <!-- <div class="form-check d-flex justify-content-start mb-4 pb-3">
                    <input class="form-check-input me-3" type="checkbox" value="" />
                    <label class="form-check-label text-black">
                      I do accept the <a href="#!" class="text-blue"><u>Terms and Conditions</u></a> of your
                      site.
                    </label>
                  </div> -->



                <div class="row text-center mt-5">
                  <button class="btn btn-primary gradient-custom-2 mb-3" style="width: 96%; margin: 0 auto" name="submit">
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>