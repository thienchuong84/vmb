<?php

$dbhost 	= 'localhost';
$dbuser		= 'test';
$dbpass		= 'test@123456';
$db0		= 'vmb';

function mysql_entities_fix_string($conn, $str){
	return htmlentities(mysql_fix_string($conn, $str));
}

function mysql_fix_string($conn, $str){
	if(get_magic_quotes_gpc()) $str = stripslashes($str);
	return $conn->real_escape_string($str);
}

function getInsert($conn, $sql){
	$result = $conn->query($sql);
}

?>