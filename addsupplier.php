<?php
session_start();

// 修改include檔案
include("susqli.func.php");
// 

if (!isset($_SESSION["UserName"])) {
  header("Location: login.php");
  exit();
}
if (isset($_COOKIE["logo"])) {
  $c = $_COOKIE["logo"];
} else {
  $c = "No cookie found";
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
  <script>
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
          <li class="sub-menu">
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
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-user"></i> 廠商列表</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <!-- 表單 -->
              <form action="" method="post" name="formAdd" id="formAdd" onsubmit="return checksupplierdatas()">
                <table class="table table-striped table-advance table-hover" id='_table'>
                  <div class="pull-right">

                    <span>&emsp;</span>
                  </div>
                  <div class="row mt" id="modal-new">
                    <div class="col-10">
                      <div class="form-panel">
                        <div class="pull-right">
                          <button type="button" class="btn btn-theme04"><a href="supplier.php" style="color:white;">返回廠商列表</a></button>
                        </div>
                        <br>
                        <div class="form" style="font-size:14pt; color:black;">
                          <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="">
                            <div class="form-group ">
                              <label for="lastname" class="control-label col-2">廠商Logo</label>
                              <div class="col-10">

                                <!-- type改為"text" -->
                                <input type="text" class=" form-control" id="SupplierLogo" name="SupplierLogo" value="<?= $c ?>" />
                                <!--  -->
                                
                                <a href="uploadlogo.php" style="word-spacing:  10px　">Upload a Logo</a>
                              </div>
                            </div>
                            <div class="form-group ">
                              <label for="firstname" class="control-label col-2">廠商名稱</label>
                              <div class="col-10">
                                <input class=" form-control SupplierName" id="SupplierName" name="SupplierName" type="text" />
                                <span id="CheckSupplierName" style="color :red"></span>
                              </div>
                            </div>

                            <!-- 刪除廠商帳號 -->
                            <!--  -->

                            <div class="form-group ">
                              <label for="password" class="control-label col-2">廠商密碼</label>
                              <div class="col-10">
                                <input class="form-control PWst" id="SupplierPassword" name="SupplierPassword" type="password" />
                                <span id="CheckPassword" style="color:red;"></span>
                              </div>
                            </div>

                            <div class="form-group ">
                              <label for="checkPPassword" style="width:100%;">請再輸入一次密碼：</label>
                              <div class="col-10">
                                <input class="form-control PWnd" name="checkPassword" type="password" placeholder="請再輸入一次密碼" onblur="CheckPW()" id="checkPassword" />
                                <span id="CheckPW" style="color:red;"></span>
                              </div>
                            </div>

                            <div class="form-group ">
                              <label for="username" class="control-label col-2">廠商旗下品牌</label>
                              <div class="col-10">
                                <input class="form-control " id="SupplierBrand" name="SupplierBrand" type="text" />
                              </div>
                            </div>
                            <div class="form-group ">
                              <label for="email" class="control-label col-2">廠商Email</label>
                              <div class="col-10">
                                <input class="form-control SupplierEmail" id="SupplierEmail" name="SupplierEmail" type="email" />
                                <span id="CheckSupplierEmail" style="color:red;"></span>
                              </div>
                            </div>
                            <div class="form-group ">
                              <label for="email" class="control-label col-2">廠商電話</label>
                              <div class="col-10">
                                <input class="form-control " id="SupplierPhone" name="SupplierPhone" />
                              </div>
                            </div>
                            <div class="form-group ">
                              <label for="email" class="control-label col-2">廠商地址</label>
                              <div class="col-10">
                                <input class="form-control " id="SupplierAddress" name="SupplierAddress" />
                              </div>
                            </div>
                            <div class="form-group ">
                              <label for="email" class="control-label col-2">廠商網址</label>
                              <div class="col-10">
                                <input class="form-control " id="SupplierURL" name="SupplierURL" />
                              </div>
                            </div>
                            <div class="form-group">
                              <div align="center">
                                <input name="addsupplier" type="hidden" value="add">
                                <button class="btn btn-theme04" type="reset">重新填寫</button>
                                <button class="btn btn-theme" type="submit">確定新增</button>
                              </div>
                            </div>
                          </form>
                        </div>
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
            <h4 class="modal-title" id="myModalLabel">新增廠商</h4>
          </div>
          <!-- /row -->

          <div class="row mt" id="modal-new">
            <div class="col-10">
              <div class="form-panel">
                <div class="form">
                  <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="">
                    <div class="form-group ">
                      <label for="lastname" class="control-label col-2">SupplierLogo</label>
                      <div class="col-10">
                        <input class=" form-control" id="SupplierLogo" name="SupplierLogo" type="text" />
                        <a href="upload.php">Upload a Logo</a>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="firstname" class="control-label col-2">SupplierName</label>
                      <div class="col-10">
                        <input class=" form-control" id="SupplierName" name="SupplierName" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="lastname" class="control-label col-2">SupplierAccount</label>
                      <div class="col-10">
                        <input class=" form-control" id="SupplierAccount" name="SupplierAccount" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="password" class="control-label col-2">SupplierPassword</label>
                      <div class="col-10">
                        <input class="form-control " id="SupplierPassword" name="SupplierPassword" type="password" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-2">SupplierBrand</label>
                      <div class="col-10">
                        <input class="form-control " id="SupplierBrand" name="SupplierBrand" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-2">SupplierEmail</label>
                      <div class="col-10">
                        <input class="form-control " id="SupplierEmail" name="SupplierEmail" type="email" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-2">SupplierPhone</label>
                      <div class="col-10">
                        <input class="form-control " id="SupplierPhone" name="SupplierPhone" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-2">SupplierAddress</label>
                      <div class="col-10">
                        <input class="form-control " id="SupplierAddress" name="SupplierAddress" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-2">SupplierURL</label>
                      <div class="col-10">
                        <input class="form-control " id="SupplierURL" name="SupplierURL" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="pull-right">
                        <input name="addsupplier" type="hidden" value="add">
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
          $("input[name='Checkbox[]']").prop("checked", true); //把所有的核取方框的property都變成勾選
        } else {
          $("input[name='Checkbox[]']").prop("checked", false); //把所有的核取方框的property都取消勾選
        }
      })
    })
  </script>
</body>

</html>