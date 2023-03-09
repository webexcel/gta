<?php 

require_once('../../login/configi.php');

$data	 =	json_decode(file_get_contents('php://input'), true);

$qid =	$data['qus']['quspapper_name']['qpid'];
$qno =	$data['qus']['qno'];		

$query	=	"SELECT * FROM `questionpapper` WHERE `qpid` = '".$qid."'";	
$result1 =	$mysqli->query($query);
$row = $result1->fetch_assoc();
$qusid = $row['qpid'];
$qusname = $row['quspapper_name'];
$fid = $row['faculty_id'];

$query1	=	"SELECT * FROM `questionbank` WHERE `id` = '".$qno."'";	
$result2 =	$mysqli->query($query1);
$row1 = $result2->fetch_assoc();
$type = $row1['type'];
$question = $row1['question'];
$que_image = $row1['que_image'];
$level = $row1['level'];
$topic = $row1['topic'];
$options = $row1['options'];
$answer = $row1['answer'];
$explanation = $row1['explanation'];
$ans_image = $row1['ans_image'];


	$sqlapp =  "INSERT INTO `question_papper_map`(`apids`,`qpname`, `fid`, `type`, `question`, `que_image`, `level`, `topic`, `options`, `answer`, `explanation`, `ans_image`) VALUES  ('".$qusid."','".$qusname."','".$fid."','".$type."','".$question."','".$que_image."','".$level."','".$topic."','".$options."','".$answer."','".$explanation."','".$ans_image."')";						
	$result	=	$mysqli->query($sqlapp);
	$arr	=	array('Status' => TRUE, 'message' => 'Updated Successfully');

$json_response = json_encode($arr);
echo $json_response;
exit;
?>