<?php
require_once('../../login/configi.php');
session_start();
$data	=	json_decode(file_get_contents('php://input'), true);
//$yearId	=	$_SESSION['YEAR_ID'];
	

	$stype		=	trim($data['aQus']['stype']);
	$question	=	trim($data['aQus']['question']);
	$type		=	trim($data['aQus']['type']);	
	$Answer 	=	trim($data['aQus']['Answer']);
	$explain    =	trim($data['aQus']['explain']);
	$option    	=	trim($data['aQus']['txt']);
	

	if($stype != ''){
		echo $sqlInsStuInfo	= "INSERT INTO `questionbank`(`type`, `question`, `level`, `options`, `answer`, `explanation`, `status`) VALUES 
		('".$stype."','".$question."','".$type."','".$option."','".$Answer."','".$explain."','0')";
		$exeInsStuInfo	=	$mysqli->query($sqlInsStuInfo);
	
		if($exeInsStuInfo) {			
			$arr	=	array('Status' => TRUE, 'message' => "Question added successfully");
		} else {
			$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
		}
	}else {
		$arr	=	array('Status' =>FALSE, 'message' => 'Please try again'.$mysqli->error);
	}
		

	$json_response = json_encode($arr);
	echo $json_response;

?>