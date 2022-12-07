<?php
include 'config.php';
$id = $_GET['id'];


if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Quantity = $_POST['Quantity'];
    $Cost = $_POST['Cost'];



    $sql = "UPDATE `tblextra` SET 
    
    `Name`='$Name',
    `Quantity`='$Quantity',
    `Cost`='$Cost' 
    WHERE Id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../extras.php?msg=$Name has been Updated Successfuly!");
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

    <div class="container bg-light py-3 mt-5 ">

        <div class="row text-center my-5">
            <h1>Edit Extras</h1>
        </div>
        <?php

        $sql = "SELECT * FROM `tblextra` WHERE Id= $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        ?>


        <div class="col">
            <form method="POST">
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <label for="Name" class="form-label">Name :</label>
                        <input type="text" name="Name" class="form-control" value="<?php echo $row['Name'] ?>">
                    </div>
                    <div class="col-lg-4">
                        <label for="Quantity" class="form-label">Quantity :</label>
                        <div class="input-group">
                                <div class="input-group-text">Pc</div>
                        <input type="text" name="Quantity" class="form-control" value="<?php echo $row['Quantity'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label for="Cost" class="form-label">Cost :</label>
                        <div class="input-group">
                                <div class="input-group-text">₱</div>
                        <input type="text" name="Cost" class="form-control" value="<?php echo $row['Cost'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-success mt-3 " type="submit" name="submit" style="width: 100%;"> <i class="fa-sharp fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="../../extras.php" class="btn btn-danger mt-3 " style="width: 100%;"> Cancel</a>
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