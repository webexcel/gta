<?php
require_once('../../login/configi.php');

session_start();
$data	=	json_decode(file_get_contents('php://input'), true);
//$yearId	=	$_SESSION['YEAR_ID'];
	

	$bname	=	trim($data['aBatch']['bname']);
	$program	=	trim($data['aBatch']['program']);
	$hours		=	trim($data['aBatch']['hours']);	
	$centre 	=	trim($data['aBatch']['centre']);
	$faculty    =	trim($data['aBatch']['faculty']);
	$type    	=	trim($data['aBatch']['type']);
	$sdate		=	($data['aBatch']['sdate']) ? date("Y-m-d", strtotime(trim($data['aBatch']['sdate']))) : '0000-00-00';
	$edate		=	($data['aBatch']['edate']) ? date("Y-m-d", strtotime(trim($data['aBatch']['edate']))) : '0000-00-00';

	if($faculty != ''){
		$sqlInsStuInfo	= "INSERT INTO `tbl_batch`(`batch_name`, `program_id`, `center_id`, `emp_id`, `start_date`, `end_date`, `timing`,`days`) VALUES 
		('".$bname."','".$program."','".$centre."','".$faculty ."','".$sdate."','".$edate."','".$hours."','".$type."')";
		$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);
	
		if($exeInsStuInfo) {			
			$arr	=	array('Status' => TRUE, 'message' => "Batch added successfully");
		} else {
			$arr	=	array('Status' =>FALSE, 'message' => 'Student addition failed. Please try again'.$mysqli->error);
		}
	}else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
	}
		

	$json_response = json_encode($arr);
	echo $json_response;

?>