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
    <table id="datatablesSimple" class="table-striped ">
        <thead class="bg-info ">
            <tr>
                <th style="width:90px">Number</th>
                <th style="width:200px">Room Type</th>
                <th style="width:200px">Rate Per/Night</th>
                <th style="width:200px">Status</th>
                <th style="width:200px">Occupant</th>

            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT tblroom.Number, tblroomtype.Type, tblroomtype.Rate, tblroom.Status, tblroom.GuestId,  IFNULL(CONCAT(tblguest.FirstName,' ',tblguest.LastName), 'No Occupant') AS Name, tblroom.Id AS RoomId
            FROM tblroom
            LEFT JOIN tblroomtype ON tblroom.RoomTypeId = tblroomtype.id
            LEFT JOIN tblguest ON tblroom.GuestId = tblguest.Id;";
            

            $result = $conn->query($sql);

            while ($row = mysqli_fetch_assoc($result)) {
               ?>
                <tr>
                <th><?php echo $row['Number'] ?></th>
                <td><?php echo $row['Type'] ?></td>
                <td><?php echo $row['Rate'] ?></td>
                <td><?php echo $row['Status'] ?></td>
                <td> <a href="hotel.php?Id=<?php echo $row['RoomId'] ?>"><?php echo $row['Name'] ?></a></td>
                </tr> 
            <?php
            }
            ?>


        </tbody>







    </table>

</div>
<?php include 'themes/footer.php'; ?>