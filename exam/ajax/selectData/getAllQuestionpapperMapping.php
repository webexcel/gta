<?php
require_once('../../login/configi.php');
session_start();

$query	=	"SELECT t1.`apids`,t2.`quspapper_name`,t1.fid,t1.type,t1.question,t1.level FROM question_papper_map t1 join`questionpapper` t2  on t1.`apids` = t2.qpid  WHERE t1.`status` = '0'";	
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
	