<?php
include 'themes/navbar.php';
include 'config.php';
?>
<div class="card mb-4">
    <div class="card-header text-primary">
       <h4> <i class="fa-solid fa-box-archive"></i>
        Room List</h4>
    </div>
</div>
<div class="card-body">
    <table id="datatablesSimple" class="table table-striped">
        <thead class="bg-info">
            <tr>
                <th style="width:90px">No.</th>
                <th style="width:90px">Name</th>
                <th style="width:200px">Room Type</th>
                <th style="width:200px">Rate Per/Night</th>
                <th style="width:200px">Status</th>
                <th style="width:200px">Occupant</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT  r.Id, r.Title AS RoomNumber, rc.Title AS RoomType, rrpt.Rate, rs.Title AS RoomStatus, u.FirstName
            FROM room r
            LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
            LEFT JOIN roomrate rr ON rr.RoomCategoryId  = rc.Id
            LEFT JOIN roomratepricetrail rrpt ON rrpt.id = rr.RoomPriceTrailId
            LEFT JOIN roomstatus rs ON rs.Id = r.RoomStatusId
            LEFT JOIN transaction t ON t.Id = r.Id
            LEFT JOIN user u ON u.Id = t.UserId
            WHERE r.RoomTypeId = 1;";
            

            $result = $conn->query($sql);
            $number = 1;

            while ($row = mysqli_fetch_assoc($result)) {
               ?>
                <tr>
                <th><?php echo $number ?></th>
                <th><?php echo $row['RoomNumber'] ?></th>
                <td><?php echo $row['RoomType'] ?></td>
                <td><?php echo $row['Rate'] ?></td>
                <td><?php echo $row['RoomStatus'] ?></td>
                <td> <a href="hotel.php?Id=<?php echo $row['Id'] ?>"><?php echo $row['FirstName'] ?></a></td>
                </tr> 
            <?php $number++;
            }
            ?>


        </tbody>







    </table>

</div>
<?php include 'themes/footer.php'; ?>