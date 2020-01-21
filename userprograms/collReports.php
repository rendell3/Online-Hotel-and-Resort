<?php
session_start();
include '../connection.php';

$tor= $_POST['tor'];
$from = $_POST['datefrom'];
$to = $_POST['dateto'];
$status = $_POST['status'];

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");
if ($tor =="Collection")
{
?><br/>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Reference No.</th>
			<th>Payer</th>
			<th>Date</th>
			<th>Amount</th>
			<th>Transaction Type</th>
		</tr>
	</thead>
	<tbody>
<?php
$amount = array();
	$select = $connection->query("SELECT * FROM tblbookpackages WHERE DATEPAYMENT between '$from' and '$to' AND `STATUS` ='$status'");
	while ($rows = mysqli_fetch_array($select))
	{
		$amount[] = $rows['TOTAL'];
		?>
			<tr>
				<td><?php echo $rows['REFERENCENO'];?></td>
				<td><?php echo $rows['CREATEDBY'];?></td>
				<td><?php echo $rows['DATEPAYMENT'];?></td>
				<td><?php echo $rows['TOTAL'];?></td>
				<td><?php echo $rows['TYPEOFTRANSACTION'];?></td>
			</tr>	
		<?php
	}
?>
<tr>
	<td style="font-weight: bold;">Total Amount : <?php echo number_format(array_sum($amount),2);?></td>
</tr>
</tbody>
</table>
<?php
}
?>

<?php
if ($tor =="Bookings")
{
	if ($status=="Request Reschedule") {
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Reference No.</th>
					<th>Booker</th>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
		<?php
		$amount = array();
			$select = $connection->query("SELECT a.REFERENCENO as 'REFERENCENO',
												 b.CREATEDBY as 'CREATEDBY',
												 a.CHECKIN as 'CHECKIN',
												 a.CHECKOUT as 'CHECKOUT',
												 a.`TYPE` as 'TYPE'
										  FROM requestreschedule a LEFT OUTER JOIN tblbookpackages b ON b.REFERENCENO = a.REFERENCENO ");
			while ($rows = mysqli_fetch_array($select))
			{
				?>
					<tr>
						<td><?php echo $rows['REFERENCENO'];?></td>
						<td><?php echo $rows['CREATEDBY'];?></td>
						<td><?php echo $rows['CHECKIN'];?></td>
						<td><?php echo $rows['CHECKOUT'];?></td>
						<td><?php echo $rows['TYPE'];?></td>
					</tr>	
				<?php
			}
		?>
		<tr>
			
		</tr>
		</tbody>
		</table>
		<?php
	}else{
?><br/>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Reference No.</th>
			<th>Booker</th>
			<th>Check In</th>
			<th>Check Out</th>
			<th>Amount</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
<?php
$amount = array();
	$select = $connection->query("SELECT * FROM tblbookpackages WHERE BOOKDATE between '$from' and '$to' AND
									IF('$status' = 'All',
														''='',
															IF('$status' = 'Fully Payment',
																STATUS IN ('Fully Payment','Checked Out'),
																	STATUS = '$status'))"
								);
	while ($rows = mysqli_fetch_array($select))
	{
		$amount[] = $rows['TOTAL'];
		?>
			<tr>
				<td><?php echo $rows['REFERENCENO'];?></td>
				<td><?php echo $rows['CREATEDBY'];?></td>
				<td><?php echo $rows['CHECKIN'];?></td>
				<td><?php echo $rows['CHECKOUT'];?></td>
				<td><?php echo $rows['TOTAL'];?></td>
				<td><?php echo $rows['STATUS'];?></td>
			</tr>	
		<?php
	}
?>
<tr>
	<td style="font-weight: bold;">Total Amount : <?php echo number_format(array_sum($amount),2);?></td>
</tr>
</tbody>
</table>
<?php
}
}
?>