<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);
	
	$StId		=	trim($data['eStudent']['StId']);	
	$name 		=	trim($data['eStudent']['name']);
	$parent_name	=	trim($data['eStudent']['parent_name']);
	$institution	=	trim($data['eStudent']['institution']);
	$qualification	=	trim($data['eStudent']['qualification']);	
	$dob			=	($data['eStudent']['dob']) ? date("Y-m-d", strtotime(trim($data['eStudent']['dob']))) : '0000-00-00';
	$student_mobile	=	trim($data['eStudent']['student_mobile']);
	$parent_mobile	=	trim($data['eStudent']['parent_mobile']);	
	$course 	=	trim($data['eStudent']['course']);
	$program	=	trim($data['eStudent']['program']);
	$source	=	trim($data['eStudent']['source']);
	$email		=	trim($data['eStudent']['email']);
	$gender		=	trim($data['eStudent']['gender']);
	$prefered_country 	=	trim($data['eStudent']['prefered_country']);
	$counsellor_id	=	trim($data['eStudent']['counsellor_id']);
	$counsellor_name=	trim($data['eStudent']['counsellor_name']);
	$address		=	trim($data['eStudent']['address']);
	$remarks		=	trim($data['eStudent']['remarks']);	
	$centre 		=	trim($data['eStudent']['centre']);
	$batch			=	trim($data['eStudent']['batch']);
	$promocode		=	trim($data['eStudent']['promo']);
	//$photo		=	trim($data['eStudent']['photo']);
	$photo		= "HI";
	
	if($StId != ''){
		$sqlInsStuInfo	= "INSERT INTO `student_enroll`(`StId`, `name`, `parent_name`, `institution`, `qualification`, `student_mobile`, `parent_mobile`, `dob`, `course`, `program`,`source`, `email`, `gender`, `prefered_country`, `counsellor_id`, `counsellor_name`, `address`, `remarks`, `centre`, `batch`, `promocode`, `photo`) VALUES ('".$StId."',
		'".$name."',
		'".$parent_name."', 
		'".$institution."',
		'".$qualification."',
		'".$student_mobile."',
		'".$parent_mobile."',
		'".$dob."', 
		'".$course."',
		'".$program."',
		'".$source."',
		'".$email."',
		'".$gender."',
		'".$prefered_country."',
		'".$counsellor_id."',
		'".$counsellor_name."', 
		'".$address."',
		'".$remarks."',
		'".$centre."', 
		'".$batch."',
		'".$promocode."', 
		'".$photo."')"; 
	
		$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);
	
	$sqlInsStuInfo1	= "update  `student_enquiry` set status = '1' where  StId = '".$StId."'";
		$exeInsStuInfo1	=	$mysqli->query($sqlInsStuInfo1);
	
		if($exeInsStuInfo) {			
			$arr	=	array('Status' => TRUE, 'message' => "Enrolled added successfully");
		} else {
			$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
		}
	}else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
	}
		

	$json_response = json_encode($arr);
	echo $json_response;

?>