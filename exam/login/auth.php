<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	//Start session
	ini_set("max_execution_time", "1000");
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['sid']) || (trim($_SESSION['sid']) == '')) {
		echo $_SESSION['sid'];
		
		header("location: ../index.php");
		exit();
	}
	session_write_close();
?>