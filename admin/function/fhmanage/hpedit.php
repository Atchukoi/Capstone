<?php include 'config.php';
$id = $_GET['id'];


?>
<?php
if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $Pax = $_POST['Pax'];
    $Time = $_POST['Time'];
    $Cost = $_POST['Cost'];
    $Exceeding = $_POST['Exceeding'];
    $Inclusion = $_POST['Inclusion'];



    $sql = "UPDATE `tblhallpackage` SET 
    
    `Name`='$Name',
    `Description`='$Description',
    `Pax`='$Pax',
    `Time`='$Time',
    `Cost`='$Cost',
    `Exceeding`='$Exceeding',
    `Inclusion`='$Inclusion'
    
    WHERE Id= $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../hallpackage.php?msg=$Name has been Updated succesfully!");
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

    $sql = "SELECT rr.Title, rr.Description AS Inclusion, rrpt.InitialTime,rrpt.Rate,rrpt.ExceedingRatePerHour, rc.Description
    FROM roomrate rr
    LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
    LEFT JOIN room r ON r.RoomTypeId = rr.RoomTypeID
    LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
    WHERE rr.Id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);



    ?>


    <div class="container bg-light py-3 mt-5 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">

        <div class="row text-center my-5">
            <h1>Edit Hall Packages</h1>
        </div>

        <form method="Post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="Name" class="form-label">Name :</label>
                    <input type="text" name="Name" class="form-control" value="<?php echo $row['Title'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="Description" class="form-label">Description :</label>
                    <input type="text" name="Description" class="form-control" value="<?php echo $row['Description'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                
                <div class="col-md-3">
                    <label for="Time" class="form-label">Time :</label>
                    <input type="text" name="Time" class="form-control" value="<?php echo $row['InitialTime'] ?>">
                </div>
                <div class="col-md-3">
                    <label for="Cost" class="form-label">Cost :</label>
                    <input type="text" name="Cost" class="form-control" value="<?php echo $row['Rate'] ?>">
                </div>
                <div class="col-md-3">
                    <label for="Exceeding" class="form-label">Exceeding :</label>
                    <input type="text" name="Exceeding" class="form-control" value="<?php echo $row['ExceedingRatePerHour'] ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-8">
                    <label for="Inclusion" class="form-label">Inclusion :</label>
                    <input type="text" name="Inclusion" class="form-control" value="<?php echo $row['Inclusion'] ?>">
                </div>
                <div class="col-md-2">
                    <button name="submit" class="btn btn-success mt-4" style="width: 100%;">Update</button>
                </div>
                <div class="col-md-2 mt-4">
                    <a type="button" class="btn btn-danger" style="margin:auto; width:100%;" href="../../hallpackage.php">Cancel</a>

                </div>
            </div>
        </form>
    </div>


</body>
<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>