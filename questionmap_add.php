<?php
require_once('login/configi.php');


if (isset($_POST['submit'])) {
	
	
	$Faculty=$_POST['Faculty'];
	$qno=$_POST['qno'];
	
	$query="SELECT qpid FROM `questionpapper` WHERE quspapper_name='".$Faculty."'";
	$results	=	$mysqli->query($query);
	$row = $results->fetch_assoc();
	$id=$row['qpid'];
  // echo "<pre>";print_r($id);exit(); 
    
	
	
	$sql = "INSERT into question_paper_mapping ( `q_name_id`, `q_no`)  
	            	values('$id','$qno')";
					echo $sql;
					$result	=	$mysqli->query($sql);
					
					if($result)
				{
					echo "<script type=\"text/javascript\">
							alert(\"sucesfully submited.\");
							window.location = \"addquestionpapperMapping.php\"
						</script>";
				
				}
				
	//
	
                        }
?>