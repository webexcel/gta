<?php
require_once('../login/configi.php');
session_start();
$studentId = $_SESSION['sid'];
$query = "SELECT *  FROM `question_paper_mapping` WHERE `student_id` =$studentId  AND DATE(created_at)=DATE(NOW())";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $questionpapperid = $row['question_papper_id'];
    $Questionquery = "SELECT *  FROM `questionbank` WHERE `question_papper_id` =$questionpapperid";
    $Questionresult = $mysqli->query($Questionquery);
    if ($Questionresult->num_rows > 0) {
        echo "<style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
        </style><table>
        <tr>
          <th>Question</th>
          <th>Your Answer</th>
          <th>Correct Answer</th>
        </tr>";
        $i = 0;
        $answeredQuestion = 0;
        $notAnsweredQuestion = 0;
        $totalAnswerdQuestion = 0;
        $correctansweredQuestion = 0;
        $worngAnsweredQuestion = 0;
        while ($Qestionrow = $Questionresult->fetch_assoc()) {
            $questionId = $Qestionrow['id'];
            $sql = "SELECT *  FROM `question_result` WHERE `question_id` = $questionId AND `student_id` = $studentId ORDER BY id DESC";
            $resultssss = $mysqli->query($sql);
            if ($resultssss->num_rows > 0) {
                $Qestionro = $resultssss->fetch_assoc();
                $answer = $Qestionro['result'];
                $answeredQuestion += 1;
            } else {
                $answer = '';
                $notAnsweredQuestion += 1;
            }
            if (trim($answer) == $Qestionrow['answer']) {
                $color = 'style="color: green;"';
                $correctansweredQuestion += 1;
            } else {
                $color = 'style="color: red;"';
                $worngAnsweredQuestion += 1;
            }
            // echo"<pre>";print_r($Qestionrow);exit;
            echo "<tr>
            <td>" . $Qestionrow['question'] . "</td>
            <td " . $color . ">" . $answer . "</td>
            <td>" . $Qestionrow['answer'] . "</td>
          </tr>";

            $i++;
        }
        echo "</table> <br>
        <table style=>
  <tr>
    <th>Total Answered Question:</th>
    <td>$answeredQuestion</td>
  </tr>
  <tr>
    <th>Total Not Answered Question:</th>
    <td>$notAnsweredQuestion</td>
  </tr>
  <tr>
    <th>Correct Answered Question:</th>
    <td>$correctansweredQuestion</td>
  </tr>

  <tr>
    <th>Worng Answered Question:</th>
    <td>$worngAnsweredQuestion</td>
  </tr>
  <tr>
    <th>Total Question</th>
    <td>$i</td>
  </tr>
</table>

        
        ";
    }


}