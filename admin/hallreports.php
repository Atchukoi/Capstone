<?php 
include 'themes/navbar.php';
include 'config.php';
 ?>


<div class="card mb-4">
    <div class="card-header text-primary">
   <h4> <i class="fa-solid fa-file-lines"></i>
       Function Hall Reports </h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table-striped">
            <thead class="bg-info">
                <tr class="text-light">
                    <th>No.</th>
                    <th>Guest</th>
                    <th>Room</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Tendered</th>
                    <th>Total Due</th>
                    <th>Discount</th>
                    <th>Change</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <?php 
                $sql = "SELECT th.Id, CONCAT(u.FirstName,' ',u.LastName) AS GuestName,r.Title,  th.ArrivalDateTime, th.DepartureDateTime, p.AmountTender, th.Total, th.Discount, p.AmountChange, p.PaymentTerms
                FROM transactionhistory th
                LEFT JOIN user u ON u.Id = th.UserId
                LEFT JOIN room r ON r.Id = th.RoomId
                LEFT JOIN payments p ON p.TransactionId = th.Id
                WHERE r.RoomTypeId = 2";
                $result = mysqli_query($conn,$sql);
                $number = 1;
                while($row = mysqli_fetch_assoc($result)) {
                ?>    
                <tr>
                    <th style="width:50px"><?php echo $number ?></th>
                    <td style="width:100px"><?php echo $row['GuestName'] ?></td>
                    <td style="width:50px"><?php echo $row['Title'] ?></td>
                    <td style="width:100px"><?php echo $row['ArrivalDateTime'] ?></td>
                    <td style="width:100px"><?php echo $row['DepartureDateTime'] ?></td>
                    <td style="width:100px"><?php echo $row['AmountTender'] ?></td>
                    <td style="width:100px"><?php echo $row['Total'] ?></td>
                    <td style="width:100px"><?php echo $row['Discount'] ?></td>
                    <td style="width:100px"><?php echo $row['AmountChange'] ?></td>
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