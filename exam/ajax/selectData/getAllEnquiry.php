<?php
require_once('../../login/configi.php');
session_start();

$data   =   json_decode(file_get_contents('php://input'), true);

//$yearId		=	$_SESSION['YEAR_ID'];
//$section	=	trim($data['section']);

$query	=	"SELECT t1.*,t2.course,t3.center from `student_enquiry` t1 join 
tbl_course t2 on t1.course = t2.c_id join
tbl_center t3 on t1.centre = t3.cid  
where t1.`status` = '0' order by t1.StId DESC";	
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
	