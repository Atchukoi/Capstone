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
                $sql = "SELECT *, CONCAT(tblguest.FirstName,' ', tblguest.LastName) AS Name, tblroom.Number
                FROM tblhoteltransaction
                LEFT JOIN tblguest ON tblhoteltransaction.GuestId = tblguest.Id
                LEFT JOIN tblroom ON tblhoteltransaction.RoomId = tblRoom.Id";
                $result = mysqli_query($conn,$sql);
                $number = 1;
                while($row = mysqli_fetch_assoc($result)) {
                ?>    
                <tr>
                    <th style="width:50px"><?php echo $number ?></th>
                    <td style="width:100px"><?php echo $row['Name'] ?></td>
                    <td style="width:50px"><?php echo $row['Number'] ?></td>
                    <td style="width:100px"><?php echo $row['Arrival'] ?></td>
                    <td style="width:100px"><?php echo $row['Departure'] ?></td>
                    <td style="width:100px"><?php echo $row['Tender'] ?></td>
                    <td style="width:100px"><?php echo $row['TotalDues'] ?></td>
                    <td style="width:100px"><?php echo $row['Discount'] ?></td>
                    <td style="width:100px"><?php echo $row['Changes'] ?></td>
                    <td style="width:100px"><?php echo $row['PaymentType'] ?></td>
                    <td style="width:100px">
                        
                        <button type="button" class="btn btn-danger"><i class="fa-solid fa-print"></i></button>
                    </td>
                </tr>
                <?php
                $number++;
             } ?>
               
            </tbody>
        </table>

        <?php include 'themes/footer.php'; ?>