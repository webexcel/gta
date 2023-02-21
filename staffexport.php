<?php
require_once('login/configi.php');

$url = "formats/staff_list.csv";
  
//echo "Your file is being checked. <br>";
  
$file_name = basename($url); 
  
$info = pathinfo($file_name);
  

if ($info["extension"] == "csv") {
  
   
    header("Content-Description: File Transfer"); 
    header("Content-Type: application/octet-stream"); 
    header(
    "Content-Disposition: attachment; filename=\""
    . $file_name . "\""); 
    //echo "File downloaded successfully";
    readfile ($url);
} 
  
else echo "Sorry, that's not a CSV file";
   
exit();
?>