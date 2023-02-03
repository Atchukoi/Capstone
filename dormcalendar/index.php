<?php
session_start();
include('header.php');
include 'db_connect.php';
$UserId = $_GET['Id'];


if (isset($_POST['submit'])) {

	if ($UserId != "") {

		$Code = mt_rand('100', '1000000000');
		$Arrival = $_POST['arrival'];
		$Departure = $_POST['departure'];
		$Total = $_POST['total'];
		$Remarks = $_POST['notes'];

		$sql = "INSERT INTO `roomreservation`
        (`Code`,`RoomRateId`, `Arrival`, `Departure`, `Total`, `GuestId`, `Status`, `Notes`) 
        VALUES 
        ('$Code','3','$Arrival','$Departure','$Total','$UserId','Pending','$Remarks')";
		$result = mysqli_query($conn, $sql);
		
		echo '<script type="text/javascript">alert("Reservation Successfully Send! Check your booking list on your Profile."); window.location.href = "http://localhost/hms/capstone/bookinglist.php?Id=' . $UserId . '"; </script>';
		
		

		
	} else {
		echo '<script type="text/javascript">';
		echo 'alert("Please Log in to your account before you make a reservation");';
		echo 'window.location.href = "http://localhost/hms/capstone/login.php";';
		echo '</script>';
	}
}


?>

<link rel="stylesheet" href="css/calendar.css">
<?php include('container.php'); ?>
<div class="container">
	<h2>Mini Dorm Calendar </h2>
	<div class="page-header">
		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev">
					<< Prev</button>
						<button class="btn btn-default" data-calendar-nav="today">Today</button>
						<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Year</button>
				<button class="btn btn-warning active" data-calendar-view="month">Month</button>

			</div>
		</div>
		<h3></h3>

	</div>
	<form method="post">
		<div class="row">
			<div class="col-md-9">
				<div id="showEventCalendar"></div>
			</div>
			<div class="col-md-3">
				<div class="row">
					<div class="row">
						<div class="col" style="margin-top: 5px; margin-left: 5px ">
							<span class="glyphicon glyphicon-info-sign"></span> This reservation form if for a room with a type category <b><i> MINI DORM</i></b> with a <b><i>Rate of ₱ 3,000 per day</i></b>
						</div>
					</div>
					<div class="row">
						<div class="col" style="margin-top: 5px; margin-left: 5px ">
							<span class="glyphicon glyphicon-info-sign"></span> <b><i> 3 dots in a selected date </i></b> means the room category is fully booked.
						</div>
					</div>
					<div class="row">
						<div class="col" style="margin-top: 5px; margin-left: 5px ">
							<label for="" class="form-label ">Arrival date</label>
							<input type="date" class="form-control" name="arrival" id="arrival" required>
						</div>
					</div>
					<div class="row">
						<div class="col " style="margin-top: 5px; margin-left: 5px ">
							<label for="" class="form-label mt-3">Departure date</label>
							<input type="date" class="form-control" name="departure" id="departure" onchange="displayData()" required>
						</div>
					</div>
					<div class="row">
						<div class="col " style="margin-top: 5px; margin-left: 5px ">
							<label for="" class="form-label mt-3">Total</label>
							<input type="number" class="form-control" name="total" id="total" readonly>

						</div>
					</div>
					<div class="row">
						<div class="col " style="margin-top: 5px; margin-left: 5px ">
							<label for="" class="form-label mt-3">Days</label>
							<input type="number" class="form-control" name="" id="datedifference" readonly>

						</div>
					</div>
					<div class="row">
						<div class="col " style="margin-top: 5px; margin-left: 5px ">
							<label for="" class="form-label mt-3">Notes</label>
							<input type="text" class="form-control" name="notes">
						</div>
					</div>

					<div class="row">
						<div class="col" style="margin-top: 5px; margin-left: 5px ">
							<button type="submit" class="btn btn-success" name="submit">Send Reservation</button>
						</div>
					</div>


				</div>

			</div>
		</div>
	</form>
	<div style="margin:50px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://localhost/hms/capstone/rooms.php" target="_blank">Back to La Perfecta Web Page</a>
	</div>
</div>
<script>
	$(document).ready(function() {
		displayData();
	});

	function displayData() {
		var start_date = new Date(document.getElementById('arrival').value);
		var end_date = new Date(document.getElementById('departure').value);
		//Here we will use getTime() function to get the time difference
		var time_difference = end_date.getTime() - start_date.getTime();
		//Here we will divide the above time difference by the no of miliseconds in a day
		var days_difference = time_difference / (1000 * 3600 * 24);
		//alert(days);
		document.getElementById('datedifference').value = days_difference;

		var Total = 0;
		var y = 3000;
		var Total = days_difference * y;
		var aTotal = Total.toFixed(2);
		$("#total").val(aTotal);

	}


	// Date Limitation
	var Arrival = new Date();
	Arrival = new Date(Arrival.setDate(Arrival.getDate() + 2)).toISOString().split('T')[0];
	document.getElementsByName("arrival")[0].setAttribute('min', Arrival);

	var Departure = new Date();
	Departure = new Date(Departure.setDate(Departure.getDate() + 3)).toISOString().split('T')[0];
	document.getElementsByName("departure")[0].setAttribute('min', Departure);
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
<?php include('footer.php'); ?>