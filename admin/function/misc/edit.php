<?php
include 'config.php';
$id = $_GET['id'];


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $cost = $_POST['cost'];



    $sql = "UPDATE `tblmisc` SET 
    
    `Description`='$description',
    `Name`='$name',
    `Quantity`='$quantity',
    `Cost`='$cost' 
    WHERE Id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../misc.php?msg=$name  has been Updated Succesfully");
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
    <title>Document</title>
    <!--Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body style="background-color: rgba(237, 195, 238, 0.8);">

    <div class="container bg-light py-3 mt-5 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">

        <div class="row text-center my-5">
            <h1>Edit Miscellaneous</h1>
        </div>
        <?php

        $sql = "SELECT * FROM `tblmisc` WHERE Id= $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);



        ?>


        <div class="col">
            <form method="POST">

                <div class="row">
                    <div class="col-lg-6">
                        <label class="form-label mt-2"><strong>Misc :</strong></label>
                        <input type="text" class="form-control text-center" name="name" placeholder="e.g. Sphagetti" value="<?php echo $row['Name'] ?>">
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label mt-2">Description :</label>
                        <input type="text" class="form-control text-center" name="description" placeholder="e.g. Solo Plate" value="<?php echo $row['Description'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="form-label mt-2">Quantity :</label>
                        <div class="input-group">
                                <div class="input-group-text">Pc</div>
                        <input type="text" class="form-control text-center" name="quantity" placeholder="e.g. 2" value="<?php echo $row['Quantity'] ?>">
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label mt-2">Cost :</label>
                        <div class="input-group">
                                <div class="input-group-text">₱</div>
                        <input type="text" class="form-control text-center" name="cost" placeholder="e.g. 250" value="<?php echo $row['Cost'] ?>">
                    </div>
                    </div>
                </div>




                <div class="row">



                    <button class="btn btn-success mt-4 " type="submit" name="submit" style="width:20%; margin:auto;"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Update</button>
                    <a href="../../misc.php" class="btn btn-danger mt-4 " style="width:20%; margin:auto;"> Cancel</a>
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