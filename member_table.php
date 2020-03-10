<?php
session_start();
include "mysqli.func.php";
if (!isset($_SESSION["UserName"])) {
  header("Location: login.php");
  exit();
}

if ($_SESSION['Level']=="Supplier"){
  exit("Access denied. <br> You aren't authorised to visit this page.");
}


header("content-type:text/html; charset=utf-8");

// 連接資料庫伺服器 127.0.01
$link = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
//var_dump($link);
//mysql> show variables like 'char%'; 查看字元級
//mysql> set names big5; / character_set_results = big5; 設定字元級
$result = mysqli_query($link, "set names utf8");
mysqli_select_db($link, "paradis");

$commandText = "select * from members";
$result = mysqli_query($link, $commandText);

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
            <a class="active" href="javascript:;">
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
        <h3><i class="fa fa-user"></i> 會員列表</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <!-- 表單 -->
              <table class="table table-striped table-advance table-hover" id='member_table'>
                <div class="pull-right">
                  <!-- <button type="button" class="btn btn-theme03" data-toggle="modal" data-target="#modalsearch"><i class="fa fa-search"></i>&nbsp;展開搜索</button> -->
                  <button type="button" class="btn btn-info data-toggle=" data-toggle="modal" id="newmodalbtn"><i class=" fa fa-pencil-square-o"></i>&nbsp;新增資料</button>
                  <span>&emsp;</span>
                </div>
                <div>
                  <span>&emsp;</span>
                  <button type="button" class="btn btn-theme04" id="SelectDelete"><i class="fa fa-trash-o"></i>&nbsp;刪除資料</button>
                </div>
                <hr>
                <thead>
                  <tr>
                    <th><input type="checkbox" name="CheckAll" value="" id="CheckAll" /></th>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>性別</th>
                    <th>生日</th>
                    <th>電話</th>
                    <th>Email</th>
                    <th>地址</th>
                    <th>權限</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                      <td><input class="membercheckbox" type="checkbox" name="Checkbox[]" value="<?php echo $row['MemberID'] ?>" /></td>
                      <td><?php echo $row['MemberID'] ?></td>
                      <td><?php echo $row['MemberName'] ?></td>
                      <td><?php echo $row['MemberSex'] ?></td>
                      <td><?php echo $row['MemberBirthday'] ?></td>
                      <td><?php echo $row['MemberPhone'] ?></td>
                      <td><?php echo $row['MemberEmail'] ?></td>
                      <td><?php echo $row['MemberAddress'] ?></td>
                      <td><?php
                          switch ($row['MemberLevel']) {
                            case 'Admin':
                              echo "<span class='label label-danger label-mini'>Admin</span>";
                              break;
                            case 'VIP':
                              echo "<span class='label label-warning label-mini'>VIP</span>";
                              break;
                            case 'Member':
                              echo "<span class='label label-info label-mini'>一般會員</span>";
                              break;
                          } ?></td>
                      <td>
                        <button type="button" class="btn btn-primary btn-xs editmodalbtn" data-toggle="modal" data-id="<?php echo $row['MemberID'] ?>"><i class="fa fa-pencil"></i>&nbsp;修改</button>

                        <button type="button" class="deleteButton btn btn-danger btn-xs" data-id="<?php echo $row['MemberID'] ?>">
                          <i class="fa fa-trash-o "></i>&nbsp;刪除</button>
                      </td>
                    </tr>
                  <?php endwhile ?>
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
    <!-- Modal 新增資料-->
    <div class="modal fade" id="modalnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">新增會員資料</h4>
          </div>
          <!-- /row -->
          <div class="mt">
            <div class="col-10">
              <div class="form-panel">
                <div class="form">
                  <form class="form-horizontal style-form" onsubmit="return checkmemberdatas()" method="post" action="http://localhost/paradis/api/members/">
                    <div class="editform">
                      <label for="MemberName">姓名：</label>
                      <input class="form-control NewName" name="MemberName" type="text" placeholder="請輸入姓名" />
                      <span id="CheckMemberName" style="color:red;"></span>
                      <label for="MemberPW">密碼：</label>
                      <input class="form-control PWst" type="password" placeholder="請設定密碼" />
                      <span id="PWst" style="color:red;"></span>
                      <label for="MemberPW" style="width:100%;">請再輸入一次密碼：</label>
                      <input class="form-control PWnd" name="MemberPW" type="password" placeholder="請再輸入一次密碼" onblur="CheckPW()" />
                      <span id="CheckPW" style="color:red;"></span>
                      <div class="editSex">
                        <label for="MemberSex" class="radio-inline">性別：</label>
                        <label class="radio-inline">
                          <input type="radio" name="MemberSex" value="M" checked>男
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="MemberSex" value="F">女
                        </label>
                      </div>
                      <br>
                      <div class="form-inline">
                        <label for="MemberBirthday" class="form-group" style="margin-top:10px">生日：</label>
                        <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="1990-01-01" class="input-append date dpYears form-group">
                          <input type="text" value="1990-01-01" name="MemberBirthday" class="form-control" style="margin-left:30px; margin-top:-35px">
                          <span class="input-group-btn add-on">
                            <button class="btn btn-theme" type="button" style="margin-top:-25px;"><i class="fa fa-calendar"></i></button>
                          </span>
                        </div>
                      </div>
                      <label for="MemberPhone">電話：</label>
                      <input class="form-control" name="MemberPhone" type="text" placeholder="請輸入電話" />
                      <label for="MemberEmail">信箱：</label>
                      <input class="form-control NewEmail" name="MemberEmail" type="email" placeholder="請輸入信箱" />
                      <span id="CheckMemberEmail" style="color:red;"></span>
                      <label for="MemberAddress">地址：</label>
                      <input class="form-control" name="MemberAddress" type="text" placeholder="請輸入地址" />
                      <br>
                      <span class="radio-inline"><b>會員等級：</b></span>
                      <label class="radio-inline">
                        <input type="radio" name="MemberLevel" value="VIP">
                        <span class='label label-warning label-mini'>VIP</span>
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="MemberLevel" value="Member" checked>
                        <span class='label label-info label-mini'>一般會員</span>
                      </label>
                      <br><br><br>
                    </div>
                    <div class="modal-footer">
                      <div class="editbtn pull-right">
                        <input class="btn btn-theme" id="postButton" type="submit" name="postButton" value="新增" />
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
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">修改會員資料</h4>
          </div>
          <!-- /row -->
          <div class="mt">
            <div class="col-10">
              <div class="form-panel">
                <div class="form">
                  <form class="form-horizontal style-form">
                    <div class="editform">
                      <span class="membernumber"></span>
                      <br><br>
                      <label for="MemberName">姓名：</label>
                      <input class="form-control editMemberName" name="MemberName" type="text" />
                      <label for="MemberPW">密碼：</label>
                      <input class="form-control editMemberPW" name="MemberPW" type="password" />
                      <div class="editSex">
                        <label for="MemberSex" class="radio-inline">性別：</label>
                        <label class="radio-inline">
                          <input type="radio" class="editMemberSex" name="editsex" value="M">男
                        </label>
                        <label class="radio-inline">
                          <input type="radio" class="editMemberSex" name="editsex" value="F">女
                        </label>
                      </div>
                      <br>
                      <div class="form-inline">
                        <label for="MemberBirthday" class="form-group" style="margin-top:10px">生日：</label>
                        <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="1990-01-01" class="input-append date dpYears form-group">
                          <input type="text" value="1990-01-01" name="MemberBirthday" class="form-control editMemberBirthday" style="margin-left:30px; margin-top:-35px">
                          <span class="input-group-btn add-on">
                            <button class="btn btn-theme" type="button" style="margin-top:-25px;"><i class="fa fa-calendar"></i></button>
                          </span>
                        </div>
                      </div>
                      <label for="MemberPhone">電話：</label>
                      <input class="form-control editMemberPhone" name="MemberPhone" type="text" value="" />
                      <label for="MemberEmail">信箱：</label>
                      <input class="form-control editMemberEmail" name="MemberEmail" type="email" value="" />
                      <label for="MemberAddress">地址：</label>
                      <input class="form-control editMemberAddress" name="MemberAddress" type="text" value="" />
                      <br>
                      <span class="radio-inline"><b>會員等級：</b></span>
                      <label class="radio-inline MemberAdmin">
                        <input type="radio" class="editMemberLevel" name="MemberLevel" value="VIP">
                        <span class='label label-danger label-mini'>Admin</span>
                      </label>
                      <label class="radio-inline MemberVIP">
                        <input type="radio" class="editMemberLevel" name="MemberLevel" value="VIP">
                        <span class='label label-warning label-mini'>VIP</span>
                      </label>
                      <label class="radio-inline MemberMember">
                        <input type="radio" class="editMemberLevel" name="MemberLevel" value="Member">
                        <span class='label label-info label-mini'>一般會員</span>
                      </label>
                      <br><br><br>
                    </div>
                    <div class="modal-footer">
                      <div class="editbtn pull-right">
                        <button class="btn btn-theme04" id="cancelButton" type="button">Close</button>
                        <button class="btn btn-theme" id="putButton" type="button" value="test put (update)">Save</button>
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
        <a href="index.php" class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
      </div>
    </footer>
    <!--footer end-->
  </section>


  <!-- js placed at the end of the document so the pages load faster -->
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
    //---------------------換頁功能--------------------- 
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
  <script type="text/javascript">
    //---------------------全選功能--------------------- 
    $(document).ready(function() {
      $("#CheckAll").click(function() {
        if ($("#CheckAll").prop("checked")) { //如果全選按鈕有被選擇的話（被選擇是true）
          $("input[name='Checkbox[]']").prop("checked", true); //把所有的核取方框的property都變成勾選
        } else {
          $("input[name='Checkbox[]']").prop("checked", false); //把所有的核取方框的property都取消勾選
        }
      })
    });
  </script>

  <script type="text/javascript">
    //---------------------彈出修改視窗--------------------- 
    let editmodalbtn = document.querySelectorAll(".editmodalbtn");
    editmodalbtn.forEach(e => e.addEventListener('click', openeditmodal));

    function openeditmodal() {
      let thisID = this.dataset.id;
      let $url = "http://localhost/paradis/api/members/" + thisID;
      $('#editmodal').modal('show');
      //----------------------- Get資料 -----------------------
      getdatas(thisID);
      //----------------------- 修改資料 -----------------------
      let putbtn = document.querySelector("#putButton");
      putbtn.addEventListener('click', updatemember);

      function updatemember() {
        if (confirm("確定要修改" + thisID + "的資料嗎？")) {
          let $MemberName = document.querySelector(".editMemberName").value;
          let $MemberPW = document.querySelector(".editMemberPW").value;
          let $MemberSex;
          let MemberSexvalue = document.querySelectorAll(".editMemberSex");
          if (MemberSexvalue[0].checked == true) {
            $MemberSex = 'M';
          } else {
            $MemberSex = 'F';
          };
          let $MemberBirthday = document.querySelector(".editMemberBirthday").value;
          let $MemberPhone = document.querySelector(".editMemberPhone").value;
          let $MemberEmail = document.querySelector(".editMemberEmail").value;
          let $MemberAddress = document.querySelector(".editMemberAddress").value;
          let $MemberLevel
          let MemberLevelvalue = document.querySelectorAll(".editMemberLevel");
          if (MemberLevelvalue[1].checked == true) {
            $MemberLevel = 'VIP';
          } else if (MemberLevelvalue[2].checked == true) {
            $MemberLevel = 'Member';
          };
          let memberData = {
            MemberName: $MemberName,
            MemberPW: $MemberPW,
            MemberSex: $MemberSex,
            MemberBirthday: $MemberBirthday,
            MemberPhone: $MemberPhone,
            MemberEmail: $MemberEmail,
            MemberAddress: $MemberAddress,
            MemberLevel: $MemberLevel
          };

          $.ajax({
            type: "put",
            url: $url,
            data: memberData
          }).then(function(e) {
            $("#putButton").val(e);
            $('#editmodal').modal('hide');
            location.reload();
          });
        }
      };
      let cancelbtn = document.querySelector("#cancelButton");
      cancelbtn.addEventListener('click', closemodal);
      //----------------------- 關掉modal -----------------------
      function closemodal() {
        $('#editmodal').modal('hide');
      };

      $('#editmodal').on('hidden.bs.modal', function() {
        putbtn.removeEventListener('click', updatemember);
      })
      $('#editmodal').on('hidden.bs.modal', function() {
        putbtn.removeEventListener('click', updatemember);
      })
    };

    //----------------------- Get資料原始 -----------------------
    function getdatas($id) {
      let $url = "http://localhost/paradis/api/members/" + $id;
      $.get($url, function(result) {
        let datas = JSON.parse(result);
        document.querySelector(".membernumber").innerHTML = "<b>#會員編號&nbsp;</b>" + datas["MemberID"];
        document.querySelector(".editMemberName").value = datas["MemberName"];
        document.querySelector(".editMemberPW").value = datas["MemberPW"];
        let MemberSexvalue = document.querySelectorAll(".editMemberSex");
        if (datas["MemberSex"] == "M") {
          MemberSexvalue[0].checked = true;
        } else {
          MemberSexvalue[1].checked = true;
        }
        document.querySelector(".editMemberBirthday").value = datas["MemberBirthday"];
        document.querySelector(".editMemberPhone").value = datas["MemberPhone"];
        document.querySelector(".editMemberEmail").value = datas["MemberEmail"];
        document.querySelector(".editMemberAddress").value = datas["MemberAddress"];
        let MemberLevelvalue = document.querySelectorAll(".editMemberLevel");
        switch (datas["MemberLevel"]) {
          case "Admin":
            document.querySelector(".MemberAdmin").style.display = "block";
            document.querySelector(".MemberVIP").style.display = "none";
            document.querySelector(".MemberMember").style.display = "none";
            MemberLevelvalue[0].checked = true;
            break;
          case "VIP":
            document.querySelector(".MemberAdmin").style.display = "none";
            document.querySelector(".MemberVIP").style.display = "block";
            document.querySelector(".MemberMember").style.display = "block";
            MemberLevelvalue[1].checked = true;
            break;
          case "Member":
            document.querySelector(".MemberAdmin").style.display = "none";
            document.querySelector(".MemberVIP").style.display = "block";
            document.querySelector(".MemberMember").style.display = "block";
            MemberLevelvalue[2].checked = true;
            break;
        };
      });
    };

    //-------------------- 彈出新增視窗 --------------------
    let newmodalbtn = document.querySelector("#newmodalbtn");
    newmodalbtn.addEventListener('click', opennewmodal);

    function opennewmodal() {
      $('#modalnew').modal('show');
    };
    //--------------------- 新增確認 ---------------------
    // let postbtn = document.querySelector("#postButton");
    // postbtn.addEventListener('click', confirmpost);

    // function confirmpost() {
    //   alert("新增成功！");
    // };
    //--------------------- 新增資料檢查 ---------------------
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

    function checkmemberdatas() {
      if (document.querySelector(".NewName").value == '') {
        document.querySelector("#CheckMemberName").innerHTML = "姓名不得為空白";
        document.querySelector(".NewName").focus();
        return false;
      } else {
        document.querySelector("#CheckMemberName").innerHTML = "";
      }
      if (document.querySelector(".NewEmail").value == '') {
        document.querySelector("#CheckMemberEmail").innerHTML = "信箱不得為空白";
        document.querySelector(".NewEmail").focus();
        return false;
      } else {
        document.querySelector("#CheckMemberEmail").innerHTML = "";
      }
      if (document.querySelector(".PWst").value == '') {
        document.querySelector("#PWst").innerHTML = "密碼不得為空白";
        document.querySelector(".PWst").focus();
        return false;
      } else {
        document.querySelector("#PWst").innerHTML = "";
        if (!CheckPW()) {
          return false;
        }
      }
      return true;
    };
    //--------------------- 刪除功能 --------------------- 
    let deletebtn = document.querySelectorAll(".deleteButton");
    deletebtn.forEach(e => e.addEventListener('click', deletemember));

    function deletemember() {
      let thisID = this.dataset.id;
      let $url = "http://localhost/paradis/api/members/" + thisID;
      if (confirm("確定要刪除" + thisID + "的資料嗎？")) {
        $.ajax({
          type: "delete",
          url: $url
        }).then(function(e) {
          $(".deleteButton").val(e);
          location.reload();
        })
      }
    };

    //--------------------- 核取刪除 ---------------------
    let selectdeletebtn = document.querySelector("#SelectDelete");
    selectdeletebtn.addEventListener('click', SelectDelete);

    function SelectDelete() {
      let checkdeletebtns = document.querySelectorAll(".membercheckbox");
      if (confirm("確定要刪除多筆資料嗎？")) {
        for (let checked of checkdeletebtns) {
          if (checked.checked == true) {
            let $url = "http://localhost/paradis/api/members/" + checked.value;
            $.ajax({
              type: "delete",
              url: $url
            }).then(function(e) {
              $("#SelectDelete").val(e);
            })
          }
          location.reload();
        }
      };
    };
  </script>
</body>

</html>