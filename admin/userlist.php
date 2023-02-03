<?php
include 'themes/navbar.php';
include 'config.php';
?>

<div class="card mb-4">
    <div class="card-header text-primary">
      <h4>  <i class="fa-solid fa-bed"></i>
        User List </h4>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $Role = $_POST['Role'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Contact = $_POST['Contact'];
    $Address = $_POST['Address'];
    $Username = $_POST['Username'];
    $Password = md5($_POST['Password']);


    $sql = "SELECT * FROM user WHERE Email='$Email'";
    $result = mysqli_query($conn, $sql);

    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO user
        (RoleId, FirstName, LastName, Email, Contact, Address, Username, Password, IsVerified)
        VALUES
        ('$Role', '$FirstName', '$LastName', '$Email', '$Contact', '$Address', '$Username', '$Password', '1')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

'.$FirstName.' '.$LastName.' user has been added to the list

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        } else {
            echo "Failed: " . mysqli_connect_error($conn);
        }
    }

    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

' . $msg . '

<a type="button" class="btn-close" href="userlist.php" aria-label="Close"></a>
</div>';
    }
}
?>
<?php
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">

    ' . $msg . '
    
    <a type="button" class="btn-close" href="userlist.php" aria-label="Close"></a>
  </div>';
    }
    ?>


<div class="container-fluid">
    <form method="POST">
        <div class="container-fluid" style="border-bottom: solid black 5px;">
            <div class="row mb-3 mt-2">
                <div class="col-md-3 ">
                    <label for="Role" class="form-label">Role :</label>
                    <select class="form-select" name="Role" style="width: 100%;" required>
                        <option selected value="">Select User Role</option>
                        <option value="2">Receptionist</option>
                        <option value="2">Administrator</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="Username" class="form-label">Username :</label>
                    <input type="text" name="Username" class="form-control" placeholder="Username" required>
                </div>
                <div class="col-md-3">
                    <label for="Password" class="form-label">Password :</label>
                    <input type="text" name="Password" class="form-control" placeholder="Password" required>
                </div>
                <div class="col-md-3">
                    <label for="Contact" class="form-label">Contact :</label>
                    <input type="number" name="Contact" class="form-control" placeholder="e.g. 0912-345-6789" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="FirstName" class="form-label">First Name :</label>
                    <input type="text" name="FirstName" class="form-control" placeholder="e.g. Juan" required>
                </div>
                <div class="col-md-4">
                    <label for="LastName" class="form-label">Last Name :</label>
                    <div class="row">
                        <input type="text" name="LastName" class="form-control" placeholder="e.g. Cruz" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Email" class="form-label">Email :</label>
                    <div class="input-group">
                                <div class="input-group-text">@</div>
                    <input type="email" name="Email" class="form-control" placeholder="e.g. johndoe@gmail.com" required>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-lg-10">
                    <label for="Address" class="form-label">Address :</label>
                    <input type="text" name="Address" class="form-control" placeholder="Street, Barangay, Municipality, Province">
                </div>
                <div class="col-md-2">
                    <button name="submit" class="btn btn-success mt-4" style="width: 100%; height:50px"><i class="fa-sharp fa-solid fa-floppy-disk"></i> Submit</button>
                </div>
            </div>
        </div>
    </form>


    <div class="row">
        <div class="col">
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped table-responsive">
                    <thead class="bg-info">
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql =
                            "SELECT u.Id, CONCAT(FirstName,' ' , LastName) AS Name, u.Email, u.Address, u.Contact, u.Username, u.Password, r.Title
                            FROM user u
                            LEFT JOIN role r ON r.Id = u.RoleId
                            WHERE IsVerified = 1  ";
                        $number = 1;
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <th><?php echo $number ?></th>
                                <td><?php echo $row['Title'] ?></td>
                                <td><?php echo $row['Name'] ?></td>
                                <td><?php echo $row['Email'] ?></td>
                                <td><?php echo $row['Address'] ?></td>
                                <td><?php echo $row['Contact'] ?></td>
                                <td><?php echo $row['Username'] ?></td>
                                <td><?php echo $row['Password'] ?></td>
                                <td>
                                    <a href="function/hrmanage/useredit.php?id=<?php echo $row['Id'] ?>" class="btn btn-secondary mb-1"><i class="fa-solid fa-pen-to-square" ></i> Edit</a>
                                    <a href="function/hrmanage/userdelete.php?id=<?php echo $row['Id'] ?>" class="btn btn-danger mb-1"><i class="fa-solid fa-trash-can" ></i> Delete</a>
                                </td>
                            </tr>

                        <?php
                            $number++;
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>


<?php include 'themes/footer.php'; ?>