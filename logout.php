<?php
session_start();

if(isset($_SESSION['id'])) {
	echo $_SESSION['username']." <a href='login.php'>Login</a><br>";
	destroy_session_and_data();
}



function destroy_session_and_data(){
	$_SESSION = array();
	setcookie(session_name(), '', time() - 2592000, '/');
	session_destroy();
}

?>