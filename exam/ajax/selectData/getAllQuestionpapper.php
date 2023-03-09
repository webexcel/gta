<?php
require_once('../../login/configi.php');
session_start();

$query	=	"SELECT t1.`qpid`,t1.`quspapper_name`,t2.sid,t2.staff_name FROM `questionpapper` t1 join staff_info t2 on t1.`faculty_id` = t2.sid  WHERE t1.`status` = '0'";	
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
	