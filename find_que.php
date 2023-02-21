<?php 
require_once('login/configi.php');


$stype = $_POST['stype'];


$rowdata ='';
                                        $query="SELECT * FROM `question_paper_mapping` as qpm 
										left join questionpapper as qp on qpm.q_name_id=qp.qpid
										left join staff_info as si on qp.faculty_id=si.sid 
										 left join questionbank as qb on qpm.q_no = qb.id                
										 where qp.qpid='".$stype."'";
										$result	=	$mysqli->query($query);
										 $cnt=1;
										while($row=mysqli_fetch_array($result))
                                    {
										$rowdata .= "<tr><td>".$cnt."</td><td>".$row['quspapper_name']."</td><td>".$row['staff_name']."</td><td>".$row['type']."</td><td>".$row['question']."</td><td>".$row['level']."</td></tr>";
									$cnt=$cnt+1;
									}
									
			echo $rowdata;						
?>