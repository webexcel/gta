<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);

	$c_id		=	trim($data['editCourse']['c_id']);
	$course		=	trim($data['editCourse']['course']);
	$program	=	trim($data['editCourse']['program']);
	$timing		=	trim($data['editCourse']['duration']);
	$feeamount  =	trim($data['editCourse']['amount']);	
	$centre 	=	trim($data['editCourse']['center']);
	

	echo $sqlInsStuInfo	= "UPDATE `tbl_course` SET `course`='".$course."',`program`='".$program."',`duration`='".$timing."',`amount`='".$feeamount."',`center`='".$centre."' WHERE c_id = '".$c_id."'";
	$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);

	if($exeInsStuInfo) {			
		$arr	=	array('Status' => TRUE, 'message' => "Update Course successfully");
	} else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
	}
	
		

	$json_response = json_encode($arr);
	echo $json_response;

?>