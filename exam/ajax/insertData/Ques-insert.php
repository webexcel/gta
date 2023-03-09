<?php 
session_start();
$dbconnect = new  mysqli('localhost','namachi','Dreamscreen@321','gta'); 
if($dbconnect->connect_error){
	die('error'.$dbconnect->connect_error);
}
$data	=	json_decode(file_get_contents('php://input'), true);

/*echo "<pre>";
print_r($data);
exit();*/

$stype		=	$data['qus']['stype'];		
$question	=	$data['qus']['question'];
$images		=	$data['qus']['images']['img_path'];
$type		=	$data['qus']['type'];
$topic		=	$data['qus']['topic'];
$Answer		=	$data['qus']['Answer'];
$explain	=	$data['qus']['explain'];
$ans_image	=	$data['qus']['imgs']['img_path'];
$option		= 	$data['qus']['txt'];
//$option 	=   implode(',', $option1);



	/*$file_name = $_FILES['file_name1']['name'];
	$filenewpath1 = 'uploads/'.$file_name;
	move_uploaded_file($_FILES['file_name1']['tmp_name'], $filenewpath1);*/
	
	if($stype != ''){
	$sqlapp =  "INSERT INTO `questionbank`(`type`, `question`,`que_image`, `level`,`topic`, `options`, `answer`, `explanation`, `ans_image`) 
	VALUES ('".$stype."','".$question."','".$images."','".$type."','".$topic."','".$option."','".$Answer."','".$explain."','".$ans_image."')";
				
	mysqli_query($dbconnect, $sqlapp);	
	$arr	=	array('Status' => TRUE, 'message' => 'Updated Successfully');
	}
	
	$json_response = json_encode($arr);
	echo $json_response;
?>