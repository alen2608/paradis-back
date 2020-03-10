<?php

// require_once $_SERVER['DOCUMENT_ROOT'] . "../member_db.php";

require_once "orderDAO.php";

$orderDAO = new orderDAO();
$arr_orderVOs = $orderDAO->fetchAll();



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
  <link href="../img/SVG/logo_pink.svg" rel="icon">
  <link href="../img/SVG/logo_pink.svg" rel="icon_white">

  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="../lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="../lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link href="../lib/advanced-datatable/css/DT_bootstrap.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <link href="../css/new.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->


  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../lib/bootstrap-datetimepicker/css/datetimepicker.css" />
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" /> -->
  <!-- https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js -->

  <!-- <link rel="stylesheet" type="text/css" href="  https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" /> -->



  <style>
    .my-form-group {
      margin-right: auto;
      margin-left: auto;
      /* float: left; */
    }

    .my-modal-footer {
      border-top: none;
    }

    .my-modal-body {
      padding-bottom: 0px;
    }

    .modifiedDate {
      padding: 0px;
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
            <a href="../index.php"><img src="img/SVG/logo.svg" width="100"></a>
          </p>
          <li class="centered">
            <hr>
            <h5>
              歡迎！<?php echo $_SESSION['UserName'] ?>
            </h5>
            <hr>

          </li class="centered">
          <li class="sub-menu">
            <a class="active" href="../javascript:;">
              <i class="fa fa-user"></i>
              <span>會員管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="../member_table.php">會員列表</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="../javascript:;">
              <i class="fa fa-truck"></i>
              <span>廠商管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="../supplier.php">廠商列表</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="../javascript:;">
              <i class="fa fa-star"></i>
              <span>品牌管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="../company_list.php">品牌列表</a>
              </li>
              <li>
                <a href="../company_add.php">新增品牌</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="../javascript:;">
              <i class="fa fa-shopping-cart"></i>
              <span>商品管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="../basic_table.html">商品列表</a>
              </li>
              <li>
                <a href="../basic_table.html">商品類別</a>
              </li>
              <li>
                <a href="../form.html">新增商品</a>
              </li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="../javascript:;">
              <i class="fa fa-file-text"></i>
              <span>訂單管理</span>
            </a>
            <ul class="sub">
              <li>
                <a href="orderTable.php">訂單列表</a>
              </li>
              <li>
                <a href="order_form.php">新增訂單</a>
              </li>
          
            </ul>
          </li>
          <li class="sub-menu">
            <a href="../javascript:;">
              <i class=" fa fa-calendar"></i>
              <span>行銷活動</span>
            </a>
            <ul class="sub">
              <li>
                <a href="../discount.php">行銷活動管理</a>
              </li>
            </ul>
          </li>
        </ul>
        <ul>
          <li>
            <br>
            <a class="logout" href="../login.php?logout=1">Logout</a>
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
        <h3><i class="fa fa-user"></i> 訂單列表</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <!-- 表單 -->
              <table class="table table-striped table-advance table-hover" id='member_table'>
                <div class="pull-right">
                  <!-- <button type="button" class="btn btn-theme03" data-toggle="modal" data-target="#modalsearch"><i class="fa fa-search"></i>&nbsp;展開搜索</button> -->
                  <!-- <button type="button" class="btn btn-info data-toggle=" data-toggle="modal" data-target="#modalnew""><i class=" fa fa-pencil-square-o"></i>&nbsp;新增資料</button> -->
                  <span>&emsp;</span>
                </div>
                <div>
                  <span>&emsp;</span>
                  <button type="button" class="btn btn-theme04 btn-deleteAll"><i class="fa fa-trash-o"></i>&nbsp;刪除資料</button>
                </div>
                <hr>
                <thead>
                  <tr>
                    <!-- ###1 -->
                    <th><input type="checkbox" name="CheckAll" value="" id="CheckAll" /></th>
                    <?php

                    // 欄位名稱列
                    $tmp = $arr_orderVOs[0];
                    $tmpArr = get_object_vars($tmp);
                    $properties = array_keys($tmpArr);
                    for ($i = 0; $i < count($properties); $i++) {
                      echo "<th>" . $properties[$i] . "</th>";
                    }
                    echo "<th></th>"; //@@@2 小心 這格要有
                    ?>


                    <!-- <th>ID</th>
                      <th>姓名</th>
                      <th>性別</th>
                      <th>生日</th>
                      <th>電話</th>
                      <th>Email</th>
                      <th>地址</th>
                      <th>權限</th>
                      <th></th> -->
                  </tr>
                </thead>
                <tbody>

                  <?php
                  // 資料列
                  foreach ($arr_orderVOs as $index => $orderVO) {
                    echo "<tr>";

                    // 勾勾欄位
                    $a = <<<firstTd
                          <td><input type="checkbox" name="Checkbox[]" class="cb-forDelete" value="{$orderVO->orderID}" /></td>
                          firstTd;
                    echo $a;

                    foreach ($orderVO as $orderField => $orderContent) {
                      echo "<td>" . $orderContent . "</td>";
                    }
                    $td_crud = <<<td_crud
                            <td>
                            <button type="button" class="btn btn-success btn-xs listDetail" value="{$orderVO->orderID}"><i class="fa fa-check"></i>&nbsp;詳細</button>
                            <button type="button" class="btn btn-danger btn-xs btn-deleteDetail" value="{$orderVO->orderID}"><i class="fa fa-trash-o "></i>&nbsp;刪除</button>
                            </td>  
                          td_crud;

                    echo $td_crud;

                    echo "</tr>";
                  }
                  ?>
                  <!--   ###999 記得補回去      <button type="button" class="btn btn-primary btn-xs btn-modify" value="{$index}" data-toggle="modal" data-target="#modaledit"><i class="fa fa-pencil"></i>&nbsp;修改</button>
 -->

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
    <!-- TODO: -->
    <div class="modal fade" id="modalview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Mdal title</h4>
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
            <h4 class="modal-title" id="myModalLabel">修改訂單</h4>
          </div>
          <div class="modal-body my-modal-body">


            <div class="form-group my-form-group">
              <label for="requiredDate" class="control-label col-md-4 modifiedDate">required Date</label>
              <input id="requiredDate" class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="" readonly="">
            </div>

            <div class="form-group my-form-group">
              <label for="shippedDate" class="control-label col-md-4 modifiedDate">shipped Date</label>
              <input id="shippedDate" class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="" readonly="">
            </div>


          </div>

          <div class="modal-footer my-modal-footer">
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
        <a href="../index.php" class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="../lib/advanced-datatable/js/jquery.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="../lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="../lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="../lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="../lib/advanced-form-components.js"></script>

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
          [1, 'desc']
        ]
      });
    });
  </script>
  <script>
    $(document).on("click", ".btn-modify", function() {

      // console.log(this.value);

      // var myBookId = $(this).data('id');
      // $(".modal-body #requiredDate").val( myBookId );



      // $(".modal-body #shippedDate").val( 123 );

      //  var myBookId = $(this).data('id');
      //  $(".modal-body #bookId").val( myBookId );
      // As pointed out in comments, 
      // it is unnecessary to have to manually call the modal.
      // $('#addBookDialog').modal('show');
    });


    $(document).ready(function() {
      $("#CheckAll").click(function() {

        if ($("#CheckAll").prop("checked")) { //如果全選按鈕有被選擇的話（被選擇是true）
          $("input[name='Checkbox[]']").prop("checked", true); //把所有的核取方框的property都變成勾選
        } else {
          $("input[name='Checkbox[]']").prop("checked", false); //把所有的核取方框的property都取消勾選
        }
      })

      initInterfaceWithActions();
    })
  </script>

  <script>
    function initInterfaceWithActions() {
      // console.log("initInterfaceWithActions");
      initShowDetialBtns();

      //btn-deleteAll
      initDeleteAllSelectedBtn();

      // 每個 Delete
      initDeleteBtns();

      //datePicker
      initDatePickers();

      initModifyBtns();

    }

    function initModifyBtns() {

      var arrAllModifyBtns = document.querySelectorAll(" .btn-modify");



      arrAllDeleteBtns.forEach(function(btn) {

        btn.value = 345;
        btn.addEventListener('click', function() {
          console.log("delete" + this.value)

          var btnValue = 345;
          var arrOrderToDeleteIDs = [];
          arrOrderToDeleteIDs.push(btnValue);
          var jsonData = JSON.stringify(arrOrderToDeleteIDs);

          console.log("JS-- " + arrOrderToDeleteIDs);
          // console.log("JS-- " + jsonData);

          //   $.ajax({
          //     type: "DELETE",
          //     url: "../api/order", //###000 先用這種方式GET
          //     // dataType: "json", // 你期望收到的回覆類型 幹!!!
          //     contentType: "application/json; charset=utf-8",
          //     data: jsonData,
          //     success: function(data) {
          //       console.log(data);
          //       // alert("200");

          //       window.location.href = "http://localhost/project_serverside/order/orderTable.php";
          //     },
          //     // Alert status code and error if fail
          //     error: function(xhr, ajaxOptions, thrownError) {

          //       // alert("內部錯誤");

          //       // alert(xhr.status);
          //       alert(thrownError);
          //     }
          //   });
        });
      });
    }

    function initDatePickers() {

      var requiredDate = document.querySelector("#requiredDate");
      var shippedDate = document.querySelector("#shippedDate");

      requiredDate.value = <?php echo $orderVO->requiredDate; ?>;
      shippedDate.value = <?php echo $orderVO->shippedDate; ?>;
      // shippedDate.dateFormat="yy-mm-dd";

      // requiredDate.datepicker('setDate', new Date());
      // requiredDate.datepicker(
      //   'option', {
      //     dateFormat: "yy-mm-dd",
      //     minDate: new Date('2020-3-5')
      //   });
      // console.log(eee.value);

      $("#requiredDate").datepicker({
        "setDate": new Date(),
        "autoclose": true,
        format: "Ymd",

      });

      // $("#shippedDate").datepicker(
      // 'option', {
      //   dateFormat: "yy-mm-dd",
      //   minDate: new Date('2020-3-5')
      // });


    }

    function initDeleteAllSelectedBtn() {

      var btnDeleteAll = document.querySelector(".btn-deleteAll");
      // console.log(btnDeleteAll + "gggg");

      btnDeleteAll.addEventListener('click', function() {
        // var btnSelected = document.querySelector(".btn-deleteAll");
        var btnSelected = $('.cb-forDelete:checkbox:checked'); //對的

        var arrAllSelectedIDs = [];
        btnSelected.each(function() {
          arrAllSelectedIDs.push(this.value);
          // console.log(arrAllSelectedIDs);
        });
        var jsonData = JSON.stringify(arrAllSelectedIDs);

        $.ajax({
          type: "DELETE",
          url: "../api2/order", //###000 先用這種方式GET
          // dataType: "json", // 你期望收到的回覆類型 幹!!!
          contentType: "application/json; charset=utf-8",
          data: jsonData,
          success: function(data) {
            console.log(data);
            // alert("200");

            window.location.href = "http://localhost/paradis/order/orderTable.php";
          },
          // Alert status code and error if fail
          error: function(xhr, ajaxOptions, thrownError) {

            // alert("內部錯誤");

            // alert(xhr.status);
            alert(thrownError);
          }
        });


      });
    }

    function initDeleteBtns() {

      //###888 TODO: 只抓到第一頁的 後面都沒抓到
      var arrAllDeleteBtns = document.querySelectorAll(" .btn-deleteDetail");

      console.log(arrAllDeleteBtns);

      arrAllDeleteBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
          console.log("delete" + this.value)

          var btnValue = this.value;
          var arrOrderToDeleteIDs = [];
          arrOrderToDeleteIDs.push(btnValue);
          var jsonData = JSON.stringify(arrOrderToDeleteIDs);

          console.log("JS-- " + arrOrderToDeleteIDs);
          // console.log("JS-- " + jsonData);

          $.ajax({
            type: "DELETE",
            url: "../api2/order", //###000 先用這種方式GET
            // dataType: "json", // 你期望收到的回覆類型 幹!!!
            contentType: "application/json; charset=utf-8",
            data: jsonData,
            success: function(data) {
              console.log(data);
              // alert("200");

              window.location.href = "http://localhost/paradis/order/orderTable.php";
            },
            // Alert status code and error if fail
            error: function(xhr, ajaxOptions, thrownError) {

              // alert("內部錯誤");

              // alert(xhr.status);
              alert(thrownError);
            }
          });



        });
      });


      // arrAllDeleteBtns.forEach(function(btn) {
      //   btn.addEventListener('click', function() {
      //     var btnValue = this.value;
      //     console.log("deletBtn ---- " + btnValue);

      //     // var jsonObj2 = {a: "123"};

      //     // var jsonObj = {};
      //     var arrOrderToDeleteIDs = [];
      //     arrOrderToDeleteIDs.push(btnValue);
      //     // jsonObj.dataToSend = arrOrderToDeleteIDs;
      //     var jsonData = JSON.stringify(arrOrderToDeleteIDs);
      //     console.log("JS-- " + arrOrderToDeleteIDs);



      //     //TODO: remove
      //     // $.ajax({
      //     //   type: "GET",
      //     //   url: "../api/order/eee/www", //###000 先用這種方式GET
      //     //   // dataType: "json", // 你期望收到的回覆類型 幹!!!
      //     //   contentType: "application/json; charset=utf-8",
      //     //   data: jsonData,
      //     //   success: function(data) {
      //     //     console.log(data);
      //     //     // alert("200");

      //     //     window.location.href = "http://localhost/project_serverside/order/orderTable.php";
      //     //   },
      //     //   // Alert status code and error if fail
      //     //   error: function(xhr, ajaxOptions, thrownError) {

      //     //     // alert("內部錯誤");

      //     //     // alert(xhr.status);
      //     //     alert(thrownError);
      //     //   }
      //     // });


      //   });
      // });
    }

    function initShowDetialBtns() {



      var arrAllListDetails = document.querySelectorAll(".listDetail");
      arrAllListDetails.forEach(function(btn) {
        btn.addEventListener('click', function() {
          var btnValue = this.value;
          console.log("hello ---- " + btnValue);

          // var jsonObj2 = {a: "123"};

          // var jsonObj = {};
          var arrOrderToDeleteIDs = [];
          arrOrderToDeleteIDs.push(btnValue);
          // jsonObj.dataToSend = arrOrderToDeleteIDs;
          var jsonData = JSON.stringify(arrOrderToDeleteIDs);
          console.log("JS-- " + arrOrderToDeleteIDs);


          //tmp 先做 redirect方式
          window.location = 'orderDetailTable.php?orderDetailID=' + btnValue;


          //TODO: remove
          //TODO：show detail
          // $.ajax({
          //   type: "GET",
          //   url: "../api/order/eee/www", //###000 先用這種方式GET
          //   // dataType: "json", // 你期望收到的回覆類型 幹!!!
          //   contentType: "application/json; charset=utf-8",
          //   data: jsonData,
          //   success: function(data) {
          //     console.log(data);
          //     // alert("200");

          //     window.location.href = "http://localhost/project_serverside/order/orderTable.php";
          //   },
          //   // Alert status code and error if fail
          //   error: function(xhr, ajaxOptions, thrownError) {

          //     // alert("內部錯誤");

          //     // alert(xhr.status);
          //     alert(thrownError);
          //   }
          // });


        });
      });

      // console.log(arrAllListDetails);
    }

    // var array = []
    // var checkboxes = document.querySelectorAll('input[name=Checkbox[]]:checked')
    // for (var i = 0; i < checkboxes.length; i++) {
    //   array.push(checkboxes[i].value)
    // }
  </script>




</body>

</html>