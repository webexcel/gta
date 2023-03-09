<?php
require_once('../../login/configi.php');

$data	=	json_decode(file_get_contents('php://input'), true);

if( !empty($data) ) {
	
	$Qid	=	trim($data['uStudent']['Qid']);
	$sqlStudentInfo	=	" UPDATE questionbank SET status = '1' WHERE id	= '".$Qid."'";		
	$exeStudentInfo	=	$mysqli->query($sqlStudentInfo);
	
	if( $exeStudentInfo ) {
		$arr['stats'] = true;
		$arr['message'] = "Success";
	} else {
		$arr['stats'] = false;
		$arr['message'] = "Faill";
	}
} else {
	$arr['stats'] = false;
	$arr['message'] = "Faill";
}


$json_response = json_encode($arr);
echo $json_response;
	

	

?>