<?php
session_start();
include "mysqli.func.php";
if (!isset($_SESSION["UserName"])) {
  header("Location: login.php");
  exit();
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
            <a class="active" href="javascript:;">
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
        <h3><i class="fa fa-user"></i> 優惠列表</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <!-- 表單 -->
              <form method="post" name="checkdel" id="checkdel" action="disdel.php">
                <table class="table table-striped table-advance table-hover" id='member_table'>
                  <div class="pull-right">
                    <button type="button" class="btn btn-info data-toggle=" data-toggle="modal" data-target="#modalnew"><i class=" fa fa-pencil-square-o"></i>&nbsp;新增資料</button>
                    <span>&emsp;</span>
                  </div>

                  <div>
                    <span>&emsp;</span>
                    <button type="submit" onclick="if(confirm('確實要刪除此條記錄嗎？')) return submit();else return false;" class="btn btn-theme04"><i class="fa fa-trash-o"></i>&nbsp;刪除資料</button>
                  </div>
                  <hr>
                  <thead>
                    <tr>
                      <th><input type="checkbox" name="CheckAll" value="" id="CheckAll" /></th>
                      <th>折扣名稱</th>
                      <th>廠商名稱</th>
                      <th>商品名稱</th>
                      <th>商品類型</th>
                      <th>折扣類型</th>
                      <th>開始時間</th>
                      <th>結束時間</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM Discount";
                    $result = doresult($sql);
                    while ($row = dolists($result)) :
                      $id = $row['DiscountID'];
                    ?>
                      <tr>
                        <td><input type="checkbox" name="Checkbox[]" value="<?= $id ?>" /></td>
                        <td id="disname"><?php echo $row['DiscountName'] ?></td>
                        <td><?php
                            $co = $row['CompanyID'];
                            if ($co != "") {
                              $cosql = "SELECT * FROM Companys WHERE CompanyID ='$co'";
                              $coresult = doresult($cosql);
                              $corow = dolists($coresult);
                              echo $corow['CompanyName'];
                            }
                            ?></td>
                        <td><?php
                            $ps = $row['ProductSortID'];
                            if ($ps != "") {
                              $pssql = "SELECT * FROM ProductSorts WHERE ProductSortID ='$ps'";
                              $psresult = doresult($pssql);
                              $psrow = dolists($psresult);
                              echo $psrow['ProductSortName'];
                            }
                            ?></td>
                        <td><?php
                            $ca = $row['CategoryID'];
                            if ($ca != "") {
                              $casql = "SELECT * FROM Categories WHERE CategoryID ='$ca'";
                              $caresult = doresult($casql);
                              $carow = dolists($caresult);
                              echo $carow['CategoryName'];
                            }
                            ?></td>
                        <td><?php
                            $dt = $row['DiscountTypeID'];
                            if ($dt != "") {
                              $dtsql = "SELECT * FROM DiscountType WHERE DiscountTypeID ='$dt'";
                              $dtresult = doresult($dtsql);
                              $dtrow = dolists($dtresult);
                              echo $dtrow['DiscountTypeName'];
                            }
                            ?></td>
                        <td><?php echo $row['StartData'] ?></td>
                        <td><?php echo $row['EndData'] ?></td>
                        <td>
                          <button type="button" name="edit" id="edit" class="btn btn-primary btn-xs " data-toggle="modal" data-target="#modaledit" alt="<?php echo $row['DiscountID'] ?> "><i class="fa fa-pencil"></i>&nbsp;修改</button>
                          <button type="button" class="btn btn-danger btn-xs" onclick="if(confirm('確實要刪除此條記錄嗎？')) return location.href='disdel.php?id=<?= $row['DiscountID'] ?>'"><i class="fa fa-trash-o "></i>&nbsp;刪除</button>
                        </td>
                      </tr>
                    <?php endwhile ?>
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
    <!-- **********************************************************************************************************************************************************
        MODAL
        *********************************************************************************************************************************************************** -->
    <!-- Modal 新增資料-->
    <div class="modal fade" id="modalnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">新增折扣</h4>
          </div>
          <!-- /row -->
          <div class="row mt" id="modal-new">
            <div class="col-10">
              <div class="form-panel">
                <div class="form">
                  <form class="cmxform form-horizontal style-form" id="addForm" method="post" action="disadd.php" onsubmit="return check()">
                    <div class="form-group co-sm-6">
                      <label for="disname" class="control-label col-2">優惠名稱</label>
                      <div class="col-10">
                        <input class=" form-control disname" id="disname" name="disname" type="text" />
                        <span id="CheckName" style="color :red"></span>
                      </div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="distype" class="control-label col-2">優惠類型</label>
                      <div class="col-10">
                        <select class=" form-control distype" id="distype" name="distype" />
                        <option></option>
                        <?php
                        $sql = "SELECT * FROM DiscountType";
                        $result = doresult($sql);
                        while ($row = dolists($result)) : ?>
                          <option value="<?php echo $row['DiscountTypeID'] ?>"><?php echo $row['DiscountTypeName'] ?></option>
                        <?php endwhile ?>
                        </select>
                        <span id="CheckType" style="color :red"></span>
                      </div>
                    </div>
                    <div class="form-group col-sm-2">
                    </div>
                    <div class="form-group col-sm-6 ">
                      <label for="coname" class="control-label col-2">廠商名稱</label>
                      <div class="col-10">
                        <select class="form-control " id="coname" name="coname" />
                        <option></option>
                        <?php
                        $sql = "SELECT * FROM Companys";
                        $result = doresult($sql);
                        while ($row = dolists($result)) : ?>
                          <option value="<?php echo $row['CompanyID'] ?>"><?php echo $row['CompanyName'] ?></option>
                        <?php endwhile ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-sm-6 ">
                      <label for="pdname" class="control-label col-2">商品名稱</label>
                      <div class="col-10">
                        <select class="form-control " id="pdname" name="pdname" />
                        <option></option>
                        <?php
                        $sql = "SELECT * FROM ProductSorts";
                        $result = doresult($sql);
                        while ($row = dolists($result)) : ?>
                          <option value="<?php echo $row['ProductSortID'] ?>"><?php echo $row['ProductSortName'] ?></option>
                        <?php endwhile ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-sm-2">
                    </div>
                    <div class="form-group col-sm-6  ">
                      <label for="caname" class="control-label col-2">商品類型</label>
                      <div class="col-10">
                        <select class="form-control " id="caname" name="caname" />
                        <option></option>
                        <?php
                        $sql = "SELECT * FROM Categories";
                        $result = doresult($sql);
                        while ($row = dolists($result)) : ?>
                          <option value="<?php echo $row['CategoryID'] ?>"><?php echo $row['CategoryName'] ?></option>
                        <?php endwhile ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="sdate" class="control-label col-2">開始時間</label>
                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2020-01-01" class="col-sm-12 input-append date dpYears form-group">
                        <input type="text" value="" id="sdate" name="sdate" class=" form-control sdate">
                        <span class="input-group-btn add-on">
                          <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group col-sm-6 pull-right">
                      <label for="edate" class="control-label col-2">結束時間</label>
                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2020-01-01" class="col-sm-12 input-append date dpYears form-group">
                        <input type="text" value="" id="edate" name="edate" class="form-control edate">
                        <span class="input-group-btn add-on">
                          <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="distr" class="control-label col-2">折扣數量或折扣碼</label>
                      <div class="col-10">
                        <input class="form-control " id="distr" name="distr" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="disnum" class="control-label col-2">折扣金額</label>
                      <div class="col-10">
                        <input class="form-control " id="disnum" name="disnum" type="text" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="pull-right">
                        <button class="btn btn-theme04" type="button" data-dismiss="modal">Cancel</button>
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

    <!-- Modal 修改資料-->
    <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">修改折扣</h4>
          </div>
          <!-- /row -->
          <div class="row mt" id="modal-new">
            <div class="col-10">
              <div class="form-panel">
                <div class="form">
                  <form class="cmxform form-horizontal style-form" id="editForm" method="get" action="disedit.php">
                    <?php
                    $sql = "SELECT * FROM Discount WHERE DiscountID = $id";
                    $result = doresult($sql);
                    $rows = dolists($result);
                    ?>
                    <div class="form-group co-sm-6">
                      <label for="editdisname" class="control-label col-2">優惠名稱</label>
                      <div class="col-10">
                        <input class="hidden" id="disid" name="disid" value="">
                        <input class=" form-control" id="editdisname" name="editdisname" type="text" value="" />
                      </div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="editdistype" class="control-label col-2">優惠類型</label>

                      <div class="col-10">
                        <select class=" form-control" id="editdistype" name="editdistype" value=<?php $rows['DiscountTypeID'] ?> />
                        <option></option>
                        <?php
                        $sql = "SELECT * FROM DiscountType";
                        $result = doresult($sql);
                        while ($row = dolists($result)) : ?>
                          <option value="<?php echo $row['DiscountTypeID'] ?>"><?php echo $row['DiscountTypeName'] ?></option>
                        <?php endwhile ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-sm-2">
                    </div>
                    <div class="form-group col-sm-6 ">
                      <label for="editconame" class="control-label col-2">廠商名稱</label>
                      <div class="col-10">
                        <select class="form-control " id="editconame" name="editconame" />
                        <option></option>
                        <?php
                        $sql = "SELECT * FROM Companys";
                        $result = doresult($sql);
                        while ($row = dolists($result)) : ?>
                          <option value="<?php echo $row['CompanyID'] ?>"><?php echo $row['CompanyName'] ?></option>
                        <?php endwhile ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-sm-6 ">
                      <label for="editpdname" class="control-label col-2">商品名稱</label>
                      <div class="col-10">
                        <select class="form-control " id="editpdname" name="editpdname" />
                        <option></option>
                        <?php
                        $sql = "SELECT * FROM ProductSorts";
                        $result = doresult($sql);
                        while ($row = dolists($result)) : ?>
                          <option value="<?php echo $row['ProductSortID'] ?>"><?php echo $row['ProductSortName'] ?></option>
                        <?php endwhile ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-sm-2">
                    </div>
                    <div class="form-group col-sm-6  ">
                      <label for="editcaname" class="control-label col-2">商品類型</label>
                      <div class="col-10">
                        <select class="form-control " id="editcaname" name="editcaname" />
                        <option></option>
                        <?php
                        $sql = "SELECT * FROM Categories";
                        $result = doresult($sql);
                        while ($row = dolists($result)) : ?>
                          <option value="<?php echo $row['CategoryID'] ?>"><?php echo $row['CategoryName'] ?></option>
                        <?php endwhile ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="editsdate" class="control-label col-2">開始時間</label>
                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2020-01-01" class="col-sm-12 input-append date dpYears form-group">
                        <input type="text" value="" id="editsdate" name="editsdate" class=" form-control">
                        <span class="input-group-btn add-on">
                          <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                      </div>
                    </div>

                    <div class="form-group col-sm-6 pull-right">
                      <label for="editedate" class="control-label col-2">結束時間</label>
                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2020-01-01" class="col-sm-12 input-append date dpYears form-group">
                        <input type="text" value="" id="editedate" name="editSedate" class="form-control">
                        <span class="input-group-btn add-on">
                          <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="editdistr" class="control-label col-2">折扣數量或折扣碼</label>
                      <div class="col-10">
                        <input class="form-control " id="editdistr" name="editdistr" type="text" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="editdisnum" class="control-label col-2">折扣金額</label>
                      <div class="col-10">
                        <input class="form-control " id="editdisnum" name="disnum" type="text" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="pull-right">
                        <button class="btn btn-theme04" type="button" data-dismiss="modal">Cancel</button>
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
          console.log(data)
          document.querySelector("#editdisname").value = data.disname;
          document.querySelector("#editdistype").value = data.dtname;
          document.querySelector("#editpdname").value = data.psname;
          document.querySelector("#editcaname").value = data.caname;
          document.querySelector("#editconame").value = data.coname;
          document.querySelector("#editsdate").value = data.sdate;
          document.querySelector("#editedate").value = data.edate;
          document.querySelector("#editdistr").value = data.distr;
          document.querySelector("#editdisnum").value = data.disnum;
        }
      });
    });
  </script>
  <script>
    function check() {
      if (document.querySelector(".disname").value == '') {
        document.querySelector("#CheckName").innerHTML = "名稱不得為空白";
        document.querySelector(".disname").focus();
        return false;
      }
      if (!checkdate()) {
        return false;
        console.log(no)
      };
      return true;
    }

    function checkdate() {
      let sdate = document.querySelector(".sdate").value;
      let edate = document.querySelector(".edate").value;
      if (sdate == "" || edate == "") {
        return false;
      }
      if ((Date.parse(sdate)).valueOf() > (Date.parse(edate)).valueOf()) {
        document.getElementById("edate").innerHTML = sdate;
        return false;
      } else {
        return true;
      }
      return true;
    };
  </script>
</body>

</html>