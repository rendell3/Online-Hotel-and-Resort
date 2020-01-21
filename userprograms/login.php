<?php
session_start();
include '../connection.php';
require '../phpmailer/PHPMailerAutoload.php';
$username = $_POST['username'];
$password = md5($_POST['password']);


date_default_timezone_set('Asia/Manila');
$today = date("Y-m-d H:i:s");

if (empty($username)) {
   echo '<div class="alert alert-danger">Username is required.</div>';
}
else if (empty($password)) {
    echo '<div class="alert alert-danger">Password is required.</div>';
}
else
{
	if (!filter_var($username, FILTER_VALIDATE_EMAIL))
	{
			  echo '<div class="alert alert-danger">Invalid email address.</div>';	
	}
	else
	{
		$select = $connection->query("SELECT *,COUNT(*) AS 'COUNT' FROM tblusers WHERE fldUserUsername = '$username'");
		$rowsFetch = mysqli_fetch_array($select);
		if ($rowsFetch['COUNT'] == 0)
		{
			echo '<div class="alert alert-danger">Email '.$username.' is not existed.</div>';	
		}
		else if ($rowsFetch['fldUserPassword'] != $password)
		{
			echo '<div class="alert alert-danger">Password Incorrect.</div>';
		}
		else if ($rowsFetch['fldUserStatus']=='Pending')
		{
					echo '<div class="input-group">
					      	<input type="text" class="form-control" placeholder="Verification Code" id="ver_code">
					      	<div class="input-group-btn">
					      	  <button class="btn btn-primary" type="button" onclick="btnVerify()" ><i class="fa fa-lock"></i></button>
					     	 </div>
					   	 </div>';
		}
		else
		{
			// return;
			switch ($rowsFetch['tblRoles_fldRoleId']) {
				case '1':
					$_SESSION['username'] = $username;
					$_SESSION['roleid'] = $rowsFetch['tblRoles_fldRoleId'];
					echo "<script>window.location.href = 'dashboard'</script>";
					break;
				case '2':
					$_SESSION['customer-id'] = $username;
					echo "<script>window.location.href = '?page=home'</script>";
					break;
				case $rowsFetch['tblRoles_fldRoleId'] > 2 :
					$_SESSION['username'] = $username;
					$_SESSION['roleid'] = $rowsFetch['tblRoles_fldRoleId'];
					echo "<script>window.location.href = 'panel'</script>";
					break;
				default:
					echo "<script>window.location.href = '?page=home'</script>";
				break;
			}
			
		}
	}
}
?>