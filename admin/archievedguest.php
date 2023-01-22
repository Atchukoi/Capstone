<?php 
include 'themes/navbar.php'; 
include 'config.php';
?>
<div class="card mb-4">
    <div class="card-header text-primary">
        <h4><i class="fa-solid fa-box-archive"></i>
        Archieved Guest List </h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table-striped ">
            <thead class="bg-info">
                <tr class="text-light">
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Checked-Out Date</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                $sql = "SELECT CONCAT(u.FirstName,' ',u.LastName) AS GuestName, u.Contact, t.DepartureDateTime
                FROM transactionhistory t
                LEFT JOIN user u ON u.Id = t.UserId
                ";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)) {
                ?>    
                <tr>
                    <td style="width:600px"><?php echo $row['GuestName'] ?></td>
                    <td style="width:200px"><?php echo $row['Contact'] ?></td>
                    <td style="width:200px"><?php echo $row['DepartureDateTime'] ?></td>
                </tr>
                
            <?php } ?>

            </tbody>
        </table>
        <?php include 'themes/footer.php'; ?>