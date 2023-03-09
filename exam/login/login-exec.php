<?php


//require_once('../functions.php');	
session_start();

define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB_NAME", 'gta');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_error) {
	die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$mysqli->set_charset("utf8");
//$mysqli -> select_db('main');


date_default_timezone_set('Asia/Kolkata');
$script_tz = date_default_timezone_get();

$errmsg_arr = array();
$errflag = false;

$login = trim($_POST['email']);
$password = trim($_POST['password']);

if ($login == '') {
	$errmsg_arr[] = 'Invalid Username';
	$errflag = true;
}
if ($password == '') {
	$errmsg_arr[] = 'Invalid Password';
	$errflag = true;
}

if ($errflag) {
	$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
	session_write_close();
	header("location: ../index.php?lf=1");
	exit();
}

$qry = "SELECT * FROM students WHERE `email` = '" . $login . "' AND `password` = '" . $password . "'";
//$qry	=	"SELECT * FROM staff_info limit 1";
$result = $mysqli->query($qry);
$cnt = $result->num_rows;
print_r($result);
if ($result) {
	if ($cnt == 1) {
		$member = $result->fetch_assoc();
		#MULTIPLE USER LOGIN
		echo $_SESSION['staff_name'] = $member['staff_name'];
		$_SESSION['centre'] = $member['centre'];
		$_SESSION['staff_type'] = $member['staff_type'];
		$_SESSION['sid'] = $member['sid'];
		session_write_close();
		header("location: ../dashboard.php");
		exit();
	} else {
		header("location: ../index.php?lf=1");
		exit();
	}


} else {
	die("Query failed");
}
?>