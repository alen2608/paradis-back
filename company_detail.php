<?php
require_once('conn.php');
include "mysqli.func.php";
?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_list = 30;
$pageNum_list = 0;
if (isset($_GET['pageNum_list'])) {
  $pageNum_list = $_GET['pageNum_list'];
}
$startRow_list = $pageNum_list * $maxRows_list;

mysqli_select_db($conn, $database_conn);
$query_list = "SELECT * FROM productsorts where CompanyID='" . $_GET['id'] . "' ORDER BY ProductSortID ASC";
$query_limit_list = sprintf("%s LIMIT %d, %d", $query_list, $startRow_list, $maxRows_list);
$list = mysqli_query($conn, $query_limit_list);
$row_list = mysqli_fetch_assoc($list);

if (isset($_GET['totalRows_list'])) {
  $totalRows_list = $_GET['totalRows_list'];
} else {
  $all_list = mysqli_query($conn, $query_list);
  $totalRows_list = mysqli_num_rows($all_list);
}
$totalPages_list = ceil($totalRows_list / $maxRows_list) - 1;

$queryString_list = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (
      stristr($param, "pageNum_list") == false &&
      stristr($param, "totalRows_list") == false
    ) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_list = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_list = sprintf("&totalRows_list=%d%s", $totalRows_list, $queryString_list);
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
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

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
            <a href="index.html"><img src="img/SVG/logo.svg" width="100"></a> </p>
          <li class="centered">
            <hr>
            <h5>
              歡迎！Admin </h5>
            <hr>
          </li class="centered">
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span>會員管理</span> </a>
            <ul class="sub">
              <li>
                <a href="basic_table.html">會員列表</a> </li>
              <li>
                <a href="form.html">新增會員</a> </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-truck"></i>
              <span>廠商管理</span> </a>
            <ul class="sub">
              <li>
                <a href="basic_table.html">廠商列表</a> </li>
              <li>
                <a href="form.html" .html">新增廠商</a> </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-star"></i>
              <span>品牌管理</span> </a>
            <ul class="sub">
              <li>
                <a href="basic_table.html">品牌列表</a> </li>
              <li>
                <a href="form.html">新增品牌</a> </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-shopping-cart"></i>
              <span>商品管理</span> </a>
            <ul class="sub">
              <li>
                <a href="basic_table.html">商品列表</a> </li>
              <li>
                <a href="basic_table.html">商品類別</a> </li>
              <li>
                <a href="form.html">新增商品</a> </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file-text"></i>
              <span>訂單管理</span>
              <span class="label label-theme pull-right mail-info">2</span> </a>
            <ul class="sub">
              <li>
                <a href="basic_table.html">訂單列表</a> </li>
              <li>
                <a href="form.html">新增訂單</a> </li>
              <li>
                <a href="form.html">新增付款方式</a> </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-calendar"></i>
              <span>行銷活動</span> </a>
            <ul class="sub">
              <li>
                <a href="calendar.html">行銷活動管理</a> </li>
              <li>
                <a href="basic_table.html">優惠種類列表</a> </li>
              <li>
                <a href="basic_table.html">優惠列表</a> </li>
              <li>
                <a href="form.html">新增活動管理</a> </li>
              <li>
                <a href="form.html">新增優惠</a> </li>


            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>UI Elements</span> </a>
            <ul class="sub">
              <li>
                <a href="general.html">General</a> </li>
              <li>
                <a href="buttons.html">Buttons</a> </li>
              <li>
                <a href="panels.html">Panels</a> </li>
              <li>
                <a href="font_awesome.html">Font Awesome</a> </li>
            </ul>
          </li>
        </ul>
        <ul>
          <li>
            <br>
            <a class="logout" href="login.html">Logout</a> </li>
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
        <h3><i class="fa fa-user"></i> 品牌詳情</h3>

        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <!-- 表單 -->
              <table class="table table-striped table-advance table-hover">
                <div class="pull-right">

                  <span>&emsp;</span> </div>
                <div>
                  <span>&emsp;</span> </div>
                <hr>
                <thead>
                  <tr>
                    <th>產品類別</th>
                    <th>產品名稱</th>
                    <th>產品單價</th>
                    <th>產品說明</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php do { ?>
                    <tr>
                      <td><?php if (isset($row_list['CategoryID'])) {
                            $ca = $row_list['CategoryID'];
                            $pssql = "SELECT * FROM Categories WHERE CategoryID ='$ca'";
                            $psresult = doresult($pssql);
                            $psrow = dolists($psresult);
                            echo $psrow['CategoryName'];
                          } else {
                            echo "無資料";
                          } ?></td>
                      <td><?php if (isset($row_list['ProductSortName'])) {
                            echo $row_list['ProductSortName'];
                          } ?></td>
                      <td><?php if (isset($row_list['UnitPrice'])) {
                            echo $row_list['UnitPrice'];
                          } ?></td>
                      <td><?php if (isset($row_list['ProductDetail'])) {
                            echo $row_list['ProductDetail'];
                          } ?></td>
                    </tr>
                  <?php } while ($row_list = mysqli_fetch_assoc($list)); ?>
                </tbody>
              </table>
            </div>
            <center><a href=company_list.php>回上頁</a></center>
            <!-- 換頁 -->
            <div class="dataTables_paginate paging_bootstrap pagination">
              <ul>
                <li class="prev disabled">
                  <a href="#">
                    <table border="0" width="50%" align="center">
                      <tr>
                        <td width="23%" align="center">
                          <?php if ($pageNum_list > 0) { // Show if not first page 
                          ?>
                            <a href="<?php printf("%s?pageNum_list=%d%s", $currentPage, 0, $queryString_list); ?>">First</a>
                          <?php } // Show if not first page 
                          ?> </td>
                        <td width="31%" align="center">
                          <?php if ($pageNum_list > 0) { // Show if not first page 
                          ?>
                            <a href="<?php printf("%s?pageNum_list=%d%s", $currentPage, max(0, $pageNum_list - 1), $queryString_list); ?>">Previous</a>
                          <?php } // Show if not first page 
                          ?> </td>
                        <td width="23%" align="center">
                          <?php if ($pageNum_list < $totalPages_list) { // Show if not last page 
                          ?>
                            <a href="<?php printf("%s?pageNum_list=%d%s", $currentPage, min($totalPages_list, $pageNum_list + 1), $queryString_list); ?>">Next</a>
                          <?php } // Show if not last page 
                          ?> </td>
                        <td width="23%" align="center">
                          <?php if ($pageNum_list < $totalPages_list) { // Show if not last page 
                          ?>
                            <a href="<?php printf("%s?pageNum_list=%d%s", $currentPage, $totalPages_list, $queryString_list); ?>">Last</a>
                          <?php } // Show if not last page 
                          ?> </td>
                      </tr>
                    </table>
                </li>
              </ul>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          彩妝Paradis小專題發表 </p>
        <!-- <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div> -->
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i> </a>
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



</body>

</html>