<?php
require_once('../../login/configi.php');
session_start();

$data   =   json_decode(file_get_contents('php://input'), true);


$id	=	$data['qid'];

$query	= "SELECT * FROM `questionbank` WHERE `status` = '0' and `id` = '".$id."'";	
$result	=	$mysqli->query($query);


$arr = array();
if($result->num_rows > 0) {
	$sno = 0;
	while($row = $result->fetch_assoc()) {
		$sno++;
		$arr['Vid']			=	$row['id'];
		$arr['Vquestion']	=	$row['question'];
		$arr['Vque_image']	=	$row['que_image'];
		$arr['Voptions']	=	$row['options'];
		$arr['Vanswer']		=	$row['answer'];
		$arr['Vlevel']		=	$row['level'];
		$arr['Vexplanation']=	$row['explanation'];
		$arr['Vexp_img']	=	$row['ans_image'];
		$split = explode(',',$arr['Voptions']);
		$sn=0;		
		foreach($split as $key => $value){
			$sn++;
			$option[] = $sn." : ".$value;
				 
		}		
		$arr['Vexp_imgsss'] = $option;
	
	}
}

$json_response = json_encode($arr);
echo $json_response;
exit;





?>
	