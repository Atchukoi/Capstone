<?php 
include 'themes/navbar.php';
include 'config.php'; ?>



<div class="card mb-4">
    <div class="card-header text-primary">
   <h4> <i class="fa-regular fa-calendar-check"></i>
        Upcoming Checkouts</h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-striped">
            <thead class="bg-info">
                <tr class="text-light">
                    <th>Name</th>
                    <th>Room No.</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $sql = "SELECT CONCAT(u.FirstName, ' ', u.LastName) AS Name, r.Title, t.ArrivalDateTime, t.DepartureDateTime
            FROM transaction t
            JOIN user u ON u.Id = t.UserId
            JOIN room r ON r.Id = t.RoomId
            WHERE r.RoomTypeId = 1;";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td style="width:250px"><?php echo $row['Name'] ?></td>
                    <td style="width:250px"><?php echo $row['Title'] ?></td>
                    <td style="width:250px"><?php echo $row['ArrivalDateTime'] ?></td>
                    <td style="width:250px"><?php echo $row['DepartureDateTime'] ?></td>

                </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php include 'themes/footer.php'; ?>