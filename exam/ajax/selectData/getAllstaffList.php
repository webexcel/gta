<?php
require_once('../../login/configi.php');
session_start();


$query	=	"SELECT sid,staff_name FROM `staff_info` WHERE `status` = '0'";	
$result	=	$mysqli->query($query);

$arr = array();
if($result->num_rows > 0) {
	$sno = 0;
	while($row = $result->fetch_assoc()) {
		$sno++;
		//$arr['img_path']		=	$row['img_path'];
		$arr[]	=	$row;
	}
}


$json_response = json_encode($arr);
echo $json_response;
exit;





?>
	