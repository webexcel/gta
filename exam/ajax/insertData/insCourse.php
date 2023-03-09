<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);
//$yearId	=	$_SESSION['YEAR_ID'];
	

	$courseName	=	trim($data['aCourse']['courseName']);
	$program	=	trim($data['aCourse']['program']);	
	$timing 	=	trim($data['aCourse']['timing']);
	$feeamount  =	trim($data['aCourse']['feeamount']);
	$centre		=	trim($data['aCourse']['centre']);

	if($courseName != ''){
		$sqlInsStuInfo	= "INSERT INTO `tbl_course`(`course`, `program`, `duration`, `amount`, `center`) VALUES ('".$courseName."','".$program."','".$timing."','".$feeamount ."','".$centre."')";
		$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);
	
		if($exeInsStuInfo) {			
			$arr	=	array('Status' => TRUE, 'message' => "Course added successfully");
		} else {
			$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
		}
	}else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
	}
		

	$json_response = json_encode($arr);
	echo $json_response;

?>