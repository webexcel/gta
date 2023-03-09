<?php


error_reporting(E_ALL ^ E_DEPRECATED);
echo "HI";
exit();
$dbhost = 'localhost';
$dbuser = 'namachi';
$dbpass = 'Dreamscreen@321';
$dbname = "gta";


$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);
date_default_timezone_set('Asia/Kolkata');
//$script_tz = date_default_timezone_get();
error_reporting(0);
?>