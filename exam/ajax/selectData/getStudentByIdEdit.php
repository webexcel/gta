<?php
require_once('../../login/configi.php');
session_start();

$data   =   json_decode(file_get_contents('php://input'), true);
//$yearId		=	$_SESSION['YEAR_ID'];
$StId	=	trim($data['eStudent']);
$query	=	"SELECT t1.*,
t2.`pid`,
t3.`cid`,
t4.`c_id`
FROM `student_enroll` t1 
join `tbl_program` t2 on  t1.`program` = t2.`pid`
join `tbl_center` t3 on  t1.`centre` = t3.`cid`
join `tbl_course` t4 on  t1.`course` = t4.`c_id`
where t1.`StId` = '".$StId."';";

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
	