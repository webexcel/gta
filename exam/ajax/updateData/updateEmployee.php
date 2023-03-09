<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);
	
	$sid			=	trim($data['editEmp']['sid']);
	$staff_name		=	trim($data['editEmp']['staff_name']);
	$Sur_name		=	trim($data['editEmp']['Sur_name']);
	$contact		=	trim($data['editEmp']['contact']);
	$contact1		=	trim($data['editEmp']['contact1']);
	$job_type		=	trim($data['editEmp']['job_type']);
	$gender			=	trim($data['editEmp']['gender']);
	$dob 			=	($data['editEmp']['dob']) ? date("Y-m-d", strtotime(trim($data['editEmp']['dob']))) : '0000-00-00';
	$doj 			=	($data['editEmp']['doj']) ? date("Y-m-d", strtotime(trim($data['editEmp']['doj']))) : '0000-00-00';
	$Designation 	=	trim($data['editEmp']['Designation']);
	$aadhar			=	trim($data['editEmp']['aadhar']);		
	$email			=	trim($data['editEmp']['email']);	
	$qualification	=	trim($data['editEmp']['qualification']);
	$reportingto	=	trim($data['editEmp']['reportingto']);	
	$centre  		=	trim($data['editEmp']['centre']);
	$staff_type  	=	trim($data['editEmp']['staff_type']);
	$address		=	trim($data['editEmp']['address']);
	//$aadharImage				=	trim($data['editEmp']['aadharImage']);
	//$photo  			=	trim($data['editEmp']['photo']);
	$aadharImage = "aadharImage";
	$photo ="photo";
	
	
	if($staff_name != ''){
		$sqlInsStuInfo	= " UPDATE `staff_info` SET `staff_name`='".$staff_name."',`Sur_name`='".$Sur_name."',`contact`='".$contact."',`contact1`='".$contact1."',`dob`='".$dob."',`doj`='".$doj."',`gender`='".$gender."',`job_type`='".$job_type."',`Designation`='".$Designation."',`email`='".$email."',`address`='".$address."',`aadhar`='".$aadhar."',`aadharImage`='".$aadharImage."',`photo`='".$photo."',`qualification`='".$qualification."',`reportingto`='".$reportingto."',`centre`='".$centre."',`staff_type`='".$staff_type."' where `sid`='".$sid."'";
		
		$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);
	
		if($exeInsStuInfo) {			
			$arr	=	array('Status' => TRUE, 'message' => "Employee Update successfully");
		} else {
			$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
		}
	}else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
	}
		

	$json_response = json_encode($arr);
	echo $json_response;

?>