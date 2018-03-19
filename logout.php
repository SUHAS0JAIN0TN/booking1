<?php 
session_start();
    session_unset();
	//echo session_id();
	session_destroy();

	header("location:index.php");
	exit();
?>