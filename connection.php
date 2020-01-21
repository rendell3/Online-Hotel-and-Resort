<?php
    include("settings.php");
    /* THIS PHP FILE SERVES AS THE CONNECTION BETWEEN DATABASE AND THE PHP FILE */
    date_default_timezone_set($timezone);
    /* Connection string */
	$connection = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    /* Test connection to database */
	if ($connection ->connect_error) {
		die("Connection failed: " . $connection ->connect_error); /* If connection failed. Errors will be displayed */
    } 
    mysqli_query($connection,"SET NAMES utf_8");
    mysqli_query($connection,"SET CHARACTER utf_8");
?>