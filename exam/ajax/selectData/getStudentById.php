<?php
require_once('../../login/configi.php');
session_start();

$data   =   json_decode(file_get_contents('php://input'), true);
//$yearId		=	$_SESSION['YEAR_ID'];
$StId	=	trim($data['eStudent']);
$query	=	"SELECT t1 . * , t2.`program_name` , t3.`center` , t4.`course` , t5.`batch_name`
FROM `student_enroll` t1
JOIN `tbl_program` t2 ON t1.`program` = t2.`pid`
JOIN `tbl_center` t3 ON t1.`centre` = t3.`cid`
JOIN `tbl_course` t4 ON t1.`course` = t4.`c_id`
JOIN `tbl_batch` t5 ON t1.`batch` = t5.`b_id`
where t1.`StId` = '".$StId."'";

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
	