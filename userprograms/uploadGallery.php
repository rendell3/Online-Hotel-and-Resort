<?php
session_start();
// set_time_limit(0);
include '../connection.php';
$txtName = $_POST['txtName'];
$desc = $_POST['txtDescription'];

date_default_timezone_set('Asia/Manila');
$dtime = date("Y-m-d H:i:s");
$today = date("Y-m-d");
if ($_FILES["file"]["error"] == 4) {  
 
  // echo "<span class='badge badge-success'>Successfully Update Item !</span><br/>";
  // echo "<meta http-equiv='refresh' content='1;url=products'>";
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
                $targetPath = "../administrator/uploads/".$new_name;  
                move_uploaded_file($sourcePath, $targetPath);  

                $update = $connection->query("INSERT INTO tblimages VALUES (null,'$txtName','$desc','$new_name','0','$dtime','$dtime')");
           }  
      
        echo "<span class='badge badge-success'>Successfully Upload Gallery Item !</span><br/>";
        echo "<meta http-equiv='refresh' content='1;url=gallery'>";
  
}

?>