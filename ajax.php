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
		$hoten 			= mysql_fix_string($conn, $_POST['add_hoten']);
		$diachi			= sanitizeString($_POST['add_diachi']);
		$note_dc		= mysql_fix_string($conn, $_POST['add_note_dc']);
		$email			= mysql_entities_fix_string($conn, $_POST['add_email']);
		$mota_kh		= mysql_fix_string($conn, $_POST['add_mota_kh']);
		$created_id 	= $_SESSION['id'];
		$created_name 	= $_SESSION['user'];
		$date_add		= date("d/m/Y H:i"); //DATE_FORMAT(NOW(),"%d/%m/%Y") , refer: http://php.net/manual/en/function.date.php
		$sel_trangthai	= $_POST['add_sel_trangthai'];
		$sel_calltype 	= $_POST['add_sel_calltype'];
		$txt_call_detail= sanitizeString($_POST['add_txt_call_detail']);

		$sql = "INSERT INTO contacts (fullname, address, note_address, email, description, created_by_id, created_date) VALUES 
				('$hoten', '$diachi', '$note_dc', '$email', '$mota_kh', '$created_id', NOW())";			// refer: http://www.w3schools.com/sql/func_date_format.asp , DATE_FORMAT(NOW(), '%d/%m/%Y %H:%i')
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
			if(!$conn->query($sql2)) die ("<b style='color: red'>at phone1</b>" . $conn->error);
			else { //
				if($sdt2 != "") {
					$sql3 = "INSERT INTO phones (contact_id, phone) VALUES ('$last_id', '$sdt2')";
					if(!$conn->query($sql3)) die ("<b style='color: red'>at phone2</b>" . $conn->error);
				}
				// xuất kết quả qua trang kh_them	
				//echo "gia tri fail:".$fail."<br>";	// TEST giá trị fail bằng hàm validate của php
				//if($txt_call_detail == "") echo "call logs null"; else echo "call logs NOT null: ".$txt_call_detail;		// TEST : kiểm tra nếu nhập khoảng trống thì ko insert call logs

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

				// xử lý insert call logs nếu user nhập vào và show ra
				if($txt_call_detail != "") {
					$sql4 = "INSERT INTO calls (created_date, created_by_id, description, call_status_id, call_type_id) 
							VALUES (NOW(), $created_id, '$txt_call_detail', $sel_trangthai, $sel_calltype)";
					if(!$conn->query($sql4)) die ("<b style='color: red'>at insert call logs</b>" . $conn->error);
				}
			}

		} else die ("<b>at contact</b>" . $conn->error);
		$conn->close();
	}
	else {
		echo $fail;
	}

}






?>