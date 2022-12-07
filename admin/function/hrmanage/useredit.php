<?php
include 'config.php';
$id = $_GET['id'];
$role = $_GET['role'];

if (isset($_POST['submit'])) {
    $Role = $_POST['Role'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Contact = $_POST['Contact'];
    $Address = $_POST['Address'];
    $Username = $_POST['Username'];
    $Password = ($_POST['Password']);


    $sql = "UPDATE `tbluser` SET 
    
    `Role`='$Role',
    `FirstName`='$FirstName',
    `LastName`='$LastName',
    `Email`='$Email',
    `Contact`='$Contact',
    `Address`='$Address',
    `Username`='$Username',
    `Password`='$Password'
    
     WHERE Id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../userlist.php?msg=$FirstName $LastName Account has been Updated succesfully");
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Perfecta</title>
    <!--Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body style="background-color: rgba(237, 195, 238, 0.8);">

    <div class="container bg-light  mt-5 " style="border-width: 4px; border-style: solid; border-image: linear-gradient(to right, darkblue, darkorchid) 1">

        <div class="row text-center py-2">
            <h1>Edit User Account</h1>
            
        </div>


        <?php

        $sql = "SELECT * FROM `tbluser` WHERE Id= $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    
       
       
        ?>


        <div class="col">
            <form method="POST">
                <div class="container">
                    <div class="row mb-3 mt-2">
                        <div class="col-md-3 ">
                            <label for="Role" class="form-label">Role :</label>
                            <select class="custom-select" name="Role" style="width: 100%;">
                                <?php
                                echo "<option value=" . $role. "> " . $role . "</option>";
                                ?>
                                <option value="Receptionist">Receptionist</option>
                                <option value="Administrator">Administrator</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="Username" class="form-label">Username :</label>
                            <input type="text" name="Username" class="form-control" placeholder="Username" value="<?php echo $row['Username'] ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="Password" class="form-label">Password :</label>
                            <input type="text" name="Password" class="form-control" placeholder="Password" value="<?php echo $row['Password'] ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="Contact" class="form-label">Contact :</label>
                            <input type="text" name="Contact" class="form-control" placeholder="e.g. 0912-345-6789" value="<?php echo $row['Contact'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="FirstName" class="form-label">First Name :</label>
                            <input type="text" name="FirstName" class="form-control" placeholder="e.g. Juan" value="<?php echo $row['FirstName'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="LastName" class="form-label">Last Name :</label>
                            <div class="row">
                                <input type="text" name="LastName" class="form-control" placeholder="e.g. Cruz" value="<?php echo $row['LastName'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="Email" class="form-label">Email :</label>
                            <input type="email" name="Email" class="form-control" placeholder="e.g. johndoe@gmail.com" value="<?php echo $row['Email'] ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-8">
                            <label for="Address" class="form-label">Address :</label>
                            <input type="text" name="Address" class="form-control" placeholder="Street, Barangay, Municipality, Province" value="<?php echo $row['Address'] ?>" required>
                        </div>
                        <div class="col-md-2">
                            <button name="submit" class="btn btn-success mt-4" style="width: 100%; height:40px"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Update</button>
                        </div>
                        <div class="col-md-2">
                        <a href="../../userlist.php" class="btn btn-danger mt-4" style="width: 100%; height:40px"> Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    </div>
    </div>




    </div>


</body>
<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>