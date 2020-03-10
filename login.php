<?php
include "mysqli.func.php";
session_start();
$err = "";
if (isset($_POST["rememberme"])) {
  setcookie("email", $_POST["user"], time() + 24 * 60 * 60);
}
if (isset($_COOKIE["email"])) {
  $email = "value=" . '"' . $_COOKIE["email"] . '"';
} else {
  $email = "value=" . '"' . '"';
}
if (isset($_GET["logout"])) {
  session_destroy();
  header("Location: login.php");
  exit();
}
if (isset($_POST["login"])) {
  $user = $_POST["user"];
  $pw = $_POST["pw"];
  $sql = "SELECT * FROM Members WHERE MemberEmail = '$user'";
  $ssql = "SELECT * FROM suppliers WHERE SupplierEmail = '$user'";
  $result = doresult($sql);
  $sresult = doresult($ssql);
  $num = mysqli_num_rows($result);
  $snum = mysqli_num_rows($sresult);
  if ($num > 0) {
    $row = mysqli_fetch_array($result);
    $muser = $row['MemberEmail'];
    $mpw = $row['MemberPW'];
    $mname = $row['MemberName'];
    $mlv = $row['MemberLevel'];
    if ($user == $muser) {
      if ($pw == $mpw) {
        $_SESSION['UserName'] = $mname;
        $_SESSION['Level'] = $mlv;
        header("Location: index.php");
      } else {
        $err = "帳號或密碼錯誤";
      }
    } else {
      $err = "帳號或密碼錯誤";
    }
  } else
  if ($snum > 0) {
    $srow = mysqli_fetch_array($sresult);
    $suser = $srow['SupplierEmail'];
    $spw = $srow['SupplierPassword'];
    $sname = $srow['SupplierName'];
    if ($user == $suser) {
      if ($pw == $spw) {
        $_SESSION['UserName'] = $sname;
        $_SESSION['Level'] = "Supplier";
        header("Location: index.php");
      } else {
        $err = "帳號或密碼錯誤";
      }
    }
  } else {
    $err = "帳號或密碼錯誤";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Paradis</title>

  <!-- Favicons -->
  <link href="img/SVG/logo_pink.svg" rel="icon">
  <link href="img/SVG/logo_pink.svg" rel="icon_white">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link href="lib/advanced-datatable/css/DT_bootstrap.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <link href="css/new.css" rel="stylesheet">


  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="login.php" method="post" style="box-shadow: 2px 2px 7px #76224f;">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" name="user" id="user" <?= $email ?> placeholder="E-mail" autofocus>

          <br>
          <input type="password" class="form-control" name="pw" id="pw" placeholder="Password">
          <label class="checkbox" style="margin-left:20px"> <input type="checkbox" value="remember-me" id="rememberme" name="rememberme"> 記住我
            <span class="pull-right">
              <a data-toggle="modal" href="login.php#myModal"> 忘記密碼?</a>
            </span>
          </label>
          <button class="btn btn-theme btn-block" href="index.php" type="submit" id="login" name="login"><i class="fa fa-lock"></i> 登入</button>
          <span>&emsp;</span>
          <button type="button" class="btn btn-danger btn-block data-toggle=" data-toggle="modal" href="login.php#modalnew" id="newmodalbtn"><i class=" fa fa-pencil-square-o"></i>&nbsp;註冊</button>
          <span>&emsp;</span>

          <label><?php echo $err ?></label>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
  <!-- modal -->
  <!-- Modal 新增資料-->
  <div class="modal fade" id="modalnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">會員註冊</h4>
        </div>
        <!-- /row -->
        <div class="mt">
          <div class="col-10">
            <div class="form-panel">
              <div class="form">
                <form class="form-horizontal style-form" onsubmit="return checkmemberdatas()" method="post" action="http://localhost/paradis/api/members/">
                  <div class="editform">
                    <label for="MemberName">姓名：</label>
                    <input class="form-control NewName" name="MemberName" type="text" placeholder="請輸入姓名" />
                    <span id="CheckMemberName" style="color:red;"></span>
                    <label for="MemberPW">密碼：</label>
                    <input class="form-control PWst" type="password" placeholder="請設定密碼" />
                    <span id="PWst" style="color:red;"></span>
                    <label for="MemberPW" style="width:100%;">請再輸入一次密碼：</label>
                    <input class="form-control PWnd" name="MemberPW" type="password" placeholder="請再輸入一次密碼" onblur="CheckPW()" />
                    <span id="CheckPW" style="color:red;"></span>
                    <div class="editSex">
                      <label for="MemberSex" class="radio-inline">性別：</label>
                      <label class="radio-inline">
                        <input type="radio" name="MemberSex" value="M" checked>男
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="MemberSex" value="F">女
                      </label>
                    </div>
                    <br>
                    <div class="form-inline">
                      <label for="MemberBirthday" class="form-group" style="margin-top:10px">生日：</label>
                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="1990-01-01" class="input-append date dpYears form-group">
                        <input type="text" value="1990-01-01" name="MemberBirthday" class="form-control" style="margin-left:30px; margin-top:-35px">
                        <span class="input-group-btn add-on">
                          <button class="btn btn-theme" type="button" style="margin-top:-25px;"><i class="fa fa-calendar"></i></button>
                        </span>
                      </div>
                    </div>
                    <label for="MemberPhone">電話：</label>
                    <input class="form-control" name="MemberPhone" type="text" placeholder="請輸入電話" />
                    <label for="MemberEmail">信箱：</label>
                    <input class="form-control NewEmail" name="MemberEmail" type="email" placeholder="請輸入信箱" />
                    <span id="CheckMemberEmail" style="color:red;"></span>
                    <label for="MemberAddress">地址：</label>
                    <input class="form-control" name="MemberAddress" type="text" placeholder="請輸入地址" />
                    <br>
                      <input type="hidden" name="MemberLevel" value="Member" checked>
                  </div>
                  <div class="modal-footer">
                    <div class="editbtn pull-right">
                      <input class="btn btn-theme" id="postButton" type="submit" name="postButton" value="註冊" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
      </div>
    </div>
  </div>
  <!-- Modal 新增資料 END-->


  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- date picker -->
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <!-- <script src="lib/jquery-ui-1.9.2.custom.min.js"></script> -->
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="lib/advanced-form-components.js"></script>

  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
  <script>
    function CheckPW() {
      let PWst = document.querySelector(".PWst").value;
      let PWnd = document.querySelector(".PWnd").value;
      if (PWnd !== PWst) {
        document.querySelector("#CheckPW").innerHTML = "輸入的密碼不相同"
        return false;
      } else {
        document.querySelector("#CheckPW").innerHTML = ""
        return true;
      };
    };

    function checkmemberdatas() {
      if (document.querySelector(".NewName").value == '') {
        document.querySelector("#CheckMemberName").innerHTML = "姓名不得為空白";
        document.querySelector(".NewName").focus();
        return false;
      } else {
        document.querySelector("#CheckMemberName").innerHTML = "";
      }
      if (document.querySelector(".NewEmail").value == '') {
        document.querySelector("#CheckMemberEmail").innerHTML = "信箱不得為空白";
        document.querySelector(".NewEmail").focus();
        return false;
      } else {
        document.querySelector("#CheckMemberEmail").innerHTML = "";
      }
      if (document.querySelector(".PWst").value == '') {
        document.querySelector("#PWst").innerHTML = "密碼不得為空白";
        document.querySelector(".PWst").focus();
        return false;
      } else {
        document.querySelector("#PWst").innerHTML = "";
        if (!CheckPW()) {
          return false;
        }
      }
      return true;
    };
  </script>
</body>

</html>