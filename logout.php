<?php
	//Start session
	session_start();
	//Unset the variables stored in session
	unset($_SESSION['staff_name']);
	unset($_SESSION['centre']);
	unset($_SESSION['staff_type']);
	unset($_SESSION['sid']);
	;
	//header("location: login-failed.php");
	header("location: index.php");
	
	
?>
