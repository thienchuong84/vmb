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

$a = "Nguyễn Thiên Chương";
echo $a;
$b = htmlentities($a);
echo "<br>".$b."<br>";

// check null , refer: http://php.net/manual/en/function.is-null.php
$c = "  ";
if(is_null($c)) echo "Null <br>";
else echo "Not Null <br>";

$d = "     a   ";
//$d = trim($d, " \t\n");
$d = strip_tags($d);
$d = htmlspecialchars($d);
$d = stripslashes($d);
echo "d".$d."d<br>";
if(is_null($d)) 
	echo "Null <br>";
else 
	echo "Not Null <br>";
?>

<script type="text/javascript">
	var str = "  bb  ";
	//alert("a"+str.trim()+"a");
</script>

<?php // php date , refer: http://php.net/manual/en/function.date.php
// set php datetime zone  , refer: http://php.net/manual/en/timezones.asia.php
echo "Date: ".date("d/m/Y H:i");
?>










    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>