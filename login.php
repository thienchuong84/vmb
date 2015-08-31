<?php
session_start();
if(isset($_SESSION['id'])) header('Location: khachhang.php');

require_once 'includes/db.php';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db0);
if($conn->connect_error) die("<b style='color: red'>Error when connect to DB : </b>".$conn->connect_error);

$tmp_user = $tmp_pass = "";

if(isset($_POST['loginname']))
    $tmp_user = mysql_entities_fix_string($conn, $_POST['loginname']);
if(isset($_POST['password']))
    $tmp_pass = mysql_entities_fix_String($conn, $_POST['password']);

$fail  = validate_username($tmp_user);
$fail .= validate_password($tmp_pass);

if($fail == ""){
    $sql = "SELECT * FROM users WHERE user_name='$tmp_user'";
    $result = $conn->query($sql);
    // kiểm tra sự tồn tại của $resulr, nếu nó ko tồn tại thì câu query lỗi.
    if(!$result) die("<b style='color: red'>Query error : </b>".$conn->error);
    else if ($result->num_rows) {  // check xem có row nào ko, nếu có thì tồn tại user này
        $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();
        $salt1 = "qm&h*";
        $salt2 = "pg!@";
        $token = hash('ripemd128', "$salt1$tmp_pass$salt2");

        if($token == $row[2]) {
            $_SESSION['id']         = $row[0];
            $_SESSION['user']       = $tmp_user;
            $_SESSION['pass']       = $token;
            header('Location: khachhang.php');
        } else $fail = "<b style='color: red'>Bạn nhập sai password</b>";        //chú ý: trong đây nếu dùng hảm return $fail thì sẽ bị trắng trang, chỉ cần gán giá trị cho nó thôi
    }
    else $fail = "<b style='color: red'>Không tồn tại user này.</b>";              // khác với hàm validate_username, ta reuturn vì đã có biến $fail để nhận giá trị trả về rồi tiếp tục thực hiện code
}

function validate_username($field){
    if($field == "") return "Bạn chưa nhập user.<br>";
    else if (strlen($field) < 5 || strlen($field) > 12)
        return "User chỉ từ 5 đến 12 ký tự";
    else if (preg_match("/[^a-zA-Z0-9._]/", $field))
        return "User chỉ được dùng ký tự a-z, A-Z, 0-9 dấu . và _<br>";
    return "";
}

function validate_password($field){
    if($field == "") return "Bạn chưa nhập password.";
    else if (strlen($field) <5 || strlen($field) > 12)
        return "Password chỉ từ 5 đến 12 ký tự.<br>";
    return "";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <style type="text/css">

    </style>

  </head>




    <div class="container" style="margin-top:40px">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Sign in to continue</strong>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="#" method="POST" onsubmit="return validate(this)">
                            <fieldset>
                                <div class="row">
                                    <div class="center-block">
                                        <img class="profile-img"
                                            src="images/vietnam_airlines_logo.png?sz=120" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </span> 
                                                <input class="form-control" placeholder="Username" name="loginname" type="text" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-lock"></i>
                                                </span>
                                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
                                        </div>
                                        <div id="output"><?php if(isset($fail)) echo $fail;  ?></div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!--
                    <div class="panel-footer ">
                        Don't have an account! <a href="#" onClick=""> Sign Up Here </a>
                    </div>
                -->
                </div>
            </div>
        </div>
    </div>









    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>

  </body>
</html>