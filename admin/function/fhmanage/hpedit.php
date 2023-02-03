<?php include 'config.php';
$id = $_GET['id'];
$pid = $_GET['pid'];


?>
<?php
if (isset($_POST['submit'])) {
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $HallType = $_POST['HallType'];
   
    $Time = $_POST['Time'];
    $Cost = $_POST['Cost'];
    $Exceeding = $_POST['Exceeding'];



    $sql = "UPDATE `roomratepricetrail` SET `IsActive`= 0 WHERE Id = $pid";
    $result = mysqli_query($conn, $sql);
   

   
    
    $csql = "INSERT INTO `roomratepricetrail`
    (`RoomRateId`, `Rate`, `InitialTime`, `ExceedingRatePerHour`, `IsActive`) 
    VALUES 
    ('$id','$Cost','$Time','$Exceeding','1')";
    $cresult = mysqli_query($conn, $csql);
    $RRPTLastId = mysqli_insert_id($conn);

    $bsql = "UPDATE `roomrate` SET 
    `Title`='$Name',
    `Description`='$Description',
    `RoomCategoryId`='$HallType',
    `RoomPriceTrailId`='$RRPTLastId' WHERE Id = $id";
    $bresult = mysqli_query($conn, $bsql);

    if ($bresult) {
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

    $sql = "SELECT rr.Id, rr.Title,rc.Id as RoomCategoryId, rc.Title AS RcTitle, rc.Description, rrpt.InitialTime, rrpt.Rate, rrpt.ExceedingRatePerHour, rr.Description AS Inclusion
    FROM roomrate rr
    LEFT JOIN roomcategory rc ON rc.Id = rr.RoomCategoryId
    LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
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
        <?php
$typesql = "SELECT * FROM roomcategory WHERE RoomTypeId = 2 ";
$typeresult = mysqli_query($conn, $typesql);


?>

<form method="Post">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="Name" class="form-label">Name :</label>
                    <input type="text" name="Name" class="form-control" autofill="off" value="<?php echo $row['Title'] ?>" placeholder="e.g. 80 Pax - Function Hall Package B">
                </div>
                <div class="col-md-6">
                    <label for="Description" class="form-label">Description :</label>
                    <input type="text" name="Description" class="form-control" value="<?php echo $row['Inclusion'] ?>" placeholder="e.g. High-Quality Sound with Full Lights Par Led Lights Tables with Cloth & Tiffany Chairs With Foam">
                </div>
            </div>
            <div class="row mb-3">
                
                <div class="col-md-3">
                    <label for="Pax" class="form-label">Hall Category:</label>
                    <select class="form-select" name="HallType" aria-label="Default select example"  required> 
                    <option selected value="<?php echo $row['RoomCategoryId'] ?>"><?php echo $row['RcTitle'] ?></option>
                        <?php
                        while ($trow = mysqli_fetch_assoc($typeresult)) {
                            $roomtypeid = $trow['Id'];
                            $roomtype = $trow['Title'];

                            echo ' <option value= "' . $roomtypeid . '"> ' . $roomtype . ' </option> ';
                        }
                        ?>

                    </select>
                </div>

                <div class="col-md-3">
                    <label for="Time" class="form-label">Initial Time :</label>
                    <div class="input-group">

                        <input type="number" name="Time" min="1" class="form-control" value="<?php echo $row['InitialTime'] ?>"  placeholder="e.g. 4">
                        <div class="input-group-text">hours</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="Cost" class="form-label">Rate :</label>
                    <div class="input-group">
                        <div class="input-group-text">₱</div>
                        <input type="number" name="Cost" min="1" class="form-control" value="<?php echo $row['Rate'] ?>"  placeholder="e.g. 10000">
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="Exceeding" class="form-label">Rate per Extra hour :</label>
                    <div class="input-group">
                        <div class="input-group-text">₱</div>
                        <input type="number" name="Exceeding" min="1" class="form-control" value="<?php echo $row['ExceedingRatePerHour'] ?>"  placeholder="e.g. 1000">
                    </div>
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-lg-6 mt-4">
                    <button type="submit" class="btn btn-success me-3" style="margin:auto; width:100%;" name="submit">Update</button>
                </div>
                <div class="col-lg-6 mt-4">
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