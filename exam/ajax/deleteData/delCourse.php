<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);

	$cid	=	$data['delCourse'];
		
	$sqlInsStuInfo	= " UPDATE `tbl_course` SET `status`='1' WHERE `c_id`='".$cid."'";
	$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);

	if($exeInsStuInfo) {			
		$arr	=	array('Status' => TRUE, 'message' => "Delete Course Successfully");
	} else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
	}
	
	$json_response = json_encode($arr);
	echo $json_response;

?>