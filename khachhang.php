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
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
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


      <h3 style="color: red;">Khách hàng</h3>



    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="container-fluid nopadding">
          <div class="row">
            <div class="col-md-4">
              <form class="form-inline">
                <input id="SearchValue" class="form-control" type="text" value="" placeholder="CellPhone or Lastname" name="SearchValue">
                <button id="btnCustomerSearch" class="btn btn-default inline" type="button"><span class="glyphicon glyphicon-search"></span> Search</button>
              </form>
            </div>
            <div class="col-md-4">
            
            
            </div>
          </div>
        </div>
    </div>


















    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>