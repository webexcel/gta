<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);

	$StId				=	$data['uid'];
	$name				=	$data['editUser']['name'];
	$parent_name		=	$data['editUser']['parent_name'];
	$institution		=	$data['editUser']['institution'];
	$qualification		=	$data['editUser']['qualification'];
	$student_mobile		=	$data['editUser']['student_mobile'];
	$parent_mobile		=	$data['editUser']['parent_mobile'];	
	$email				=	$data['editUser']['email'];
	$address			=	$data['editUser']['address'];
	
	
	$sqlInsStuInfo	= " UPDATE `student_enquiry` SET `name`='".$name."', `parent_name`='".$parent_name."',`institution`='".$institution."',`qualification`='".$qualification."',`student_mobile`='".$student_mobile."',`parent_mobile`='".$parent_mobile."',`email`='".$email."',`address`='".$address."' WHERE `StId`='".$StId."'";
	$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);

	if($exeInsStuInfo) {			
		$arr	=	array('Status' => TRUE, 'message' => "Update successfully");
	} else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
	}
	
		

	$json_response = json_encode($arr);
	echo $json_response;

?>