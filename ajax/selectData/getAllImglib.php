<?php
require_once('../../login/configi.php');
session_start();

//$data   =   json_decode(file_get_contents('php://input'), true);

//$mgname = $_POST['mgname'];
//$query	=	"SELECT * FROM `img_lib` WHERE `status` = '0' and `img_name` LIKE '%".$mgname."%'";	
$query	=	"SELECT * FROM `img_lib` WHERE `status` = '0'";	
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
	