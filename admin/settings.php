<?php
include 'themes/navbar.php';
include 'config.php';
error_reporting(0);

if (isset($_POST['submit'])) {
    $Address = $_POST['Address'];
    $Phone = $_POST['Phone'];
    $Telephone = $_POST['Telephone'];
    $Twitter = $_POST['Twitter'];
    $Facebook = $_POST['Facebook'];
    $Instagram = $_POST['Instagram'];

    $sql = "UPDATE `tblsettings` SET 
    
    `Address`='$Address',
    `Phone`='$Phone',
    `Telephone`='$Telephone',
    `Twitter`='$Twitter',
    `Facebook`='$Facebook',
    `Instagram`='$Instagram'
     WHERE Id = 1";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

Webpage settings has been updated!

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    } else {
        echo "Failed: " . mysqli_connect_error($conn);
    }
}




?>
<div class="card mb-4">
    <div class="card-header">
        <h4 class="text-info"><i class="fa-solid fa-wrench"></i>
            Web Page Settings</h4>
    </div>
</div>

<div class="container " style="width:80%; border-width: 4px;
  border-style: solid;
  border-image: linear-gradient(to right, darkblue, darkorchid) 1">
    <!-- <div class="row">
        <label for="" class="form-label">Logo :</label>
    </div>
    <form>
        <div class="form-group">
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
    </form> -->
    <form method="POST">
        <div class="row mt-3 ">
            <div class="col-md-4  mt-2">
                <div class="row">
                    <label for="" class="form-label">Address :</label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="Address" style="width: 95%; margin-left:5px;" placeholder="Street, Barangay, Municipality, Province">

                </div>
            </div>

            <div class="col-md-4  mt-2">
                <div class="row">
                    <label for="" class="form-label">Cell Phone # :</label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="CellPhone" style="width: 95%; margin-left:5px;" placeholder="0912-3456-789 / 0945-9843-654">

                </div>
            </div>

            <div class="col-md-4  mt-2">
                <div class="row">
                    <label for="" class="form-label">Telephone # :</label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="Telephone" style="width: 95%; margin-left:5px;" placeholder="(078)-3215-565">

                </div>
            </div>
        </div>

        <div class="row mt-3 ">
            <div class="col-md-4  mt-2">
                <div class="row">
                    <label for="" class="form-label">Twitter :</label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="Twitter" style="width: 95%; margin-left:5px;" placeholder="www.example.com">

                </div>
            </div>

            <div class="col-md-4  mt-2">
                <div class="row">
                    <label for="" class="form-label">Facebook :</label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="Facebook" style="width: 95%; margin-left:5px;" placeholder="www.example.com">

                </div>
            </div>

            <div class="col-md-4  mt-2">
                <div class="row">
                    <label for="" class="form-label">Instagram :</label>
                </div>
                <div class="row">
                    <input type="text" class="form-control" name="Instagram" style="width: 95%; margin-left:5px;" placeholder="www.example.com">

                </div>
            </div>


        </div>
        <div class="row my-2">
            <div class="col">
                <button class="btn btn-success" type="submit" name="submit" style="float: right;"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Update</button>
            </div>
        </div>
    </form>
</div>
<?php include 'themes/footer.php'; ?>