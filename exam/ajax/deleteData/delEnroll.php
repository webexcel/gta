<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);

	$enrollId	=	$data['delEnroll'];
		
	$sqlInsStuInfo	= " UPDATE `student_enroll` SET `status`='1' WHERE `enrollId`='".$enrollId."'";
	$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);

	if($exeInsStuInfo) {			
		$arr	=	array('Status' => TRUE, 'message' => "Delete Enrollment Successfully");
	} else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
	}
	
	$json_response = json_encode($arr);
	echo $json_response;

?>