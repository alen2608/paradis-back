<?php

include_once("mysqlConnect.php");

// 從資料庫撈出所有的「商品類別」資料
$sql_query = "SELECT CategoryID, CategoryName FROM categories;";
$result_Category = $db_link->query($sql_query);

// 從資料庫撈出所有的「品牌」資料
$sql_query = "SELECT CompanyID, CompanyName FROM Companys;";
$result_Company = $db_link->query($sql_query);

// 要修改的資料
$sql_query = "SELECT p.ProductName, cg.CategoryName, ps.UnitPrice, p.UnitsOnOrder, p.UnitsInStock, c.CompanyName, ps.ProductDetail, p.ProductSortID
from Products p
	JOIN ProductSorts ps ON ( p.ProductSortID = ps.ProductSortID )
    JOIN companys c on ( p.CompanyID = c.CompanyID )
    JOIN categories cg on ( cg.CategoryID = p.CategoryID )
WHERE p.ProductID = ?
order by  p.ProductID asc;";

$stmt = $db_link->prepare($sql_query);
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$stmt->bind_result($productName, $categoryName, $unitPrice, $unitsOnOrder, $unitsInStock, $companyName, $productDetail, $productSortID);
$stmt->fetch();

$productName = explode("-", $productName);
echo $productName[0],$productName[1];

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
        <h3 class = "text-danger"><i class="fa fa-suitcase text-warning"></i><b> 商品資料更新</b></h3>
        <div class="row mt">
          <div class="col-md-6">
            <div class="content-panel">
              <!-- 表格 -->
              <form action="Controller.php" method="post">
                <table class="table table-striped class table-hover center table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th>欄位</th>
                      <th>資料</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>商品名稱</td>
                      <td><input type="text" name="productSortName" id="productName" size="40" value="<?php echo $productName[0]; ?>"></td>
                    </tr>
                    <tr>
                      <td>色票</td>
                      <td><input type="text" name="productColor" id="productName" size="40" value="<?php echo $productName[1]; ?>"></td>
                    </tr>
                    <tr>
                      <td>商品類別</td>
                      <td>
                        <select name="categoryName">
                          <?php
                          while ($row_result = $result_Category->fetch_assoc()) :
                          ?>
                            <option value="<?= $row_result['CategoryID'] ?>" <?php if ($row_result['CategoryName'] == $categoryName) echo "selected"; ?>>
                              <?= $row_result['CategoryName'] ?>
                            </option>
                          <?php endwhile; ?> 　　
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>價格</td>
                      <td><input type="text" name="unitPrice" id="unitPrice" value="<?php echo $unitPrice; ?>"></td>
                    </tr>
                    <tr>
                      <td>庫存</td>
                      <td><input type="text" name="unitsOnOrder" id="unitsOnOrder" value="<?php echo $unitsInStock; ?>"></td>
                    </tr>
                    <tr>
                      <td>訂購數量</td>
                      <td><input type="text" name="unitsInStock" id="pName" value="<?php echo $unitsOnOrder; ?>"></td>
                    </tr>
                    <tr>
                      <td>品牌</td>
                      <td>
                        <select name="companyName">
                          <?php
                          while ($row_result = $result_Company->fetch_assoc()) :
                          ?>
                            <option value="<?= $row_result['CompanyID'] ?>" <?php if ($row_result['CompanyName'] == $companyName) echo "selected"; ?>>
                              <?= $row_result['CompanyName'] ?>
                            </option>
                          <?php endwhile; ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>描述</td>
                      <td>
                        <textarea style="width:400px;height:100px;" name="productDetail" id="pName">
                        <?php echo $productDetail; ?>
                    </textarea>
                      </td>
                    </tr>
                  </tbody>
                  <td colspan="2" style="margin-left: 90px">
                    <input name="productID" type="hidden" value="<?php echo $_GET["id"]; ?>">
                    <input name="productSortID" type="hidden" value="<?php echo $productSortID; ?>">
                    <input name="action" type="hidden" value="update">
                    <input type="submit" name="button" id="button" value="更新資料" style="margin-left: 220px" class="btn btn-theme">
                    <a href="product.php".php"><input type="button" name="button2" id="button2" value="取消" style="margin-left: 10px" class="btn btn-theme04"></a>
                  </td>
                  </tr>
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
    <footer class="site-footer">
      <div class="text-center">

        <p>
          彩妝Paradis小專題發表
        </p>
        <!-- <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div> -->
        <a href="basic_table.html#" class="go-top">
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
</body>

</html>