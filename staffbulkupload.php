<?php
require_once('login/configi.php');


if(isset($_POST["Import"])){
		

		echo $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
			 fgetcsv($file);
			 $i = 0;
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
				 $enquiry_date = date("Y-m-d", strtotime($emapData[4]));
				 $dob = date("Y-m-d", strtotime($emapData[5]));
	   // echo "<pre>";print_r($emapData);exit();
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into staff_info ( `staff_name`, `Sur_name`, `contact`, `contact1`, `dob`, `doj`, 
			   `gender`, `job_type`, `Designation`, `email`, `address`, `aadhar`, `aadharImage`, 
			   `photo`, `qualification`, `reportingto`, `centre`, `staff_type`)  
	            	values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$enquiry_date','$dob','$emapData[6]'
					,'$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]','$emapData[15]'
					,'$emapData[16]','$emapData[17]')";
	         //we are using mysql_query function. it returns a resource on true else False on error
		 //echo $sql;exit();
			 $result	=	$mysqli->query($sql);
	         
				if(! $result )
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						</script>";
				
				}
 $i++;
	         }
			 $count_data=count($sql);
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	         echo "<script type=\"text/javascript\">
						alert(\"$i Records has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
	          
			 

			 //close of connection
			mysqli_close($conn); 
				
		 	
			
		 }
	}
?>