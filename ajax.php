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

	$sdt1		= mysql_entities_fix_string($conn, $_POST['add_sdt1']);
	$sdt2		= mysql_entities_fix_string($conn, $_POST['add_sdt2']);

	$fail 		=	kiemtra_sdt($sdt1);
	$fail	   .=	kiemtra_sdt($sdt2);

	if ($fail == "") {
		$hoten 		= mysql_fix_string($conn, $_POST['add_hoten']);
		$diachi		= sanitizeString($_POST['add_diachi']);
		$note_dc	= mysql_fix_string($conn, $_POST['add_note_dc']);
		$email		= mysql_entities_fix_string($conn, $_POST['add_email']);
		$mota_kh	= mysql_fix_string($conn, $_POST['add_mota_kh']);
		$created_id = $_SESSION['id'];
		$created_name = $_SESSION['user'];
		$date_add	= date("d/m/Y"); //DATE_FORMAT(NOW(),"%d/%m/%Y")

		$sql = "INSERT INTO contacts (fullname, address, note_address, email, description, created_by_id, created_date) VALUES 
				('$hoten', '$diachi', '$note_dc', '$email', '$mota_kh', '$created_id', NOW())";
		//$sql = "INSERT INTO contacts (fullname, created_by_id, created_date) VALUES ('Thanh Vu', '1', '05/09/2015')";		

		//ở đây chỉ có insert nên ta ko cần khai báo result ...
		$conn->query("SET NAMES utf8");
		//$conn->query("SET character_set_results=utf8");		// dùng khi query
		//$conn->query("SET character_set_client=utf8");
		//$conn->query("SET character_set_connection=utf8");
		if($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;	// $last_id = mysqli_insert_id($con);		refer: http://www.w3schools.com/php/php_mysql_insert_lastid.asp http://www.w3schools.com/php/func_mysqli_insert_id.asp
			//echo $last_id; //TEST
			$sql2 = "INSERT INTO phones (contact_id, phone) VALUES ('$last_id', '$sdt1')";
			if(!$conn->query($sql2)) die ("<b>at phone1</b>" . $conn->error);
			else { //
				if($sdt2 != "") {
					$sql3 = "INSERT INTO phones (contact_id, phone) VALUES ('$last_id', '$sdt2')";
					if(!$conn->query($sql3)) die ("<b>at phone2</b>" . $conn->error);
				}
		// xuất kết quả qua trang kh_them	
		//echo "gia tri fail:".$fail."<br>";	// TEST
		echo <<<_END

		<div class="panel panel-default">
		  <table class="table">
		    <thead>
		      <tr class="info">
		        <th>Tên</th>
		        <th>SĐT 1</th>
		        <th>SĐT 2</th>
		        <th>Địa chỉ</th>
		        <th>Note Đ/c</th>
		        <th>Ghi chú</th>
		        <th>Email</th>
		        <th>Tạo bởi</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		        <td>$hoten</td>
		        <td>$sdt1</td>
		        <td>$sdt2</td>
		        <td>$diachi</td>
		        <td>$note_dc</td>
		        <td>$mota_kh</td>
		        <td>$email</td>
		        <td>$created_name at $date_add</td>
		      </tr>
		    </tbody>	    	    
		  </table>
		</div>

_END;
			}

		} else die ("<b>at contact</b>" . $conn->error);
		$conn->close();
	}
	else {
		echo $fail;
	}

}






?>