<?php
require_once('../../login/configi.php');
session_start();
$studentId = $_SESSION['sid'];
$query = "SELECT questionbank.id,question_paper_mapping.question_papper_id,question,que_image,options,explanation  FROM `question_paper_mapping` 
INNER JOIN questionbank ON question_paper_mapping.question_papper_id = questionbank.question_papper_id
WHERE question_paper_mapping.student_id = $studentId AND question_paper_mapping.status = 0";
$result = $mysqli->query($query);
$alphas = range('A', 'Z');
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        unset($questionArray);
        if(isset($row) && !empty($row)){
            $optionsArray = explode(",", $row['options']);
            $i = 0;
            foreach ($optionsArray as $key => $value) {
                $questionArray[] = array(
                    $alphas[$i]=>$value
                );
                $i++;
    
            }
        }else{
            $questionArray=array();  
        }
       

        $arr[] = array(
            'id' => $row['id'],
            'question_papper_id' => $row['question_papper_id'],
            'question' => $row['question'],
            'que_image' => $row['que_image'],
            'options' => $questionArray,
            'explanation' => $row['explanation'],

        );
    }

    $json_response = json_encode($arr);
    echo $json_response;
    exit;

}

?>