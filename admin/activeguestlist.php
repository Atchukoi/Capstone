<?php 
include 'themes/navbar.php'; 
include 'config.php';
?>
<div class="card mb-4">
    <div class="card-header text-primary">
        <h4><i class="fa-solid fa-users"></i>
        Active Guest List</h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table-striped">
            <thead class="bg-info">
                <tr class="text-light">
                    <th>Name</th>
                    <th>Room Number</th>
                    <th>Contact Number</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT CONCAT(u.FirstName,' ', u.LastName) AS Name, u.Contact,  r.Title
                FROM transaction t
                JOIN user u ON t.UserId = u.Id
                JOIN room r ON r.Id = t.RoomId";
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td style="width:600px"><?php echo $row['Name'] ?></td>
                    <td style="width:200px"><?php echo $row['Title'] ?></td>
                    <td style="width:200px">
                    <?php echo $row['Contact'] ?>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
        <?php include 'themes/footer.php'; ?>