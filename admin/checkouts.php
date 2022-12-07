<?php include 'themes/navbar.php'; ?>


<div class="card mb-4">
    <div class="card-header text-primary">
   <h4> <i class="fa-regular fa-calendar-check"></i>
        Upcoming Checkouts</h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead class="bg-info">
                <tr class="text-light">
                    <th>Name</th>
                    <th>Room No.</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width:250px">John Doe</td>
                    <td style="width:250px">101</td>
                    <td style="width:250px">January 1, 2023</td>
                    <td style="width:250px">January 5, 2023</td>

                </tr>
                <tr>
                    <td style="width:250px">John Doe</td>
                    <td style="width:250px">101</td>
                    <td style="width:250px">January 1, 2023</td>
                    <td style="width:250px">January 5, 2023</td>
                </tr>

            </tbody>
        </table>

        <?php include 'themes/footer.php'; ?>