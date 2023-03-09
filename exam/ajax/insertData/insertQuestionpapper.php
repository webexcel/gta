<?php 

require_once('../../login/configi.php');

$data	 =	json_decode(file_get_contents('php://input'), true);

$qusname =	$data['qus']['qusname'];		
$sid	 =	$data['qus']['faculty']['sid'];

if($qusname != ''){
	echo $sqlapp =  "INSERT INTO `questionpapper`(`quspapper_name`, `faculty_id`) VALUES  ('".$qusname."','".$sid."')";						
	$result	=	$mysqli->query($sqlapp);
	$arr	=	array('Status' => TRUE, 'message' => 'Updated Successfully');
}

$json_response = json_encode($arr);
echo $json_response;
exit;
?>