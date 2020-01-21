<?php
session_start();
include '../connection.php';
require '../phpmailer/PHPMailerAutoload.php';

if (!isset($_SESSION['customer-id'])){
$createdby = $_SESSION['username'];
}
else
{
$createdby = $_SESSION['customer-id'];
}
$id = $_POST['id'];

// var data={id:id,price:price,name:name,quantity:quantity,total:total};

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

$insert =$connection->querY("DELETE FROM tblmodbookpackages WHERE ID = '$id' AND CREATEDBY = '$createdby'");
?>
<!-- <div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<th></th>
				<th>Name</th>
				<th>Quanity</th>
				<th>Price</th>
				<th>Total</th>
				<th></th>
			</thead>
			<tbody>
				<?php
				$select= $connection->query("SELECT * FROM tblmodbookpackages WHERE createdby = '$createdby'");
				while ($rows = mysqli_fetch_array($select))
				{
				?>
					<tr>
						<td><?php echo $rows['ID'];?></td>
						<td><?php echo $rows['fldPackageName'];?></td>
						<td><?php echo $rows['fldPackageQuantity'];?></td>
						<td><?php echo $rows['fldPackagePrice'];?></td>
						<td><?php echo $rows['fldPackageTotal'];?></td>
						<td><a href="javascript:;" class="pull-left delete-packages" data-id="<?php echo $rows['ID'];?>" style="margin-top:10px;"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>	
		</table>
		</div>
</div>
</div> -->
<meta http-equiv='refresh' content='1'>