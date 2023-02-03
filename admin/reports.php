<?php
include 'themes/navbar.php';
include 'config.php';
?>


<div class="card mb-4">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-file-lines"></i>
            Hotel Collection </h4>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="container">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Generate Report
                    </div>
                    <div class="card-body" style="background-color: #F5F5F5;">
                        <div class="row">
                            <div class="col-md-2">

                                <label class="form-label">Room :</label>
                                <select class="form-select form-select-md  mb-3" name="bookroom" aria-label=".form-select-lg example" required>
                                    <option selected value="">Please Select a Room </option>
                                    <?php
                                    $asql = "SELECT r.Id, r.Title FROM room r WHERE  r.RoomTypeId = 1";
                                    $aresult = mysqli_query($conn, $asql);
                                    while ($arow = mysqli_fetch_array($aresult)) {
                                        $RoomId = $arow['Id'];
                                        $RoomTitle = $arow['Title'];

                                        echo ' <option value= "' . $RoomId . '">' . $RoomTitle . '</option> ';
                                    } ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Room Category :</label>
                                <select class="form-select form-select-md  mb-3" name="bookroom" aria-label=".form-select-lg example" required>
                                    <option selected value="">Please Select a Room </option>
                                    <?php
                                    $asql = "SELECT rc.Id, rc.Title FROM roomcategory rc WHERE  rc.RoomTypeId = 1";
                                    $aresult = mysqli_query($conn, $asql);
                                    while ($arow = mysqli_fetch_array($aresult)) {
                                        $RoomId = $arow['Id'];
                                        $RoomTitle = $arow['Title'];

                                        echo ' <option value= "' . $RoomId . '">' . $RoomTitle . '</option> ';
                                    } ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Month :</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>-- Select --</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Year :</label>
                                <input class="form-control" type="number" aria-label="Default select example">



                            </div>
                            <div class="col-md-2">
                                <label class="form-label">User Id :</label>
                                <input type="number" class="form-control" aria-label="Default select example">
                                   
                            </div>
                            <div class="col-md-2 mt-4">
                                <a href="#" class="btn btn-primary" style="width: 100%;" >Generate</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <table id="datatablesSimple" class="table table-striped">
            <thead class="bg-info">
                <tr class="text-light">
                    <th>No.</th>
                    <th>Guest</th>
                    <th>Room</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Payment Terms</th>
                    <th>Amount Tender</th>
                    <th>Deposit</th>
                    <th>Discount</th>
                    <th>Total</th>
                    <th>Change</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $sql = "SELECT th.Id, CONCAT(u.FirstName,' ',u.LastName) AS GuestName,r.Title,  th.ArrivalDateTime, th.DepartureDateTime, p.AmountTender,th.Deposit, th.Total, th.Discount, p.AmountChange, p.PaymentTerms
                FROM transactionhistory th
                LEFT JOIN user u ON u.Id = th.UserId
                LEFT JOIN room r ON r.Id = th.RoomId
                LEFT JOIN payments p ON p.TransactionId = th.Id
                WHERE r.RoomTypeId = 1";
                $result = mysqli_query($conn, $sql);
                $number = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <th style="width:50px"><?php echo $number ?></th>
                        <td style="width:100px"><?php echo $row['GuestName'] ?></td>
                        <td style="width:50px"><?php echo $row['Title'] ?></td>
                        <td style="width:100px"><?php echo $row['ArrivalDateTime'] ?></td>
                        <td style="width:100px"><?php echo $row['DepartureDateTime'] ?></td>
                        <td style="width:100px"><?php echo $row['PaymentTerms'] ?></td>
                        <td style="width:100px"><?php echo $row['AmountTender'] ?></td>
                        <td style="width:100px"><?php echo $row['Deposit'] ?></td>
                        <td style="width:100px"><?php echo $row['Discount'] ?></td>
                        <td style="width:100px"><?php echo $row['Total'] ?></td>
                        <td style="width:100px"><?php echo $row['PaymentTerms'] ?></td>
                        <td style="width:100px">

                            <a href="print.php?Id=<?php echo $row['Id']  ?>" type="button" class="btn btn-danger"><i class="fa-solid fa-print"></i></a>
                        </td>
                    </tr>
                <?php
                    $number++;
                } ?>

            </tbody>
        </table>

        <?php include 'themes/footer.php'; ?>