<?php
require_once 'includes/db.php';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db0);
if ($conn->connect_error) die ("<b style='color:red'>Error when connect to DB : </b>".$conn->connect_error);

if(isset($_SERVER['PHP_AUTH_USER']) && 
	isset($_SERVER['PHP_AUTH_PW']) )
{
	$tmp_un 	= mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_USER']);
	$tmp_pw		= mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_PW']);

	$query		= "SELECT * from users WHERE user_name='$tmp_un'";
	$result		= $conn->query($query);
	if(!$result) die ("<b style='color:red'>Error login : </b>".$conn->error);
	elseif ($result->num_rows) {
		$row 	= $result->fetch_array(MYSQLI_NUM);
			$result->close();
		$salt1	= "qm&h*";
		$salt2	= "pg!@";
		$token	= hash('ripemd128', "$salt1$tmp_pw$salt2");

		if ($token == $row[2]) {
			session_start();
			$_SESSION['username']	= $tmp_un;
			$_SESSION['password']	= $tmp_pw;
			$_SESSION['id']			= $row[0];

			header('Location: khachhang.php');
			//echo "Hi, $tmp_un"; //Test
		}
		else { //die ("Invalid username / password combination. <a href='logout.php'>Logout</a>");
			header('WWW-Authenticate: Basic realm="Retricted Secion"');
			header('HTTP/1.0 401 Unauthorized');
			die("Please enter your username and password to login. <a href='logout.php'>Logout</a>");
		}
	} else { //die ("User is not exist. <a href='logout.php'>Logout</a>");
		header('WWW-Authenticate: Basic realm="Retricted Secion"');
		header('HTTP/1.0 401 Unauthorized');
		die("Please enter your username and password to login. <a href='logout.php'>Logout</a>");
	}
}
else {
	header('WWW-Authenticate: Basic realm="Retricted Secion"');
	header('HTTP/1.0 401 Unauthorized');
	die("Please enter your username and password to login. <a href='logout.php'>Logout</a>");
}


?>