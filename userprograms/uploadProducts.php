<?php
session_start();
set_time_limit(0);
include '../connection.php';
$txtName = mysqli_real_escape_string($connection,$_POST['txtName']);
$unit = $_POST['txtUnit'];
$qty = $_POST['txtQuantity'];
$desc = mysqli_real_escape_string($connection,$_POST['txtDescription']);
$price = $_POST['txtPrice'];
$category = $_POST['txtCategory'];


$selectCategory = $connection->query("SELECT * FROM tblcategories where fldCategoryId = '$category'");
$rowsCategory = mysqli_fetch_array($selectCategory);
$categoryname = $rowsCategory['fldCategoryName'];

$selectCounter = $connection->query("SELECT * FROM roomcounters where CATEGORY = '$category'");
$rowsCounter = mysqli_fetch_array($selectCounter);
$code = strtoupper($categoryname[0])."-".$rowsCounter['NEXTID']; 
date_default_timezone_set('Asia/Manila');
$dtime = date("Y-m-d H:i:s");
$today = date("Y-m-d");

$select = $connection->query("SELECT COUNT(*) as 'COUNT' from tblproducts WHERE fldProductCode = '$code' and tblCategories_fldCategoryId = '$category'");
$rowSCount = mysqli_fetch_array($select);
$count = $rowSCount['COUNT'];
if ($count ==1){
    echo "<span class='badge badge-danger'>Product Code ".strtoupper($code)." is already used!</span><br/>";
}
else{
  if(is_array($_FILES))  
   {  
        foreach($_FILES['file']['name'] as $name => $value)  
        {  
        	   $shuffle = "abcdefghijklmnofqrstuvwxyz1234567890";
  		       $fname = str_shuffle($shuffle);

             $file_name = explode(".", $_FILES['file']['name'][$name]);  
             $allowed_extension = array("jpg", "jpeg", "png", "gif");  
             if(in_array($file_name[1], $allowed_extension))  
             {  
                  $new_name = $fname . '.'. $file_name[1];  
                  $sourcePath = $_FILES["file"]["tmp_name"][$name];  
                  $targetPath = "../misc/".$new_name;  
                  move_uploaded_file($sourcePath, $targetPath);  
                  
                  $ins = $connection->query("INSERT INTO tblproducts (fldProductName,fldProductUnit,fldProductQuantity,fldProductDescription,fldProductPrice,fldProductDeleted,tblCategories_fldCategoryId,IMAGES,fldProductCreated,fldProductCode) VALUES ('$txtName','$unit','$qty','$desc','$price',0,'$category','$new_name','$dtime','$code')");

                  $update = $connection->query("UPDATE roomcounters SET NEXTID = NEXTID+1 where CATEGORY = '$category'");
             }  
        }
          echo "<span class='badge badge-success'>Item Uploaded Successfully...!!</span><br/>";
  		    echo "<meta http-equiv='refresh' content='1'>";
   }  
   else
   {
   	echo "<span class='badge badge-danger'>File is required!</span><br/>";
   }

// if(isset($_FILES["file"]["type"]))
// 	{
// 	$temp = explode(".", $_FILES["file"]["name"]);#round(microtime(true)) 
// 	$newfilename = $fname. '.' . end($temp);
// 	$extension = end($temp);
	
	
// 	$validextensions = array("jpeg", "jpg", "png");
// 	$temporary = explode(".", $_FILES["file"]["name"]);
// 	$file_extension = end($temporary);
// 	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
// 	) && ($_FILES["file"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
// 	&& in_array($file_extension, $validextensions)) {
// 	if ($_FILES["file"]["error"] > 0)
// 	{
// 	echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
// 	}
// 	else
// 	{
// 	if (file_exists("../items/" . $_FILES["file"]["name"])) {
// 	echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
// 	}
// 	else
// 	{
// 	// $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
// 	// $targetPath = "../imgORCR/".$_FILES['file']['name']; // Target path where file is to be stored
// 	// $image = $_FILES['file']['name'];
// 	// move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file


// 	/*TEST FOR RENAME UPLOAD*/
// 	 $temp = explode(".", $_FILES["file"]["name"]);#round(microtime(true)) 
// 	 $newfilename = $fname. '.' . end($temp);
// 	 $extension = end($temp);
	
// 	move_uploaded_file($_FILES["file"]["tmp_name"], "../items/" . $newfilename);

// 	$ins = $conn->prepare("INSERT INTO sellitems VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
// 	$ins->execute([$email,$newfilename,$category,$subcategory,$title,$brand,$itemcondition,$meetup,$shipdelivery,$amount,$description,$dtime,$today,'0',$shippingrates]);

// 	echo "<span class='badge badge-success'>Item Uploaded Successfully...!!</span><br/>";
// 	echo "<meta http-equiv='refresh' content='1'>";
// 	// echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
// 	// echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
// 	// echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
// 	// echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
// 	}
// 	}
// 	}
// 	else
// 	{
// 	echo "<span class='badge badge-danger'>***Invalid file Size or Type***<span>";
// 	}
// 	}
}
?>