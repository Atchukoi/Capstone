<?php


$Id = $_GET['Id'];
include 'Config.php';

$result = mysqli_query($conn, "SELECT th.Id AS Invoice, th.ArrivalDateTime, th.DepartureDateTime, p.PaymentTerms, p.AmountTender, rc.Title, rrpt.Rate, th.RoomChargesTotal, th.ExtraChargesTotal, th.SubTotal, th.Deposit, th.Discount, th.Total
FROM transactionhistory th
LEFT JOIN payments p ON p.TransactionId = th.Id
LEFT JOIN room r ON r.Id = th.RoomId
LEFT JOIN roomcategory rc ON rc.Id = r.RoomCategoryId
LEFT JOIN roomrate rr ON rr.RoomCategoryId = rc.Id
LEFT JOIN roomratepricetrail rrpt ON rrpt.Id = rr.RoomPriceTrailId
WHERE th.Id = $Id AND p.UserId = th.UserId");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>La Perfecta Convention Center, Villas And Resort</title>

	<style>
		.invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.invoice-box.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.invoice-box.rtl table {
			text-align: right;
		}

		.invoice-box.rtl table tr td:nth-child(2) {
			text-align: left;
		}
	</style>
</head>

<body>

	<div class="invoice-box">
		<table cellpadding="0" cellspacing="0">
			<tr class="top">
				<td colspan="2">
					<table>
						<tr>
							<td class="title">
								<img src="../images/Logo.jpeg" style="width: 100%; max-width: 300px" />
							</td>

							<td>
								Transaction #: <?php echo $row['Invoice'] ?> <br />
								Arrival: <?php echo $row['ArrivalDateTime'] ?><br />
								Departure: <?php echo $row['DepartureDateTime'] ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr class="information">
				<td colspan="2">
					<table>
						<tr>
							<td>
								La Perfecta.<br />
								Daramuangan<br />
								San Mateo, Isabela 3318
							</td>

							<td>
								La Perfecta<br />
								Kaycee Pucut<br />
								LaPerfecta@gmail.com
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr class="heading">
				<td>Payment Method</td>

				<td>Amount or Transaction #</td>
			</tr>

			<tr class="details">
				<td><?php echo $row['PaymentTerms'] ?></td>

				<td><?php echo $row['AmountTender'] ?></td>
			</tr>

			<tr class="heading">
				<td>Item</td>

				<td>Price</td>
			</tr>

			<tr class="item">
				<td> <?php echo $row['Title'] . ' @ ' . $row['Rate'] ?> </td>

				<td>₱ <?php echo $row['RoomChargesTotal']  ?></td>
			</tr>
			<tr class="item">
				<?php
				$bsql = "SELECT re.Title, re.Cost, te.Quantity 
				FROM 
				transactionextra te
				LEFT JOIN transactionhistory th ON th.TransactionId = te.TransactionId
				LEFT JOIN roomextra re ON re.Id = te.RoomExtraId
				WHERE th.Id = $Id";
				$bresult = mysqli_query($conn, $bsql)

				?>
				<td>Extras Charge
					<ul>
						<?php
						while ($brow = mysqli_fetch_assoc($bresult)){
						?>

						<li>(<?php echo $brow['Quantity'] ?>) <?php echo $brow['Title'].' @ '.$brow['Cost'] ?></li>

						<?php } ?>
					</ul>
				</td>


				<td>₱<?php echo $row['ExtraChargesTotal'] ?></td>
			</tr>
			<tr class="item last">
				<td> Subtotal </td>

				<td>₱ <?php echo $row['SubTotal'] ?></td>
			</tr>

			<tr class="item last">
				<td> Deposit </td>

				<td>- ₱ <?php echo $row['Deposit'] ?></td>
			</tr>
			<tr class="item last">
				<td> Discount </td>

				<td>- ₱ <?php echo $row['Discount'] ?></td>
			</tr>

			<tr class="total">
				<td></td>

				<td>Total: ₱ <?php echo $row['Total'] ?></td>
			</tr>
		</table>
	</div>
</body>

<div class="row">
	<button onClick="window.print()" style="background-color:green; color:white">Print Receipt </button>
	<a href="dashboard.php" >Back to Dashboard </a>
</div>

</html>