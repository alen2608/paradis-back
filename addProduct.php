<?php

include_once("mysqlConnect.php");

// 從資料庫撈出所有的「商品類別」資料
$sql_query = "SELECT CategoryID, CategoryName FROM categories;";
$result_Category = $db_link->query($sql_query);

// 從資料庫撈出所有的「品牌」資料
$sql_query = "SELECT CompanyID, CompanyName FROM Companys;";
$result_Company = $db_link->query($sql_query);

?>

<script>
  // 宣告使用的全域變數
  var table_count = 0;
</script>

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
            <a href="index.html"><img src="img/SVG/logo.svg" width="100"></a>
          </p>
          <li class="centered">
            <hr>
            <h5>
              歡迎！Admin
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
                <a href="basic_table.html">會員列表</a>
              </li>
              <li>
                <a href="form.html">新增會員</a>
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
                <a href="basic_table.html">廠商列表</a>
              </li>
              <li>
                <a href="form.html" .html">新增廠商</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-star"></i>
              <span>品牌管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="basic_table.html">品牌列表</a>
              </li>
              <li>
                <a href="form.html">新增品牌</a>
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
                <a href="product.php">商品列表</a>
              </li>
              <li>
                <a href="addProduct.php">新增商品</a>
              </li>
              <li>
                <a href="addProductType.php">新增商品類別</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-file-text"></i>
              <span>訂單管理</span>
              <span class="label label-theme pull-right mail-info">2</span>
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
                <a href="calendar.html">行銷活動管理</a>
              </li>
              <li>
                <a href="basic_table.html">優惠種類列表</a>
              </li>
              <li>
                <a href="basic_table.html">優惠列表</a>
              </li>
              <li>
                <a href="form.html">新增活動管理</a>
              </li>
              <li>
                <a href="form.html">新增優惠</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>UI Elements</span>
            </a>
            <ul class="sub">
              <li>
                <a href="general.html">General</a>
              </li>
              <li>
                <a href="buttons.html">Buttons</a>
              </li>
              <li>
                <a href="panels.html">Panels</a>
              </li>
              <li>
                <a href="font_awesome.html">Font Awesome</a>
              </li>
            </ul>
          </li>
        </ul>
        <ul>
          <li>
            <br>
            <a class="logout" href="login.html">Logout</a>
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
        <h3 class="text-danger"><i class="fa fa-suitcase text-warning"></i><b> 新增商品</b></h3>
        <div class="row mt">
          <div class="col-md-6">
            <div class="content-panel">
              <!-- 表格 -->
              <form action="controller.php" method="post" name="formFix" id="formFix">
                <table class="table table-striped class table-hover center table-bordered" id="colorTable">
                  <thead class="thead-dark">

                    <tr>
                      <th class="bg-primary text-center">欄位</th>
                      <th class="bg-primary text-center">資料</th>
                    </tr>
                    <tr>
                      <td><b>商品名稱</b></td>
                      <td><input type="text" name="productName" id="productName" size="50" value="" class="form-control form-control-inline input-medium default-date-picker"></td>
                    </tr>
                    <tr>
                      <td><b>商品類別</b></td>
                      <td>
                        <select name="categoryName">
                          <?php
                          while ($row_result = $result_Category->fetch_assoc()) :
                          ?>
                            <option value="<?= $row_result['CategoryID'] ?>" <?php if ($row_result['CategoryID'] == 1) echo "selected"; ?>>
                              <?= $row_result['CategoryName'] ?>
                            </option>
                          <?php endwhile; ?> 　　
                        </select>
                      </td>
                    </tr>

                    <tr>
                      <td><b>色票數量</b></td>

                      <td>
                        <!-- <input type="text" size="3" name="ColorChartNum" id="ColorChartNum"> -->
                        <select name="colorChartNum" id="ColorChartNum" onchange="addTableRow()">
                          <?php
                          for ($i = 1; $i <= 10; $i++) :
                          ?>
                            <option value="<?= $i ?>" <?php if ($i == 1) echo "selected"; ?>>
                              <?= $i ?>
                            </option>
                          <?php endfor; ?> 　　
                        </select>
                        <!-- <button type="button" onclick="addTableRow()"><b>確認</b></button> -->
                      </td>
                    </tr>

                    <tr>
                      <td><b>價格<b></td>
                      <td><input class="form-control form-control-inline input-medium default-date-picker" type="text" name="unitPrice" id="unitPrice" value=""></td>
                    </tr>

                    <tr>
                      <td><b>品牌</b></td>
                      <td>
                        <select name="companyName">
                          <?php
                          while ($row_result = $result_Company->fetch_assoc()) :
                          ?>
                            <option value="<?= $row_result['CompanyID'] ?>" <?php if ($row_result['CompanyID'] == 1) echo "selected"; ?>>
                              <?= $row_result['CompanyName'] ?>
                            </option>
                          <?php endwhile; ?>
                        </select>
                      </td>
                    </tr>

                    <tr>
                      <td><b>描述</b></td>
                      <td>
                        <textarea class="form-control form-control-inline input-medium default-date-picker" style="width:400px;height:100px;" name="productDetail" id="pName">

                        </textarea>
                      </td>
                    </tr>

                    <td colspan="2" align="center">
                      <input name="action" type="hidden" value="addData">
                      <input type="submit" name="button" id="button" value="更新資料"  class="btn btn-theme">
                      <a href="product.php"><input type="button" name="button2" id="button2" value="回上一頁" style="margin-left: 10px" class="btn btn-theme04"></a>
                    </td>

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
    <!-- **********************************************************************************************************************************************************
        MODAL
        *********************************************************************************************************************************************************** -->
    <!-- Modal 展開搜索-->
    <div class="modal fade" id="modalsearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-theme03">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            Hi there, I am a Modal Example for Dashio Admin Panel.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-theme03">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal 展開搜索 END-->
    <!-- Modal 新增資料-->
    <div class="modal fade" id="modalnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">新增會員</h4>
          </div>
          <!-- /row -->
          <div class="row mt" id="modal-new">
            <div class="col-10">
              <div class="form-panel">
                <div class="form">
                  <form class="cmxform form-horizontal style-form" id="signupForm" method="get" action="">
                    <div class="form-group ">
                      <label for="firstname" class="control-label col-2">Firstname</label>
                      <div class="col-10">
                        <input class=" form-control" id="firstname" name="firstname" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="lastname" class="control-label col-2">Lastname</label>
                      <div class="col-10">
                        <input class=" form-control" id="lastname" name="lastname" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-2">Username</label>
                      <div class="col-10">
                        <input class="form-control " id="username" name="username" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-2">Password</label>
                      <div class="col-10">
                        <input class="form-control " id="password" name="password" type="password" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="confirm_password" class="control-label col-2">Confirm Password</label>
                      <div class="col-10">
                        <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-2">Email</label>
                      <div class="col-10">
                        <input class="form-control " id="email" name="email" type="email" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="agree" class="control-label col-2">Agree to Our Policy</label>
                      <div class="col-10">
                        <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="pull-right">
                        <button class="btn btn-theme04" type="button">Cancel</button>
                        <button class="btn btn-theme" type="submit">Save</button>
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
    <!-- Modal 詳細檢視-->
    <div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            Hi there, I am a Modal Example for Dashio Admin Panel.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-theme">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal 詳細檢視 END-->
    <!-- Modal 修改資料-->
    <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-theme">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            Hi there, I am a Modal Example for Dashio Admin Panel.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-theme">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 修改資料 END-->
    <!--footer start-->
    <!-- <footer class="site-footer">
      <div class="text-center">

        <p>
          彩妝Paradis小專題發表
        </p>
         <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div> -->
    <a href="basic_table.html#" class="go-top">
      <i class="fa fa-angle-up"></i>
    </a>
    </div>
    </footer> -->
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

    function addTableRow() {

      let colorNum = parseInt(document.getElementById("ColorChartNum").value);
      let row;

      // 刪除色票表格
      let table_index = 4;
      while (table_count > 0) {
        document.getElementById("colorTable").deleteRow(table_index);
        table_count--;
      }


      let table = document.getElementById("colorTable");
      // 創建色票表格
      for (let count = 1; count <= colorNum; count++) {
        console.log(count);
        // ****************新增色票*******************
        row = table.insertRow(table_index++);
        row.insertCell(0).innerHTML =
          "<b> 色票 (" + count + ") </b>";
        row.insertCell(1).innerHTML =
          "<input type='text' size='20' name='ColorChart[]' value=''>";
        table_count++;

        // ****************新增庫存*******************
        row = table.insertRow(table_index++);
        row.insertCell(0).innerHTML =
          "<b> 色票 (" + count + ") - 庫存 </b>";
        row.insertCell(1).innerHTML =
          "<input type='text' size='20' name='unitsInStock[]' value=''>";
        table_count++;
      }

      // cell1.innerHTML = "NEW CELL1";
      // cell2.innerHTML = "<input type='text' size='3' name='unitsInStock' value=''>";
    }
  </script>
</body>

</html>