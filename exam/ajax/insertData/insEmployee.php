<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);
//$yearId	=	$_SESSION['YEAR_ID'];
	
	$staff_name		=	trim($data['aEmployee']['staff_name']);
	$Sur_name		=	trim($data['aEmployee']['Sur_name']);
	$contact		=	trim($data['aEmployee']['contact']);
	$contact1		=	trim($data['aEmployee']['contact1']);
	$job_type		=	trim($data['aEmployee']['job_type']);
	$gender			=	trim($data['aEmployee']['gender']);
	$dob 			=	($data['aEmployee']['dob']) ? date("Y-m-d", strtotime(trim($data['aEmployee']['dob']))) : '0000-00-00';
	$doj 			=	($data['aEmployee']['doj']) ? date("Y-m-d", strtotime(trim($data['aEmployee']['doj']))) : '0000-00-00';
	$Designation 	=	trim($data['aEmployee']['Designation']);
	$aadhar			=	trim($data['aEmployee']['aadhar']);		
	$email			=	trim($data['aEmployee']['email']);	
	$qualification	=	trim($data['aEmployee']['qualification']);
	$reportingto		=	trim($data['aEmployee']['reportingto']);	
	$centre  			=	trim($data['aEmployee']['centre']);
	$staff_type		=	trim($data['aEmployee']['staff_type']);
	$address			=	trim($data['aEmployee']['address']);
	//$aadharImage				=	trim($data['aEmployee']['aadharImage']);
	//$photo  			=	trim($data['aEmployee']['photo']);
	$aadharImage = "aadharImage";
	$photo ="photo";
	if($staff_name != ''){
		echo $sqlInsStuInfo	= " INSERT INTO `staff_info`( `staff_name`, `Sur_name`, `contact`, `contact1`, `dob`, `doj`, `gender`, `job_type`, `Designation`, `email`, `address`, `aadhar`, `aadharImage`, `photo`, `qualification`, `reportingto`, `centre`,`staff_type`) VALUES ('".$staff_name."','".$Sur_name."','".$contact."','".$contact1."','".$dob."','".$doj."','".$gender."','".$job_type."','".$Designation ."','".$email."','".$address."','".$aadhar."','".$aadharImage."','".$photo."','".$qualification."','".$reportingto."','".$centre."','".$staff_type."')";
		$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);
	
		if($exeInsStuInfo) {			
			$arr	=	array('Status' => TRUE, 'message' => "Employee added successfully");
		} else {
			$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
		}
	}else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
	}
		

	$json_response = json_encode($arr);
	echo $json_response;

?>