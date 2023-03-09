<?php
require_once('../../login/configi.php');
session_start();

$data   =   json_decode(file_get_contents('php://input'), true);

$StId	=	trim($data['aEmployee']);
$query	=	"SELECT * from staff_info where `sid` = '".$StId."';";
$result	=	$mysqli->query($query);

$arr = array();
if($result->num_rows > 0) {
	$sno = 0;
	while($row = $result->fetch_assoc()) {
		$sno++;
		$arr		=	$row;
	}
}


$json_response = json_encode($arr);
echo $json_response;
exit;





?>
	