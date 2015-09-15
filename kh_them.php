<?php 
session_start();
require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
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
            <div class="col-xs-6"><button type="button" class="btn btn-default pull-right" id="luu_kh">Lưu</button></div>
          </div>
        </div>

        <div class="panel-body">
          <form class="form-horizontal" id="f_luu_kh" role="form" action="kh_detail.php" method="post">
              

            <div class="form-group">
              <label class="control-label col-md-1" for="hoten"><b style="color: red;">* </b>Tên:</label>
              <div class="col-md-3"><input type="text" class="form-control" id="hoten" name="hoten" placeholder="" required></div>
              <label class="control-label col-md-1" for="hoten"><b style="color: red;">* </b>Số ĐT1:</label>
              <div class="col-md-3"><input type="text" class="form-control" id="sdt1" name="sdt1" placeholder="" required></div>
              <label class="control-label col-md-1" for="hoten">Số ĐT2:</label>
              <div class="col-md-3"><input type="text" class="form-control" id="sdt2" name="sdt2" placeholder=""></div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-1" for="diachi">Địa chỉ:</label>
              <div class="col-md-5"><input type="text" class="form-control" id="diachi" name="diachi" placeholder=""></div>
              <label class="control-label col-md-1" for="note_dc">Note Đ/c:</label>
              <div class="col-md-5"><input type="text" class="form-control" id="note_dc" name="note_dc" placeholder=""></div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-1" for="mota_kh">Ghi chú:</label>
              <div class="col-md-5"><input type="text" class="form-control" id="mota_kh" name="mota_kh" placeholder=""></div>
              <label class="control-label col-md-1" for="email">Email:</label>
              <div class="col-md-5"><input type="text" class="form-control" id="email" name="email" placeholder=""></div>
            </div>               

            <hr>

            <div class="form-group">
              <div class="col-md-2">
                <select id="sel_trangthai" name="sel_trangthai" class="form-control" style="margin-bottom: 7px;">
                  <option value="1">Tư vấn</option>
                  <option value="2">Đặt mua</option>
                  <option value="3">Đã mua</option>
                  <option value="4">Hủy</option>
                </select>
              </div>
              <div class="col-md-2">
                <select id="sel_calltype" name="sel_calltype" class="form-control">
                  <option value="1">Call in</option>
                  <option value="2">Call out</option>
                </select>
              </div>
              <div class="col-md-8">
                <input type="text" id="txt_call_detail" name="txt_call_detail" class="form-control">
              </div>                
            </div>

          </form><!-- END form -->

        </div>

      </div><!-- END panel -->     
    </div>

    <div class="container">
      <div id="show_result"></div>
    </div>









    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/kh_them.js"></script>
    <script>

    </script>    
  </body>
</html>