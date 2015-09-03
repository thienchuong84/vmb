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
    <title>Thêm Khách Hàng</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/vmb.css">
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
    <?php include 'includes/search.php'; ?>


    <div class="container">         
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6"><label style="margin-top: 7px;">Thông tin khách hàng</label></div>
                  <div class="col-xs-6"><button type="button" class="btn btn-default pull-right">Lưu</button></div>
                </div>
              </div>

              <div class="panel-body">
                <form class="form" role="form">

                  <div class="row">
                    <div class="form-horizontal form-group">
                    <label class="control-label col-md-1" for="hoten"  class="col-md-1 right">Tên:</label>
                    <div class="col-md-5"><input type="text" class="form-control" id="hoten" placeholder=""></div>
                    <label class="col-md-1" for="sdt">Số đt</label>
                    <div class="col-md-5"><input type="text" class="form-control" id="sdt" name="sdt" placeholder=""></div>
                  </div>

                </form><!-- END form -->

              </div>

            </div><!-- END panel -->
    </div>









    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <script>

    </script>    
  </body>
</html>