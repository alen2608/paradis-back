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
//以下是分頁程式和計算頁數
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_list = 30;
$pageNum_list = 0;
if (isset($_GET['pageNum_list'])) {
  $pageNum_list = $_GET['pageNum_list'];
}
$startRow_list = $pageNum_list * $maxRows_list;
//從資料庫取出資料並放入資料集這sql語法主要是取出全部的品牌資料
mysqli_select_db($conn, $database_conn);
$query_list = "SELECT * FROM companys";
$query_limit_list = sprintf("%s LIMIT %d, %d", $query_list, $startRow_list, $maxRows_list);
$list = mysqli_query($conn, $query_limit_list);
$row_list = mysqli_fetch_assoc($list);

//以下計算全部頁數和每頁顯示筆數
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
          <li class="sub-menu">
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
        <h3><i class="fa fa-user"></i>品牌列表</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <!-- 表單 -->
              <form method="post" name="checkdel" id="checkdel" action="company_del.php">
                <table class="table table-striped table-advance table-hover">
                  <div class="pull-right">
                    <a href="company_add.php">
                      <button type="button" class="btn btn-info "><i class=" fa fa-pencil-square-o"></i>&nbsp;新增資料</button>
                    </a><span>&emsp;</span>
                  </div>
                  <div>
                    <span>&emsp;</span>
                    <button type="submit" onclick="if(confirm('確實要刪除此條記錄嗎？')) return submit();else return false;" class="btn btn-theme04"><i class="fa fa-trash-o"></i>&nbsp;刪除資料</button>
                  </div>
                  <hr>
                  <thead>
                    <tr>
                      <th><input type="checkbox" name="CheckAll" value="" id="CheckAll" /></th>
                      <th>ID</th>
                      <th>品牌名稱</th>
                      <th>品牌網址</th>
                      <th>品牌住址</th>
                      <th>品牌電話</th>

                    </tr>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    do { ?>
                      <tr>
                        <td><input type="checkbox" name="Checkbox[]" value="<?= $row_list['CompanyID'] ?>" /></td>
                        <td><?php echo $row_list['CompanyID']; ?></td>
                        <td><a href=" company_detail.php?id=<?php echo $row_list['CompanyID']; ?>"><?php echo $row_list['CompanyName']; ?></td>
                        <td><?php echo $row_list['CompanyURL']; ?></td>
                        <td><?php echo $row_list['CompanyAddress']; ?></td>
                        <td><?php echo $row_list['CompanyPhone']; ?></td>
                        <td>
                          <button type="button" name="edit" id="edit" class="btn btn-primary btn-xs " onclick="location.href='company_edit.php?id=<?php echo $row_list['CompanyID'] ?>'"><i class="fa fa-pencil"></i>&nbsp;修改</button>
                          <button type="button" class="btn btn-danger btn-xs" onclick="if(confirm('確實要刪除此條記錄嗎？')) return location.href='company_del.php?id=<?php echo $row_list['CompanyID'] ?>'"><i class="fa fa-trash-o "></i>&nbsp;刪除</button>
                        </td>
                      </tr>
                    <?php } while ($row_list = mysqli_fetch_assoc($list)); ?>

                  </tbody>
                </table>
              </form>
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

    <footer class="site-footer">
      <div class="text-center">

        <p>
          彩妝Paradis小專題發表
        </p>
        <!-- <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div> -->
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    $(document).ready(function() {
      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#member_table').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $("#CheckAll").click(function() {
        if ($("#CheckAll").prop("checked")) { //如果全選按鈕有被選擇的話（被選擇是true）
          $("input[name='Checkbox[]']").prop("checked", true); //把所有的核取方框的property都變成勾選
        } else {
          $("input[name='Checkbox[]']").prop("checked", false); //把所有的核取方框的property都取消勾選
        }
      })
    })
  </script>
  <script>
    $("button[name=edit]").click(function() {
      let edit = $(this).attr('alt');
      $("#disid").val(edit);
      $.ajax({
        url: "server.php",
        type: "post",
        data: {
          "id": edit
        },
        success: function(data) {
          document.querySelector("#editdisname").value = data.disname;
          document.querySelector("#editdistype").value = data.dtname;
          document.querySelector("#editpdname").value = data.psname;
          document.querySelector("#editcaname").value = data.caname;
          document.querySelector("#editconame").value = data.coname;
          document.querySelector("#editsdate").value = data.sdate;
          document.querySelector("#editedate").value = data.edate;
        }
      });
    });
  </script>
</body>

</html>