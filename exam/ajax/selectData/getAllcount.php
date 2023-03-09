<?php
require_once('../../login/configi.php');
session_start();
$data   =   json_decode(file_get_contents('php://input'), true);


$query1		=	" SELECT COUNT( `StId` ) AS enquiry FROM `student_enquiry`";
$exequery1	=	$mysqli->query($query1);
$res1		=	$exequery1->fetch_assoc();
$arr['enquiry']=	$res1['enquiry'];


$query2		=	" SELECT COUNT( `StId` ) AS enroll FROM `student_enroll` where status = '0'";
$exequery2	=	$mysqli->query($query2);
$res2		=	$exequery2->fetch_assoc();
$arr['enroll']=	$res2['enroll'];

$query3		=	" SELECT COUNT( `b_id` ) AS batch FROM `tbl_batch` where status = '0'";
$exequery3	=	$mysqli->query($query3);
$res3		=	$exequery3->fetch_assoc();
$arr['batch']=	$res3['batch'];

$query4     =	" SELECT COUNT( `c_id` ) AS course FROM `tbl_course` where status = '0'";
$exequery4	=	$mysqli->query($query4);
$res4		=	$exequery4->fetch_assoc();
$arr['course']=	$res4['course'];

$query5     =	" SELECT COUNT( `sid` ) AS staff FROM `staff_info` where status = '0'";
$exequery5	=	$mysqli->query($query5);
$res5		=	$exequery5->fetch_assoc();
$arr['staff']=	$res5['staff'];

$json_response = json_encode($arr);
echo $json_response;
exit;





?>
	