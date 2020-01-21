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
$price = $_POST['price'];
$name = mysqli_real_escape_string($connection,$_POST['name']);
$quantity = $_POST['quantity'];
$total = $_POST['total'];

// var data={id:id,price:price,name:name,quantity:quantity,total:total};

date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

if ($name=="Couples Deluxe" || $name == "Kings Room" || $name =="Peasants Room") {

$selectCountAvailable = $connection->query("SELECT COUNT(*) as 'COUNT' FROM tblproducts where fldProductname = '$name' and tblCategories_fldCategoryId = 1 and fldProductId not in (SELECT PRODUCTID FROM currentbookrooms)");
$rowsAvailable = mysqli_fetch_array($selectCountAvailable);
$count = $rowsAvailable['COUNT'];
if ($count<=0){
	echo '<div class="alert alert-danger">';
	echo "No available rooms for ".strtoupper($name)." - Available Unit - ".$count;
	echo '</div>';
}
else if ($quantity>$count) {
	echo '<div class="alert alert-success">';
	echo strtoupper($name)." - Available Unit - ".$count;	
	echo '</div>';
}
else
{
	$insert =$connection->query("INSERT INTO tblmodbookpackages VALUES (null,'$id','$price','$name','$quantity','$total','$createdby','$today')");
}
}
else
{
	$insert =$connection->query("INSERT INTO tblmodbookpackages VALUES (null,'$id','$price','$name','$quantity','$total','$createdby','$today')");
}
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
		</div> -->
<meta http-equiv='refresh' content='2'>