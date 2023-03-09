<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);

	$b_id		=	trim($data['editBatch']['b_id']);
	$bname		=	trim($data['editBatch']['batch_name']);
	$program	=	trim($data['editBatch']['program_name']);
	$hours		=	trim($data['editBatch']['timing']);	
	$centre 	=	trim($data['editBatch']['center']);
	$faculty    =	trim($data['editBatch']['staff_name']);
	$days    	=	trim($data['editBatch']['days']);
	$sdate		=	($data['editBatch']['start_date']) ? date("Y-m-d", strtotime(trim($data['editBatch']['start_date']))) : '0000-00-00';
	$edate		=	($data['editBatch']['end_date']) ? date("Y-m-d", strtotime(trim($data['editBatch']['end_date']))) : '0000-00-00';
	
	
	echo $sqlInsStuInfo	= "UPDATE `tbl_batch` SET `batch_name`='".$bname."',`program_id`='".$program."',`emp_id`='".$faculty."',`center_id`='".$centre ."',`start_date`='".$sdate."',`end_date`='".$edate."',
	`timing`='".$hours."',`days`='".$days."' WHERE b_id = '".$b_id."'";
	$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);

	if($exeInsStuInfo) {			
		$arr	=	array('Status' => TRUE, 'message' => "Update Batch successfully");
	} else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
	}
	
		

	$json_response = json_encode($arr);
	echo $json_response;

?>