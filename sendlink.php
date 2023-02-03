<?php
include 'config.php';
$Id = $_GET['Id'];






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Perfecta</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body style="background-color: rgb(211,211,211)">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-5" style="margin: auto;">
                <div class="card ">
                    <div class="card-header text-center fs-3 bg-info">
                        Paymongo Online Payment
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <?php
                                $sql ="SELECT *, CONCAT(u.FirstName,' ',u.LastName) as GuestName, u.Email
                                FROM roomreservation rr 
                                LEFT JOIN user u ON rr.GuestId = u.Id
                                WHERE rr.Id = $Id";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $Arrival = $row['Arrival'];
                                $Departure = $row['Departure'];
                                $Email = $row['Email'];
                                $Code = $row['Code'];
                                $text = 
"This message is to confirm that the reservation you have made for the following dates'.$Arrival.' to '.$Departure.' with a reservation code of ($Code) at La Perfecta Convention Center, Villas and Resort in Daramuangan Norte, San Mateo, Isabela. 

We like to inform you that the reservation you made is not yet confirmed. A reminder that the reservation have not been paid in 50% down payment but this time be canceled without any further correspondence from La Perfecta.

Deposit can be paid or transfered online via this link provided below :

If there is anything you want to add, Please let us know so that we can make the arrangement.";
                                ?>

                            </div>
                            <div class="row my-3">
                                <form method="POST" action="send.php">
                                    <div class="col mb-2">
                                        <label for="" class="form-label">Email :</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $row['Email'] ?>">
                                    </div>
                                    <div class="col mb-2">
                                        <label for="" class="form-label">Paymongo Link :</label>
                                        <input type="text" name="link" class="form-control">
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col">

                                    <div class="form-floating ">
                                        <textarea class="form-control" placeholder="Leave a comment here" name="message" style="height: 300px" ><?php echo htmlspecialchars($text); ?></textarea>
                                        <label for="floatingTextarea2">Message</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer text-muted ">
                        <div class="row justify-content-end">


                            <div class="col-sm-2">
                                <a href="admin/hrrpending.php"  class="btn btn-danger" style="width: 100%;">Cancel</a>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" name="submit" class="btn btn-success" style="width: 100%;">Send Email</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>