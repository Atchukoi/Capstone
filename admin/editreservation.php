
<form method="POST">
    <div class="container-fluid mx-auto rounded border border-4 border-success bg-white">

<?php
include 'config.php';
$id = $_GET['reservation_id'];
$sql = "SELECT * FROM tblreservation WHERE reservation_id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
    
        <div class="row mt-3 ">
            <div class="col ">
                <label class="form-label">Name :</label>
                <input type="text" name="name" class="form-control" value = ""required>
            </div>
            <div class="col ">
                <label class="form-label">Contact :</label>
                <input type="text" name="contact" class="form-control" required>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4 mt-2">
                <label class="form-label">Room Number :</label>
                <select class="form-select form-select-md  mb-3" name="room_number" aria-label=".form-select-lg example" required>
                    <option selected></option>
                    <option value="101 @ ₱3,500"> Presidential Villa 101 @ ₱3,500</option>
                    <option value="102 @ ₱3,500"> Presidential Villa 102 @ ₱3,500</option>
                    <option value="103 @ ₱3,500"> Presidential Villa 103 @ ₱3,500</option>
                    <option value="201 @ ₱3,200"> Suite Villa 201 @ ₱3,200</option>
                    <option value="202 @ ₱3,200"> Suite Villa 202 @ ₱3,200</option>
                    <option value="203 @ ₱3,200"> Suite Villa 203 @ ₱3,200</option>
                    <option value="301 @ ₱3,000"> Mini Dorm 301 @ ₱3,000</option>
                    <option value="302 @ ₱3,000"> Mini Dorm 302 @ ₱3,000</option>
                    <option value="303 @ ₱3,000"> Mini Dorm 303 @ ₱3,000</option>
                    <option value="401 @ ₱2,500"> Standard 401 @ ₱2,500</option>
                    <option value="402 @ ₱2,500"> Standard 402 @ ₱2,500</option>
                    <option value="403 @ ₱2,500"> Standard 403 @ ₱2,500</option>
                </select>
            </div>
            <div class="col-md-3 mt-2">
                <label class="form-label">Arrival :</label>
                <input type="date" name="arrival" class="form-control" required>
            </div>
            <div class="col-md-3 mt-2">
                <label class="form-label">Departure :</label>
                <input type="date" name="departure" class="form-control" required>
            </div>
            <div class="col-md-2 mt-2">
                <label class="form-label">Total:</label>
                <input type="text" name="total" class="form-control" required>
            </div>
        </div>
        <div class="row justify-content-end mt-3 mb-3">
            <div class="col-2 " style="text-align: right; font-size:20px;">
                <label class="form-label">Remarks :</label>
            </div>
            <div class="col-3 ">
                <textarea name="remarks" cols="20" rows="2"></textarea>
            </div>

            <div class="col-3 " style="text-align: right; font-size:20px;">
                <label class="form-label">Deposit :</label>
            </div>
            <div class="col-2">
                <input type="text" name="deposit" class="form-control" required>
            </div>




        </div>
    </div>
</form>