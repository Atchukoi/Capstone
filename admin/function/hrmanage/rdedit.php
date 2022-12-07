<?php
include 'config.php';
$id = $_GET['id'];


if (isset($_POST['submit'])) {
    $Number = $_POST['Number'];
    $Type = $_POST['Type'];




    $sql = "UPDATE `tblroom` SET 
    
    `Number`='$Number',
    `RoomTypeId`='$Type'
    
     
    
    WHERE Id = $id";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../roomdetails.php?msg=Room $Number has been updated successfully!");
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



    <div class="container bg-light py-3 mt-5 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">

        <div class="row text-center my-5">
            <h1>Edit Room Details</h1>
        </div>
        <?php

        $sql = "SELECT tblroom.Id, tblroom.Number,tblroomtype.Id AS RoomTypeId, tblroomtype.Type , tblroomtype.Description, tblroomtype.Rate, tblroomtype.Person
FROM tblroom
LEFT JOIN tblroomtype ON tblroom.RoomTypeId = tblroomtype.Id
WHERE tblroom.Id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        ?>

        <form method="post">
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="Number" class="form-label">Room Number :</label>
                    <input type="text" name="Number" class="form-control" value="<?php echo $row['Number'] ?>">
                </div>

                <?php
                $typesql = "SELECT *, tblroomtype.Id as RoomTypeId FROM tblroomtype";
                $typeresult = mysqli_query($conn, $typesql);


                ?>
                <div class="col-lg-3">
                    <label for="Type" class="form-label">Room Type :</label>
                    <select class="form-select form-select-md  mb-3" name="Type" aria-label=".form-select-lg example">
                        <option selected value=" <?php echo $row['RoomTypeId'] ?>"> <?php echo $row['Type']  ?> </option>
                        <?php
                        while ($type = mysqli_fetch_array($typeresult)) {
                            $roomtypeid = $type['RoomTypeId'];
                            $roomtype = $type['Type'];

                            echo ' <option value= "' . $roomtypeid . '"> ' . $roomtype . ' </option> ';
                        }
                        ?>

                    </select>
                </div>
                <div class="col-lg-3">
                    <label for="Person" class="form-label">Person :</label>
                    <input type="text" name="Person" class="form-control" value="<?php echo $row['Person'] ?>" style="background-color: rgb(235,235,228)" readonly>
                </div>
                <div class="col-lg-3">
                    <label for="Rate" class="form-label">Cost :</label>
                    <div class="input-group">
                        <div class="input-group-text">₱</div>
                        <input type="text" name="Rate" class="form-control" value="<?php echo $row['Rate'] ?>" style="background-color: rgb(235,235,228)" readonly>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="Description" class="form-label">Room Description :</label>
                    <input type="text" name="Description" class="form-control" value="<?php echo $row['Description'] ?>" style="background-color: rgb(235,235,228)" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-6 mt-4">
                    <button type="submit" class="btn btn-success me-3" style="margin:auto; width:100%;" name="submit">Update</button>
                </div>
                <div class="col-lg-6 mt-4">
                    <a type="button" class="btn btn-danger" style="margin:auto; width:100%;" href="../../roomdetails.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>


</body>
<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>