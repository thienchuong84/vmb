<?php

$dbhost 	= 'localhost';
$dbuser		= 'test';
$dbpass		= 'test@123456';
$db0		= 'vmb';

$connection = new mysqli($dbhost, $dbuser, $dbpass, $db0);
if ($connection->connect_error) die($connection->connect_error);

// nếu value là tiếng việt khi dùng hàm này lúc insert vào db sẽ gây ra lỗi font , chỉ dùng với value ko tiếng việt
function mysql_entities_fix_string($conn, $str){
	//return htmlentities(mysql_fix_string($conn, $str));
	return htmlspecialchars(mysql_fix_string($conn, $str));
}

// dùng hàm này với value có tiếng việt
function mysql_fix_string($conn, $str){
	if(get_magic_quotes_gpc()) $str = stripslashes($str);
	return $conn->real_escape_string($str);
}

// hàm này là hàm gộp chung 2 cái trên , chú ý: nếu value có tiếng việt là bị lỗi khi insert vào db
// Update Sep 05: khi chuyển hàm htmlentities -> htmlspecialchars thì mọi thứ ok. htmlspecialchars chỉ convert các kí tự đặc biệt. còn htmlentities thì convert hết luôn. nên gây ra lỗi với tiếng việt
function sanitizeString($var) {
	global $connection;
	$var = strip_tags($var);
	$var = htmlspecialchars($var);
	$var = stripslashes($var);
	return $connection->real_escape_string($var);
}

function sanitizeString2($var) {
	global $connection;
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return $connection->real_escape_string($var);
}

function kiemtra_sdt($sdt) {
	global $connection;
	$row = 0;
	if($sdt == "") return "";
	else {
		$sql 	= "SELECT id FROM phones WHERE deleted='0' and phone='$sdt'";
		$result = $connection->query($sql);
		if(!$result) die("<b style='color: red'>Query error : </b>".$conn->error);
		else if ($result->num_rows){
			return "Đã tồn tại số điện thoại $sdt<br>";
		}			
		else
			return "";
	}
}