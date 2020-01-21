<?php
session_start();
include '../connection.php';
$id = $_GET['id'];
date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

$update =$connection->query("UPDATE tblproducts SET fldProductDeleted = '1' WHERE fldProductId = '$id'");
 echo '<script>alert("Successfully Deleted");
                window.location.href = "../administrator/products"
          </script>';
?>