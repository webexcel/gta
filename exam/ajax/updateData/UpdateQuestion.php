<?php

require_once('../../login/configi.php');

$data	=	json_decode(file_get_contents('php://input'), true);
$arr	=	array();


if( !empty($data) ) {
	$Eid		=	trim($data['uStudent']['Eid']);
	$Estype		=	trim($data['uStudent']['Estype']);
	$Equestion	=	trim($data['uStudent']['Equestion']);	
	$Elevel		=	trim($data['uStudent']['Elevel']);
	$Etopic		=	trim($data['uStudent']['Etopic']);
	$Eoptions	=	trim($data['uStudent']['Eoptions']);
	$Eanswer	=	trim($data['uStudent']['Eanswer']);
	$Eexplanation	=	trim($data['uStudent']['Eexplanation']);
	
	$Eque_image 	=   $data['uStudent']['Eque_image'];
	if(isset($data['uStudent']['Eque_image']['id'])){
		$Eque_image_id	=	$data['uStudent']['Eque_image']['id'];
		$sqlSelOthers1	=	"SELECT `img_path` FROM `img_lib` WHERE `id` = '".$Eque_image_id."'";
		$exeSelOthers1	=	$mysqli->query($sqlSelOthers1);
		$row1	=	$exeSelOthers1->fetch_assoc();		
		$Eque_image = $row1['img_path'];
		
	}

	$Eans_image 	= 	$data['uStudent']['Eans_image'];
	if(isset($data['uStudent']['Eans_image']['id'])){
	$Eans_image_id	=	$data['uStudent']['Eans_image']['id']; 
	$sqlSelOthers2	=	"SELECT `img_path` FROM `img_lib` WHERE `id` = '".$Eans_image_id."'";
	$exeSelOthers2	=	$mysqli->query($sqlSelOthers2);
	$row2	=	$exeSelOthers2->fetch_assoc();
	$Eans_image = $row2['img_path'];
	}

	
	$sqlSelOthers	=	"UPDATE `questionbank` SET `type`='".$Estype."',`question`='".$Equestion."',`que_image`='".$Eque_image."',`level`='".$Elevel."',`topic`='".$Etopic."',`options`='".$Eoptions."',`answer`='".$Eanswer."',`explanation`='".$Eexplanation."',`ans_image`='".$Eans_image."' WHERE `id` = '".$Eid."'";
	
	$exeSelOthers	=	$mysqli->query($sqlSelOthers);
	if($exeSelOthers) {
		$arr['message']	=	"SUCCESS";
	} else {
		$arr['message']	=	"FAILED";
	}
	
} else {
	echo "is empty";
}

$json_response = json_encode($arr);
echo $json_response;

?>