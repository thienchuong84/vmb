<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap 101 Template</title>

	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
	<body>

<?php
require_once '../includes/db.php';

$conn	= new mysqli($dbhost, $dbuser, $dbpass, $db0);
if($conn->connect_error) die ("<b style='color: red'>adduser - Error when connect DB : ".$conn->connect_error);

if(isset($_POST['username']) &&
	isset($_POST['password']) &&
	isset($_POST['fullname']))
{
	$tmp_username	= mysql_entities_fix_string($conn, $_POST['username']); //echo $tmp_username;
	$tmp_password	= mysql_entities_fix_string($conn, $_POST['password']);
	$tmp_fullname	= mysql_entities_fix_string($conn, $_POST['fullname']);

	$salt1	= "qm&h*";
	$salt2	= "pg!@";
	$token	= hash('ripemd128', "$salt1$tmp_password$salt2");	

	$sql = "INSERT INTO users (user_name, user_hash, fullname) VALUES ('$tmp_username', '$token', '$tmp_fullname')";
	$result = $conn->query($sql);
	if(!$result) echo "INSERT failed: $sql<br>" . $conn->error . "<br><br>";
}
?>


<form class="form-horizontal" role="form" method="post" action="">
  <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Fullname:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter fullname" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>














    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>