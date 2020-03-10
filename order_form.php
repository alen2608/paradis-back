<?php





require "ProductDAO.php";

$productDAO = new ProductDAO();
$arr_productVOs = $productDAO->fetchAll();



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
  <link href="/project_serverside/project_serverside/img/SVG/logo_pink.svg" rel="icon">
  <link href="/project_serverside/project_serverside/img/SVG/logo_pink.svg" rel="icon_white">

  <!-- Bootstrap core CSS -->
  <link href="/project_serverside/project_serverside/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="/project_serverside/project_serverside/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="/project_serverside/project_serverside/lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="/project_serverside/project_serverside/lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="/project_serverside/project_serverside/lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="/project_serverside/project_serverside/lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="/project_serverside/project_serverside/lib/bootstrap-datetimepicker/datertimepicker.css" />
  <!-- Custom styles for this template -->
  <link href="/project_serverside/project_serverside/css/style.css" rel="stylesheet">
  <link href="/project_serverside/project_serverside/css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->

  <style>
    .entry:not(:first-of-type) {
      margin-top: 10px;
    }

    .glyphicon {
      font-size: 12px;
    }
  </style>


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
            <a href="/project_serverside/project_serverside/index.html"><img src="/project_serverside/project_serverside/img/SVG/logo.svg" width="100"></a>
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
                <a href="form.html">新增廠商</a>
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
              <span class="label label-theme pull-right mail-info">2</span>
            </a>
            <ul class="sub">
              <li>
                <a href="orderTable.php">訂單列表</a>
              </li>
              <li>
                <a href="order_form.php">新增訂單</a>
              </li>
              <!-- <li>
                <a href="form.html">新增付款方式</a>
              </li> -->
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
        <h3><i class="fa fa-angle-right"></i> 新增訂單</h3>


        <div class="row mt">
          <!--  DATE PICKERS -->
          <div class="col-lg-12">
            <div class="form-panel controls">

              <form id="itemPicker" role="form" autocomplete="off">

                <div class="entry input-group col-xs-6">
                  <?php
                  // print_r($arr_productVOs);
                  //  echo $arr_productVOs[0]->ProductID;

                  ?>
                  <select class="form-control" name="products[]">

                    <option value="" disabled selected>請選擇要購買的商品</option>

                    <?php

                    foreach ($arr_productVOs as $colName => $value) {
                      // echo "<option value=\"" . $value->ProductID . "\">" . $value->ProductName . "</option>";
                      $option = <<<optionItem
                        <option value="{$value->ProductID}">{$value->ProductName}</option>
                      optionItem;
                      echo $option;
                    }
                    ?>
                    <!-- <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="opel">Opel</option>-->
                  </select>

                  <!-- <span class="input-group-btn">
        <button class="btn btn-success btn-add" type="button">
            <span class="glyphicon glyphicon-plus"></span>
        </button>
        
    </span> -->

                  <span class="input-group-btn">
                    <button class="btn btn-success btn-add" type="button">
                      <span class="glyphicon glyphicon-plus"></span>
                    </button>
                  </span>

                  <!-- <h4>價錢</h4> -->
                </div>


              </form>










            </div>
          </div>
        </div>



        <!-- 送出訂單 block -->

        <!-- <div class="row mt">  改成 mt-1 -->
        <div class="row mt-1">
          <div class="col-lg-12">
            <div class="form-panel">
              <!-- <form action="#" class="form-horizontal style-form"> -->
              <!-- <button id="addNewItem" class="btn btn-theme btn-add" type="button">新增購買項目</button> -->
              <label class="control-label col-md-5"></label>
              <button id="putBtn" class="btn btn-theme" type="button">送出訂單</button>
              <!-- </form> -->
            </div>
          </div>
        </div>
        <!-- 送出訂單 block -->

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
  <script src="/project_serverside/project_serverside/lib/jquery/jquery.min.js"></script>
  <script src="/project_serverside/project_serverside/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="/project_serverside/project_serverside/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="/project_serverside/project_serverside/lib/jquery.scrollTo.min.js"></script>
  <script src="/project_serverside/project_serverside/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="/project_serverside/project_serverside/lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="/project_serverside/project_serverside/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="/project_serverside/project_serverside/lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="/project_serverside/project_serverside/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="/project_serverside/project_serverside/lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="/project_serverside/project_serverside/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="/project_serverside/project_serverside/lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="/project_serverside/project_serverside/lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="/project_serverside/project_serverside/lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="/project_serverside/project_serverside/lib/advanced-form-components.js"></script>


  <script>
    $("#putBtn").click(function() {

      // alert("putBtn on click");
      var curDate = new Date().yyyymmdd().toString();
      // alert(curDate);


      var orderData = {
        orderID: "",
        orderDate: "",
        memberID: "",
        requiredDate: "",
        shippedDate: ""
      };

      var form = document.getElementById('itemPicker');
      var formData = new FormData(form);


      //@@@@@@@@ 判斷是否有輸入
      console.log(formData.entries().next().done);
      if (formData.entries().next().done) {
        console.log("don't send");
        return;
      }
      console.log("send"); //有東西才往下

      $.ajax({
        type: "POST",
        url: "/project_serverside/project_serverside/api2/order", //###000
        data: formData,
        processData: false, //###111 不加會 erroer
        contentType: false, //#111 Multi/form-data === file_get_contents('php://input') 會抓不到東西
        success: function(data) {
          // alert(data);
          console.log(data);
          // redirectheader
          // document.write(data);

          window.location.href = "http://localhost/project_serverside/project_serverside/orderTable.php";


        },
        // Alert status code and error if fail
        error: function(xhr, ajaxOptions, thrownError) {
          alert("failed");

          // alert(xhr.status);
          // alert(thrownError);
        }
      });
    });




    $(function() {
      $(document).on('click', '.btn-add', function(e) {
        // console.log("aaaa");
        e.preventDefault();

        var controlForm = $('.controls form:first'),
          currentEntry = $(this).parents('.entry:first'),
          newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
          .removeClass('btn-add').addClass('btn-remove')
          .removeClass('btn-success').addClass('btn-danger')
          .html('<span class="glyphicon glyphicon-minus"></span>');
        // controlForm.find('.entry:not(:last) .btn-add');
      }).on('click', '.btn-remove', function(e) {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
      });
    });





    Date.prototype.yyyymmdd = function() {
      var mm = this.getMonth() + 1; // getMonth() is zero-based
      var dd = this.getDate();

      return [this.getFullYear(),
        (mm > 9 ? '' : '0') + mm,
        (dd > 9 ? '' : '0') + dd
      ].join('');
    };
  </script>
</body>

</html>