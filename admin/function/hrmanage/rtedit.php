<?php
include 'config.php';
$id = $_GET['id'];


if (isset($_POST['submit'])) {
    $Type = $_POST['Type'];
    $Description = $_POST['Description'];
    $Person = $_POST['Person'];
    


    $sql = "UPDATE `roomcategory` SET 
    
    `Title`='$Type',
    `Description`='$Description',
    `PersonCount`='$Person'
    WHERE Id= $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../roomtypes.php?msg=$name has been Updated succesfully!");
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
    <?php

    $sql = "SELECT * FROM `roomcategory` WHERE Id= $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);



    ?>


    <div class="container bg-light py-3 mt-5 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">

        <div class="row text-center my-5">
            <h1>Edit Room Type Details</h1>
        </div>
        <form method="POST">
            <div class="row mb-3">
                <div class="col-lg-4">
                    <label for="Type" class="form-label">Room Type :</label>
                    <input type="text" name="Type" class="form-control" value="<?php echo $row['Title'] ?>">
                </div>
                
                <div class="col-lg-4">
                    <label for="Person" class="form-label">Number of Person :</label>
                    <input type="text" name="Person" class="form-control" value="<?php echo $row['PersonCount'] ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="Description" class="form-label">Room Description :</label>
                    <input type="text" name="Description" class="form-control" value="<?php echo $row['Description'] ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-6 mt-4">
                    <button type="submit" class="btn btn-success me-3" style="margin:auto; width:100%;" name="submit">Update</button>
                </div>
                <div class="col-lg-6 mt-4">
                    <a type="button" class="btn btn-danger" style="margin:auto; width:100%;" href="../../roomtypes.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>


</body>
<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>