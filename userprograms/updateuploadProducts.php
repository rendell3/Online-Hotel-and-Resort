<?php
// error_reporting(0);
session_start();
set_time_limit(0);
include '../connection.php';

$txtName = mysqli_real_escape_string($connection,$_POST['txtNameupdate']);
$unit = $_POST['txtUnitupdate'];
$qty = $_POST['txtQuantityupdate'];
$desc = mysqli_real_escape_string($connection,$_POST['txtDescriptionupdate']);
$price = $_POST['txtPriceupdate'];
$category = $_POST['txtCategoryupdate'];
$code = mysqli_real_escape_string($connection,$_POST['txtCodeupdate']);
$id = $_POST['txtItemID'];

date_default_timezone_set('Asia/Manila');
$dtime = date("Y-m-d H:i:s");
$today = date("Y-m-d");
if ($_FILES["file"]["error"] == 4) {  
  $update = $connection->query("UPDATE tblproducts SET fldProductName = '$txtName',
                                                                     fldProductUnit = '$unit',
                                                                     fldProductQuantity='$qty',
                                                                     fldProductDescription = '$desc',
                                                                     fldProductPrice ='$price',
                                                                     fldProductCreated='$dtime',
                                                                     fldProductCode='$code'
                                WHERE fldProductId = '$id'");
  // echo $update;
  echo "<span class='badge badge-success'>Successfully Update Item !</span><br/>";
  echo "<meta http-equiv='refresh' content='1;url=products'>";
}
else
{
      
      	   $shuffle = "abcdefghijklmnofqrstuvwxyz1234567890";
		       $fname = str_shuffle($shuffle);

           $file_name = explode(".", $_FILES['file']['name']);  
           $allowed_extension = array("jpg", "jpeg", "png", "gif");  
           if(in_array($file_name[1], $allowed_extension))  
           {  
                $new_name = $fname . '.'. $file_name[1];  
                $sourcePath = $_FILES["file"]["tmp_name"];  
                $targetPath = "../misc/".$new_name;  
                move_uploaded_file($sourcePath, $targetPath);  

                $update = $connection->query("UPDATE tblproducts SET fldProductName = '$txtName',
                                                                     fldProductUnit = '$unit',
                                                                     fldProductQuantity='$qty',
                                                                     fldProductDescription = '$desc',
                                                                     fldProductPrice ='$price',
                                                                     IMAGES = '$new_name',
                                                                     fldProductCreated='$dtime',
                                                                     fldProductCode='$code'
                                              WHERE fldProductId = '$id'");
           }  
      
        echo "<span class='badge badge-success'>Successfully Update Item !</span><br/>";
        echo "<meta http-equiv='refresh' content='1;url=products'>";
  
}
?>