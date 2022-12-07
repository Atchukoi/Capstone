<?php 
include 'themes/navbar.php';
include 'config.php';
 ?>


<div class="card mb-4">
    <div class="card-header text-primary">
   <h4> <i class="fa-solid fa-file-lines"></i>
       Function Hall Collection </h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table-striped">
            <thead class="bg-info">
                <tr class="text-light">
                    <th>No.</th>
                    <th>Guest</th>
                    <th>Hall</th>
                    <th>Check-in</th>
                    <th>Extra Hours</th>
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
                $sql = "SELECT *, CONCAT(tblguest.FirstName,' ', tblguest.LastName) AS Name, tblhall.Name AS HallName
                FROM tblhalltransaction
                LEFT JOIN tblguest ON tblhalltransaction.GuestId = tblguest.Id
                LEFT JOIN tblhall ON tblhalltransaction.HallId = tblhall.Id";
                $result = mysqli_query($conn,$sql);
                $number = 1;
                while($row = mysqli_fetch_assoc($result)) {
                ?>    
                <tr>
                    <th style="width:50px"><?php echo $number ?></th>
                    <td style="width:100px"><?php echo $row['Name'] ?></td>
                    <td style="width:50px"><?php echo $row['HallName'] ?></td>
                    <td style="width:100px"><?php echo $row['Arrival'] ?></td>
                    <td style="width:100px"><?php echo $row['ExtraHours'] ?></td>
                    <td style="width:100px"><?php echo $row['Tender'] ?></td>
                    <td style="width:100px"><?php echo $row['GrandTotalDues'] ?></td>
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