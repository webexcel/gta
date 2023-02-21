<?php 
session_start();
$dbconnect = new  mysqli('localhost','namachi','Dreamscreen@321','gta'); 
if($dbconnect->connect_error){
	die('error'.$dbconnect->connect_error);
}

$imgname  =	trim($_POST['imgname']);		

	$file_name = $_FILES['file_name1']['name'];
	$filenewpath1 = 'uploads/'.$file_name;
	move_uploaded_file($_FILES['file_name1']['tmp_name'], $filenewpath1);
	
	if($imgname != ''){
	$sqlapp	=  "INSERT INTO `img_lib`(`img_name`, `img_path`) VALUES ('".$imgname."','".$file_name."')";						
	if(!mysqli_query($dbconnect, $sqlapp)){
		echo("Error description: " . mysqli_error($dbconnect));
	//header("Location: somethingwentwrong.php");
	}
	else{
	header("Location: addimagelib.php");	
	}
	}
	mysqli_close($dbconnect);
?>