<?php
require_once('../../login/configi.php');
session_start();

$data   =   json_decode(file_get_contents('php://input'), true);


$stype	=	@$data['stype'];
$topic	=	@$data['topic'];
$level	=	@$data['level'];



if($stype == '' && $topic == '' && $level == ''){
	$query	=	"SELECT * FROM `questionbank` WHERE `status` = '0'";
}
else{
	$query	= "SELECT * FROM `questionbank` WHERE `status` = '0' and `type` = '".$stype."' and `topic` = '".$topic."' 
	and `level` = '".$level."' order by `id` desc";	
	
}
$result	=	$mysqli->query($query);
$arr = array();
if($result->num_rows > 0) {
	$sno = 0;
	while($row = $result->fetch_assoc()) {
		$sno++;
		$arr[]		=	$row;
	}
}


$json_response = json_encode($arr);
echo $json_response;
exit;





?>
	