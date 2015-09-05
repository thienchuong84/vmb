<?php
session_start();
if(!isset($_SESSION['id'])) header('Location: login.php');
require_once 'includes/db.php';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db0);
if($conn->connect_error) die($conn->connect_error);

//echo "id: ".$_SESSION['id']; //TEST
//echo "<br>created_date: ".date("d/m/Y");  //TEST

// insert Khách khàng và số điện thoại
if(isset($_POST['add_hoten']) and isset($_POST['add_sdt1'])) {
	$hoten 		= mysql_fix_string($conn, $_POST['add_hoten']);
	$sdt1		= mysql_entities_fix_string($conn, $_POST['add_sdt1']);
	$sdt2		= mysql_entities_fix_string($conn, $_POST['add_sdt2']);
	$diachi		= mysql_fix_string($_POST['add_diachi']);
	$note_dc	= mysql_fix_string($conn, $_POST['add_note_dc']);
	$email		= mysql_entities_fix_string($conn, $_POST['add_email']);
	$mota_kh	= mysql_fix_string($conn, $_POST['add_mota_kh']);
	$created_id = $_SESSION['id'];
	$date_add	= date("d/m/Y"); //DATE_FORMAT(NOW(),"%d/%m/%Y")

	$sql = "INSERT INTO contacts (fullname, address, note_address, email, description, created_by_id, created_date) VALUES 
			('$hoten', '$diachi', '$note_dc', '$email', '$mota_kh', '$created_id', '$date_add')";
	//$sql = "INSERT INTO contacts (fullname, created_by_id, created_date) VALUES ('Thanh Vu', '1', '05/09/2015')";		

	//ở đây chỉ có insert nên ta ko cần khai báo result ...
	$conn->query("SET NAMES utf8");
	if($conn->query($sql) === TRUE) {
		$last_id = $conn->insert_id;	// $last_id = mysqli_insert_id($con);		refer: http://www.w3schools.com/php/php_mysql_insert_lastid.asp http://www.w3schools.com/php/func_mysqli_insert_id.asp
		$sql2 = "INSERT INTO phones (contact_id, phone) VALUES ('$last_id', '$sdt1')";
		if($conn->query($sql2) === FALSE) die ("<b>at phone1</b>" . $conn->error);
		if($sdt2 != "") {
			$sql3 = "INSERT INTO phones (contact_id, phone) VALUES ('$last_id', '$sdt2')";
			if($conn->query($sql3) === FALSE) die ("<b>at phone2</b>" . $conn->error);
		}
	} else die ("<b>at contact</b>" . $conn->error);
	$conn->close();

	// 	có thể xử lý tiếp dưới đây để xuất qua bên trang kia
}


?>