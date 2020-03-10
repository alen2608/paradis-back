<?php 
session_start();
include "mysqli.func.php";
if (!isset($_SESSION["UserName"])) {
  header("Location: login.php");
  exit();
}
//載入資料庫連線參數
require_once('conn.php'); ?>
<?php
//取得上頁傳來的ID變數

//從資料庫取出資料並放入資料集這sql語法主要是取出要修改的該品牌資料
mysqli_select_db($conn,$database_conn);
$query_rs = sprintf("SELECT * FROM companys WHERE CompanyID ='". $_GET['id']."'");
$rs = mysqli_query($conn,$query_rs);
$row_rs = mysqli_fetch_assoc($rs);
$totalRows_rs = mysqli_num_rows($rs);
?><!DOCTYPE html>
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
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datetimepicker/datertimepicker.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">
            <a href="index.php"><img src="img/SVG/logo.svg" width="100"></a>
          </p>
          <li class="centered">
            <hr>
            <h5>
              歡迎！<?php echo $_SESSION['UserName'] ?>
            </h5>
            <hr>

          </li class="centered">
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span>會員管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="member_table.php">會員列表</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu" >
            <a href="javascript:;">
              <i class="fa fa-truck"></i>
              <span>廠商管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="supplier.php">廠商列表</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-star"></i>
              <span>品牌管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="company_list.php">品牌列表</a>
              </li>
              <li>
                <a href="company_add.php">新增品牌</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-shopping-cart"></i>
              <span>商品管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="basic_table.html">商品列表</a>
              </li>
              <li>
                <a href="basic_table.html">商品類別</a>
              </li>
              <li>
                <a href="form.html">新增商品</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file-text"></i>
              <span>訂單管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="basic_table.html">訂單列表</a>
              </li>
              <li>
                <a href="form.html">新增訂單</a>
              </li>
              <li>
                <a href="form.html">新增付款方式</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-calendar"></i>
              <span>行銷活動</span>
            </a>
            <ul class="sub">
              <li>
                <a href="discount.php">行銷活動管理</a>
              </li>
            </ul>
          </li>
        </ul>
        <ul>
          <li>
            <br>
            <a class="logout" href="login.php?logout=1">Logout</a>
          </li>
        </ul>
        <br>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> 品牌修改</h3>
        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <!-- /form-panel -->
</div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <!-- DATE TIME PICKERS -->
        <div class="row mt">
          <div class="col-lg-12">
            <!-- /form-panel -->
</div>
          <!-- /col-lg-12 -->
        </div>
        <!-- row -->
        <!--  TIME PICKERS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <form action="company_edit2.php" method="post" name="form1" class="form-horizontal  style-form" id="form1">
                <div class="form-group">
                  <label class="control-label col-md-3">品牌名稱</label>
                  <div class="col-md-4">
                    <div class="input-group bootstrap-timepicker">
                      <input name="CompanyName" type="text" class="form-control" id="CompanyName" value="<?php 
					  //在網頁上顯示從資料庫取出的品牌名稱
					  echo $row_rs['CompanyName']; ?>" size="30">
                    </div>
                  </div>
                </div>
				<div class="form-group">
                  <label class="control-label col-md-3">品牌網址</label>
                  <div class="col-md-4">
                    <div class="input-group bootstrap-timepicker">
                      <input name="CompanyURL" type="text" class="form-control  " id="CompanyURL" value="<?php 
					   //在網頁上顯示從資料庫取出的品牌網址
					  echo $row_rs['CompanyURL']; ?>" size="60">
                    </div>
                  </div>
                </div>
				<div class="form-group">
                  <label class="control-label col-md-3">品牌住址</label>
                  <div class="col-md-4">
                    <div class="input-group bootstrap-timepicker">
                      <input name="CompanyAddress" type="text" class="form-control " id="CompanyAddress" value="<?php 
					   //在網頁上顯示從資料庫取出的品牌住址
					  echo $row_rs['CompanyAddress']; ?>" size="80">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">品牌電話</label>
                  <input name="id" type="hidden" id="id" value="<?php echo $row_rs['CompanyID']; ?>">
                  <div class="col-md-4">
                    <div class="input-group bootstrap-timepicker">
                      <input name="CompanyPhone" type="text" class="form-control " id="CompanyPhone" value="<?php
 //在網頁上顯示從資料庫取出的品牌電話
					  echo $row_rs['CompanyPhone']; ?>" size="30">
                    </div>
                  </div>
                </div>
                <div class="form-group savecancel">
                  <label class="control-label col-md-3"></label>
                  <div class="col-md-4">
                    <button class="btn btn-theme" type="submit">Save</button>
                    <button class="btn btn-theme04" type="button">Cancel</button>
                    <a href="company_list.php">回上頁</a></div>
                  <div align="center"></div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- row -->
        <!--ADVANCED FILE INPUT-->
        <div class="row mt">
          <div class="col-lg-12">
            <!-- /form-panel -->
</div>
          <!-- /col-lg-12 -->
        </div>
        <!-- row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          彩妝Paradis小專題發表
        </p>
        <!-- <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div> -->
        <a href="form.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="lib/advanced-form-components.js"></script>

</body>

</html>
 