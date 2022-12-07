<?php
include 'config.php';
error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'"; 
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows> 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    } else{
        echo "<script>alert('Ooops! Username or Password is incorrect.')</script>";
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
    <title>Login</title>
</head>
<body>
    

<body class="hero">
    <div id="myModal" class="modal">
        
        
        <form action="" method="POST" class="form-login">
        <div class="close-btn"><a href="index.php">&times;</a></div>
            <h2>Login</h2>

            <div class="form-element">
                <input type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>" required>
            </div>

            <div class="form-element">
                <input type="password" name="password" placeholder="Enter Password" value="<?php echo $_POST['password']; ?>" required>
            </div>

            <div class="form-element">
                <input type="checkbox" name="remember-me">
                <label for="password">Remember Me</label>
            </div>

            <div class="form-element">
                <button name="submit" >Sign In</button>
            </div>
            <div class="form-element">
                <a href="forgotpassword.php"> Forgot Password?</a>
            </div>
            <div class="form-element">
                <a href="signup.php"> Create a New Account</a>
            </div>
        </form>

        
</div>
</body>
</html>