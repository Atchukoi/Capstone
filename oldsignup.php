<?php
include 'config.php';
error_reporting(0);

if(isset($_POST['submit'])) {
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
       $sql= "SELECT * FROM user WHERE name='$name'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows> 0){
            $sql = "INSERT INTO user (name, username, password) VALUES ('$name','$username','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>alert('Success! Registration Completed.')</script>";
                $name = "";
                $username = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else{
                echo "<script>alert('Ooops! Something went wrong.')</script>";
            }
        } else {
            echo "<script>alert('Ooops! Name already Exists.')</script>";
        } 
        } else {
            echo "<script>alert('Ooops! Password does not matched.')</script>";
        }
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Signup</title>
</head>

<body class="hero">
    <div id="myModal" class="modal">
        
        
        <form action="" method="POST" class="form-login">
        <div class="close-btn"><a href="index.php">&times;</a></div>
            <h2>Registration Form</h2>

            <div class="form-element">
                <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" required>
            </div>

            <div class="form-element">
                <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
            </div>

            <div class="form-element">
                <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
            </div>

            <div class="form-element">
                <input type="password" name="cpassword" placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>

            <div class="form-element">
                <input type="checkbox" name="remember-me">
                <label for="password">I accept Term and Agreement</label>
            </div>

            <div class="form-element">
                <button name="submit" >Register</button>
            </div>
            
            <div class="form-element">
                <p>Already have an account? <a id="back" href="login.php">Click Here</a></p>
            </div>
        </form>
</div>

</body>
</html>