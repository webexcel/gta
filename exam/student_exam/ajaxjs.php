<?php
require_once('../login/configi.php');
$questionPapperId = $_POST['question'];
$result = $_POST['answer'];
$questionId = $_POST['test'];
$spendt = $_POST['spendt'];
$studentId = $_POST['stdent'];
$createdAt = date('Y-m-d h:i:s');
$date = date('Y-m-d');
$query = "SELECT *  FROM `question_result` WHERE `question_papper_id` = $questionPapperId AND `question_id` = $questionId AND `student_id` = $studentId AND DATE(created_at)='" . $date . "'";
$results = $mysqli->query($query);
if ($results->num_rows == 0) {
    $sqlInsStuInfo = "INSERT INTO `question_result`(`question_papper_id`, `question_id`, `result`, `student_id`, `spendt`,`created_at`) VALUES ('" . $questionPapperId . "','" . $questionId . "','" . $result . "','" . $studentId . "','" . $spendt . "','" . $createdAt . "')";
    $exeInsStuInfo = $mysqli->query($sqlInsStuInfo);
} else {
    $row = $results->fetch_assoc();
    $id = $row['id'];
    $sqlInsStuInfo = "UPDATE `question_result` SET `result`='" . $result . "',`modified_at`='" . $createdAt . "',`spendt`='" . $spendt . "' WHERE id = '" . $id . "'";
    $exeInsStuInfo = $mysqli->query($sqlInsStuInfo);
}
$arr = array('Status' => TRUE, 'message' => "Exam Data successfully");
$json_response = json_encode($arr);
echo $json_response;
?>