<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);

	$enrollId		=	trim($data['getStudentByEdit']['enrollId']);	
	$name 			=	trim($data['getStudentByEdit']['name']);
	$parent_name	=	trim($data['getStudentByEdit']['parent_name']);
	$institution	=	trim($data['getStudentByEdit']['institution']);
	$qualification	=	trim($data['getStudentByEdit']['qualification']);	
	$dob			=	($data['getStudentByEdit']['dob']) ? date("Y-m-d", strtotime(trim($data['getStudentByEdit']['dob']))) : '0000-00-00';
	$student_mobile	=	trim($data['getStudentByEdit']['student_mobile']);
	$parent_mobile	=	trim($data['getStudentByEdit']['parent_mobile']);	
	$source 	=	trim($data['getStudentByEdit']['source']);
	$course 	=	trim($data['getStudentByEdit']['course']);
	$program	=	trim($data['getStudentByEdit']['program']);
	$email		=	trim($data['getStudentByEdit']['email']);
	$gender		=	trim($data['getStudentByEdit']['gender']);
	$prefered_country 	=	trim($data['getStudentByEdit']['prefered_country']);
	$counsellor_id	=	trim($data['getStudentByEdit']['counsellor_id']);
	$counsellor_name=	trim($data['getStudentByEdit']['counsellor_name']);
	$address		=	trim($data['getStudentByEdit']['address']);
	$remarks		=	trim($data['getStudentByEdit']['remarks']);	
	$centre 		=	trim($data['getStudentByEdit']['centre']);
	$batch			=	trim($data['getStudentByEdit']['batch']);
	$promocode		=	trim($data['getStudentByEdit']['promo']);
	$photo		= "HI";
	
	
	echo $sqlInsStuInfo	= " UPDATE `student_enroll` SET 
	`name`='".$name."',
	`parent_name`='".$parent_name."',
	`institution`='".$institution."',
	`qualification`='".$qualification."',
	`student_mobile`='".$student_mobile."',
	`parent_mobile`='".$parent_mobile."',
	`dob`='".$dob."',
	`course`='".$course."',
	`program`='".$program."',
	`source`='".$source."',
	`email`='".$email."',
	`gender`='".$gender."',
	`prefered_country`='".$prefered_country."',
	`counsellor_id`='".$counsellor_id."',
	`counsellor_name`='".$counsellor_name."',
	`address`='".$address."',
	`remarks`='".$remarks."',
	`centre`='".$centre."',
	`batch`='".$batch."',
	`promocode`='".$promocode."',
	`photo`='".$photo."' 
	where enrollId = '".$enrollId."'";
	$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);

	if($exeInsStuInfo) {			
		$arr	=	array('Status' => TRUE, 'message' => "Update Enrollment successfully");
	} else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
	}
	
		

	$json_response = json_encode($arr);
	echo $json_response;

?>