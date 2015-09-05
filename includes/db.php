<?php

$dbhost 	= 'localhost';
$dbuser		= 'test';
$dbpass		= 'test@123456';
$db0		= 'vmb';

$connection = new mysqli($dbhost, $dbuser, $dbpass, $db0);
if ($connection->connect_error) die($connection->connect_error);

// nếu value là tiếng việt khi dùng hàm này lúc insert vào db sẽ gây ra lỗi font , chỉ dùng với value ko tiếng việt
function mysql_entities_fix_string($conn, $str){
	return htmlentities(mysql_fix_string($conn, $str));
}

// dùng hàm này với value có tiếng việt
function mysql_fix_string($conn, $str){
	if(get_magic_quotes_gpc()) $str = stripslashes($str);
	return $conn->real_escape_string($str);
}

// hàm này là hàm gộp chung 2 cái trên , chú ýý: nếu value có tiếng việt là bị lỗi khi insert vào db
function sanitizeString($var)
{
	global $connection;
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return $connection->real_escape_string($var);
}