<?php
session_start();
include("susqli.func.php");
if (!isset($_SESSION["UserName"])) {
  header("Location: login.php");
  exit();
}

if ($_SESSION['Level']=="Supplier"){
  exit("Access denied. <br> You aren't authorised to visit this page.");
}

function showAll()
{
  global $result;
  while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><input type='checkbox' name='checkbox[]' value="<?= $row['SupplierID'] ?>"></td>
      <td><img src=img/<?= $row['SupplierLogo'] ?> width='100'></td>
      <td><?= $row['SupplierName'] ?></td>
      <td><?= $row['SupplierBrand'] ?></td>
      <td><?= $row['SupplierPhone'] ?></td>
      <td><?= $row['SupplierEmail'] ?></td>
      <td><?= $row['SupplierAddress'] ?></td>

      <!-- 補上廠商網站 -->
      <td><?= $row['SupplierURL'] ?></td>
      <!--  -->
      
      <td><a href='updatesupplier.php?id=<?=$row['SupplierID']?>'>
          <button type='button' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i>&nbsp;修改</button></a>
        <a href='deletesupplier.php?id=<?=$row['SupplierID']?>'>
          <button type='button' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i>&nbsp;刪除</button>
    </tr>
<?php
  }
} ?>

<!-- 此段刪除 -->
<!-- mysqli_close($dblink);
?> -->
<!--  -->


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
  <script>
    function del() {
      var msg = "您真的確定要刪除嗎?";
      if (confirm(msg) == true) {
        return true;
      } else {
        return false;
      }
    }

    function checksupplierdatas() {
      if (document.querySelector(".SupplierName").value == '') {
        document.querySelector("#CheckSupplierName").innerHTML = "名稱不得為空白";
        document.querySelector(".SupplierName").focus();
        return false;
      }
      if ((document.querySelector(".PWst").value == '') && (document.querySelector(".PWnd").value == '')) {
        document.querySelector("#CheckPassword").innerHTML = "密碼不得為空白";
        document.querySelector(".PWst").focus();
        document.querySelector(".PWnd").focus();
        return false;
      }
      if (!CheckPW()) {
        return false;
      }

      if (document.querySelector("#SupplierEmail").value == '') {
        document.querySelector("#CheckSupplierEmail").innerHTML = "信箱不得為空白";
        document.querySelector("#SupplierEmail").focus();
        return false;
      }
      return true;
    };

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
  </script>
  <style>
    /* *{
        outline:1px solid black;
      } */
  </style>
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
            <a class="active" href="javascript:;">
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
            <a href="javascript:;">
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
    <form action="quickdelete.php" method="post">
      <section id="main-content">
        <section class="wrapper">
          <h3><i class="fa fa-user"></i> 廠商列表</h3>
          <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
                <!-- 表單 -->
                <table class="table table-striped table-advance table-hover" id='supplier_table'>
                  <div class="pull-right">

                    <!-- 新增資料的連結修改 -->
                    <button type="button" class="btn btn-info"><a style="color:white;" href="addsupplier.php"><i class=" fa fa-pencil-square-o"></i>&nbsp;新增資料</a></button>
                    <!--  -->

                    <span>&emsp;</span>
                  </div>
                  <div>
                    <span>&emsp;</span>
                    <button type="button" class="btn btn-primary" name="reverse" onclick="usel();">反選</button>
                    <button type="submit" class="btn btn-theme04" onclick="javascript:return del();"><i class="fa fa-trash-o"></i>&nbsp;刪除資料</button>

                  </div>
                  <hr>
                  <thead>
                    <tr>
                      <th width=80><input style="text-align:center; display:none;" type="checkbox" name="CheckAll" value="" id="CheckAll" />
                        <label for="CheckAll" type="button" class="btn btn-info data-toggle=" data-toggle="modal">全選</label></th>
                      <th>廠商Logo</th>
                      <th>廠商名稱</th>
                      <th>廠商旗下品牌</th>
                      <th>廠商電話</th>
                      <th>廠商Email</th>
                      <th>廠商地址</th>

                      <!-- 補上廠商網站 -->
                      <th>廠商網站</th>
                      <!--  -->

                      <th>權限</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php showAll() ?>
                  </tbody>
                </table>
              </div>
              <!-- /content-panel -->
            </div>
            <!-- /col-md-12 -->
          </div>
          <!-- /row -->
        </section>
      </section>
    </form>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!-- **********************************************************************************************************************************************************
        MODAL
        *********************************************************************************************************************************************************** -->
    <!-- Modal 新增資料-->
    <!-- Modal 新增資料 END-->

    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">

        <p>
          彩妝Paradis小專題發表
        </p>
        <!-- <div class="credits">
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div> -->
        <a href="#top" class="go-top">
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
      var oTable = $('#supplier_table').dataTable({
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
          $("input[name='checkbox[]']").prop("checked", true); //把所有的核取方框的property都變成勾選
        } else {
          $("input[name='checkbox[]']").prop("checked", false); //把所有的核取方框的property都取消勾選
        }
      })
    })

    function usel() {
      //變數checkItem為checkbox的集合
      var checkItem = document.getElementsByName("checkbox[]");
      for (var i = 0; i < checkItem.length; i++) {
        checkItem[i].checked = !checkItem[i].checked;
      }
    }
  </script>
</body>

</html>