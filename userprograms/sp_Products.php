<?php
session_start();
include '../connection.php';

$select = $connection->query("SELECT * from tblproducts");
while ($rows = mysqli_fetch_array($select))
{
?>
<option value="<?php echo $rows['fldProductName'];?>"><?php echo $rows['fldProductName'];?></option>
<?php
}
?>