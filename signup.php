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
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['cpassword']);
  $zip = $_POST['zip'];

  if ($password == $cpassword) {
    $sql = "SELECT * FROM user WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO user 
            (FirstName, LastName, Address, BirthDate, Contact, Email, Password,RoleId, OneTimePassword, IsVerified) 
            VALUES 
            ('$fname',' $lname','$address','$bday','$phone','$email','$password','3','$otp',0)";
      $result = mysqli_query($conn, $sql);
      if ($result) {

        

        header("Location: login.php?msg=Account Created Succesfuly, You May now Login");
      } else {
        echo "<script>alert('Ooops! Something went wrong.')</script>";
      }
    } else {
      echo "<script>alert('Ooops! Email already Exists.')</script>";
    }
  } else {
    echo "<script>alert('Ooops! Password does not matched.')</script>";
    $fname = "";
        $lname = "";
        $address = "";
        $bday = "";
        $phone = "";
        $email = "";
        $_POST['password'] = "";
        $_POST['cpassword'] = "";
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

              <form method="POST" class="row g-3 needs-validation" novalidate>

                <div class="row mb-3">

                  <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" onkeydown="return /[a-z]/i.test(event.key)" placeholder="" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" onkeydown="return /[a-z]/i.test(event.key)" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>

                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Contact</label>
                    <input type="tel" class="form-control" name="phone" id="contact" minlength="11" maxlength="11"  placeholder="09123456789" required>
                    <div class="invalid-feedback">
                      Contact Number is too short.
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" name="bday" id="bday" required>
                    <div class="invalid-feedback">
                      Please select your Birth Date.
                    </div>
                  </div>


                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label for="validationCustom03" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Street Name or Purok #, Brgy, Municipality or City, Province" required>
                    <div class="invalid-feedback">
                      Please input your address.
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please enter a valid email.
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label for="validationCustom05" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$">
                    <div class="invalid-feedback">
                      Minimum of eight characters, at least one letter, one number and one special character:.
                    </div>
                  </div>

                  <div class="col-md-4">
                  <label for="validationCustom05" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" name="cpassword" id="cpassword" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$">
                  <div class="invalid-feedback">
                  Minimum of eight characters, at least one letter, one number and one special character:.
                  </div>
                </div>

                </div>



               

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                      Agree to <a href="#">Terms and Conditions</a>
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
                </div>





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
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>