<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);

	$bid	=	$data['delBatch'];
		
	$sqlInsStuInfo	= " UPDATE `tbl_batch` SET `status`='1' WHERE `b_id`='".$bid."'";
	$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);

	if($exeInsStuInfo) {			
		$arr	=	array('Status' => TRUE, 'message' => "Delete Batch Successfully");
	} else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
	}
	
	$json_response = json_encode($arr);
	echo $json_response;

?>