<?php 
session_start();
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khach Hang</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/khachhang.css">
    <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="container-fluid">

    <?php include 'includes/navbar.php'; ?>
<?php /*
    <ul class="nav nav-tabs" style="margin-bottom: 5px;">
      <li class="active"><a href="#navSearch">Search</a></li>
      <li><a href="#navAdd">Thêm KH</a></li>
    </ul>

    <div class="tab-content">
      <div id="navSearch" class="tab-pane fade in active">
        <?php include 'khachhang_search.php'; ?>
      </div>
      <div id="navAdd" class="tab-pane fade">
        <p><?php include 'khachhang_add.php'; ?></p>
      </div>
    </div>
*/ ?>

    <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 5px;">
      <li role="presentation" class="active"><a href="#navSearch" aria-controls="navSearch" role="tab" data-toggle="tab">Search</a></li>
      <li role="presentation"><a href="#navAdd" aria-controls="navAdd" role="tab" data-toggle="tab">Thêm KH</a></li>
    </ul>

    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="navSearch"><?php include 'khachhang_search.php'; ?></div>
      <div role="tabpanel" class="tab pane fade" id="navAdd"><?php include 'khachhang_add.php'; ?></div>
    </div>














    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/khachhang.js"></script>

<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
$(document).ready(function(){
    $("#test").click(function(){
        $(this).tab('show');
    });
});
</script>    
  </body>
</html>