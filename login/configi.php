<?php
date_default_timezone_set('Asia/Kolkata');

$dbUser	=	($_SERVER['HTTP_HOST']=='localhost') ? 'root' : $_SESSION['dbuser'];
$dbPass	=	($_SERVER['HTTP_HOST']=='localhost') ? '' : $_SESSION['dbpass'];

define("DB_HOST", 'localhost');
define("DB_USER", 'namachi');
define("DB_PASS", 'Dreamscreen@321');
define("DB_NAME", 'gta');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
$mysqli -> set_charset("utf8");
?>