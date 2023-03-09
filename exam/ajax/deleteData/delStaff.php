<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);

	$sid	=	$data['delStaff'];
		
	$sqlInsStuInfo	= " UPDATE `staff_info` SET `status`='1' WHERE `sid`='".$sid."'";
	$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);

	if($exeInsStuInfo) {			
		$arr	=	array('Status' => TRUE, 'message' => "Delete Staff Successfully");
	} else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
	}
	
	$json_response = json_encode($arr);
	echo $json_response;

?>