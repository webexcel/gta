<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);
//$yearId	=	$_SESSION['YEAR_ID'];
	
	$name				=	trim($data['aStudent']['name']);
	$parent_name		=	trim($data['aStudent']['parent_name']);
	$institution		=	trim($data['aStudent']['institution']);
	$qualification		=	trim($data['aStudent']['qualification']);
	$student_mobile		=	trim($data['aStudent']['student_mobile']);
	$parent_mobile		=	trim($data['aStudent']['parent_mobile']);
	$enquiry_date		=	($data['aStudent']['enquiry_date']) ? date("Y-m-d", strtotime(trim($data['aStudent']['enquiry_date']))) : '0000-00-00';
	$dob				=	($data['aStudent']['dob']) ? date("Y-m-d", strtotime(trim($data['aStudent']['dob']))) : '0000-00-00';
	$course 			=	trim($data['aStudent']['course']);
	$program			=	trim($data['aStudent']['program']);
	$source				=	trim($data['aStudent']['source']);	
	$email				=	trim($data['aStudent']['email']);
	$gender  			=	trim($data['aStudent']['gender']);
	$prefered_country	=	trim($data['aStudent']['prefered_country']);
	$counsellor_id		=	trim($data['aStudent']['counsellor_id']);	
	$counsellor_name	=	trim($data['aStudent']['counsellor_name']);
	$centre  			=	trim($data['aStudent']['centre']);
	$remarks			=	trim($data['aStudent']['remarks']);
	$address			=	trim($data['aStudent']['address']);
	
	if($name != ''){
		$sqlInsStuInfo	= " INSERT INTO `student_enquiry`(`name`, `parent_name`, `institution`, `qualification`, `student_mobile`, `parent_mobile`, `enquiry_date`, `dob`, `course`, `program`, `source`, `email`, `gender`, `prefered_country`, `counsellor_id`, `counsellor_name`,`address`, `remarks`, `centre`) VALUES ('".$name."','".$parent_name."','".$institution."','".$qualification."','".$student_mobile."','".$parent_mobile."','".$enquiry_date."','".$dob."','".$course ."','".$program."','".$source."','".$email."','".$gender."','".$prefered_country."','".$counsellor_id."','".$counsellor_name."','".$address."','".$remarks."','".$centre."')";
		$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);
		if($exeInsStuInfo) {			
			$arr	=	array('Status' => TRUE, 'message' => "Enquiry added successfully");
		} else {
			$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
		}
	}else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
	}
	exit;	

	$json_response = json_encode($arr);
		echo $json_response;

?>