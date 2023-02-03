<?php
include 'config.php';
$id = $_GET['id'];


if (isset($_POST['submit'])) {
    $Number = $_POST['Number'];
    $Type = $_POST['RoomType'];




    $sql = "UPDATE `room` SET 
    
    `Title`='$Number',
    `RoomCategoryId`='$Type'
    
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
    <!--JS Query CDN-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body style="background-color: rgba(237, 195, 238, 0.8);">



    <div class="container bg-light py-3 mt-5 " style="border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">

        <div class="row text-center my-5">
            <h1>Edit Room Details</h1>
        </div>
        <?php

        $sql = "SELECT r.Id, r.Title, rc.Title AS Type, rc.Id as TypeId, rc.PersonCount, rrpt.Rate, rr.Description
        FROM room r
        LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
        LEFT JOIN roomrate rr ON rr.RoomCategoryId = r.RoomCategoryId 
        LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
        WHERE r.Id = $id ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <?php
        $typesql = "SELECT * FROM roomcategory WHERE RoomTypeId = 1 ";
        $typeresult = mysqli_query($conn, $typesql);


        ?>

        <form method="post">
            <div class="row mb-3">
                <div class="col-lg-3">
                    <label for="Number" class="form-label">Room Name :</label>
                    <input type="text" name="Number" class="form-control" value="<?php echo $row['Title'] ?>">
                </div>


                <div class="col-lg-3">
                    <label for="Type" class="form-label">Room Category :</label>
                    <select class="form-select form-select-md  mb-3" id="RoomType" name="RoomType" aria-label=".form-select-lg example" onchange="fetchcategory()">
                        <option selected value="<?php echo $row['TypeId'] ?>"><?php echo $row['Type'] ?></option>
                        
                        <?php
                        while ($trow = mysqli_fetch_assoc($typeresult)) {
                            $roomtypeid = $trow['Id'];
                            $roomtype = $trow['Title'];

                            echo ' <option value= "' . $roomtypeid . '"> ' . $roomtype . ' </option> ';
                        }
                        ?>

                    </select>
                </div>
                <div class="col-lg-3">
                    <label for="Person" class="form-label">Person :</label>
                    <input type="text" id="Person" name="Person" class="form-control" value="<?php echo $row['PersonCount'] ?>" style="background-color: rgb(235,235,228)" readonly>
                </div>
                <div class="col-lg-3">
                    <label for="Rate" class="form-label">Cost :</label>
                    <div class="input-group">
                        <div class="input-group-text">₱</div>
                        <input type="text" id="Rate" name="Rate" class="form-control" value="<?php echo $row['Rate'] ?>" style="background-color: rgb(235,235,228)" readonly>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="Description" class="form-label">Room Description :</label>
                    <input type="text" id="Description" name="Description" class="form-control" value="<?php echo $row['Description'] ?>" style="background-color: rgb(235,235,228)" readonly>
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
<script>
    function fetchcategory() {
        var id = document.getElementById("RoomType").value;
        $.ajax({
            url: "fetchcategory.php",
            method: "POST",
            data: {
                x: id
            },
            dataType: "JSON",
            success: function(data) {
                document.getElementById("Person").value = data.PersonCount;
                document.getElementById("Rate").value = data.Rate;
                document.getElementById("Description").value = data.Description;
            }
        })
    }
</script>
<!--Bootsrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


</html>