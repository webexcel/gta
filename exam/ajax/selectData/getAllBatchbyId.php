<?php
require_once('../../login/configi.php');
session_start();

$data   =   json_decode(file_get_contents('php://input'), true);

$b_id	=	trim($data['bid']);
$query	=	"SELECT  
t1.*, 
t2.`center`, 
t3.`program_name`, 
t4.`staff_name`
FROM `tbl_batch` t1 
join `tbl_center` t2 on  t1.`center_id` = t2.`cid` 
join `tbl_program` t3 on  t1.`program_id` = t3.`pid` 
join `staff_info` t4 on  t1.`emp_id` = t4.`sid` where t1.`status` = '0' AND t1.`b_id` = '".$b_id."'";	
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
	