<?php
session_start();
if (!isset($_SESSION["UserName"])) {
  header("Location: login.php");
  exit();
}
if (isset($_COOKIE["logo"])){
    $c = $_COOKIE["logo"];
} else{
    $c = "No cookie found";
}

$method = $_SERVER['REQUEST_METHOD'];
$url = $_GET;
setcookie('traceid', $url['id']);

    include("susqli.func.php");


    if (isset($_POST["action"])&& ($_POST["action"] == "update")){
        $sql_query = "UPDATE suppliers SET 
        -- 新增這行
        SupplierLogo=?,
        -- 
        SupplierName=?,
        SupplierPassword=?,
        SupplierBrand=?, 
        SupplierPhone=?, 
        SupplierEmail=?, 
        SupplierAddress=?, 
        SupplierURL=? WHERE SupplierID=?";
        $stmt = $dblink->prepare($sql_query); 
        $stmt->bind_param("ssssssssi", 
        // 新增這行
        $_POST["SupplierLogo"],
        //
        $_POST["SupplierName"],
        $_POST["SupplierPassword"],
        $_POST["SupplierBrand"],
        $_POST["SupplierPhone"],
        $_POST["SupplierEmail"],
        $_POST["SupplierAddress"],
        $_POST["SupplierURL"],
        $_POST["SupplierID"]);
        $stmt->execute();
        $stmt->close();
        $dblink->close();
        header("Location:supplier.php");
    }

    // 從資料庫找資料出來
    $sql_select = "SELECT 
    SupplierID, 
    -- 新增這行
    SupplierLogo,
    -- 
    SupplierName,
    SupplierPassword,
    SupplierBrand, 
    SupplierPhone, 
    SupplierEmail, 
    SupplierAddress, 
    SupplierURL FROM suppliers WHERE SupplierID=?";
    $stmt = $dblink->prepare($sql_select); 
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $stmt->bind_result(
        $SupplierID, 
        //新增這行
        $SupplierLogo,
        //
        $SupplierName,
        $SupplierPassword,
        $SupplierBrand,
        $SupplierPhone,
        $SupplierEmail,
        $SupplierAddress, 
        $SupplierURL);
    $stmt->fetch();
    
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
  <script>
    function edit() {var msg = "您確定要修改嗎?";if (confirm(msg)==true){return true;}else{return false;}}
    function CheckPW(){
      let PWst = document.querySelector(".PWst").value;
      let PWnd = document.querySelector(".PWnd").value;
      if(PWnd !== PWst){
        document.querySelector("#CheckPW").innerHTML = "輸入的密碼不相同"
        return false;
      }else{
        document.querySelector("#CheckPW").innerHTML = ""
        return true;
      };
    };
  </script>
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
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-user"></i> 廠商列表</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <!-- 表單 -->
              <form action="" method="post" name="formDel" id="formDel" onsubmit="return CheckPW()">
              <table class="table table-striped table-advance table-hover" id='supplier_table' style="color:black; font-size:16px;" >
                <div>
                  <span>&emsp;</span>
                </div>
                <div>
                  <h1 align="center" style="color:red;">-----修改廠商-----</h1>
                <hr>
                    <tr><td align="center">廠商ID</td><td><?= $SupplierID;?></td></tr>

                    <tr><td align="center">廠商Logo </td><td><img src='img/<?= $SupplierLogo;?>'>
                    
                    <!-- 新增<br>標籤 -->
                    <br>
                    <a href="uploadlogo2.php">上傳新Logo</a>
                    <br>
                    <!-- type改為"text" -->
                    <input type="text" name="SupplierLogo" id="SupplierLogo" value="<?= $c?>"><br></td></tr>
                    <!-- end -->
                    
                    <tr><td align="center">廠商名稱</td>
                        <td><input type="text" name="SupplierName" id="SupplierName" value="<?=$SupplierName;?>"></td></tr>
                        <tr><td align="center">廠商密碼</td>
                        <td><input type="text" class= "PWst"name="SupplierPassword" id="SupplierPassword" value="<?= $SupplierPassword;?>"></td></tr>
                        <tr><td align="center">請再次確認密碼</td>
                        <td><input type="text" class= "PWnd"name="SupplierPassword" onblur="CheckPW()" value="<?= $SupplierPassword;?>">
                        <span id = "CheckPW" style="color:red;"></span></td></tr>
                    <tr><td align="center">廠商旗下品牌</td>
                        <td><input type="text" name="SupplierBrand" id="SupplierBrand" value="<?= $SupplierBrand;?>"></td></tr>
                    <tr><td align="center">廠商電話</td>
                        <td><input type="text" name="SupplierPhone" id="SupplierPhone" value="<?= $SupplierPhone;?>"></td></tr>
                    <tr><td align="center">廠商Email</td>
                        <td><input type="text" name="SupplierEmail" id="SupplierEmail" value="<?= $SupplierEmail;?>"></td></tr>
                    <tr><td align="center">廠商地址</td>
                        <td><input type="text" name="SupplierAddress" id="SupplierAddress" value="<?= $SupplierAddress;?>"></td></tr>
                    <tr><td align="center">廠商網站</td>
                        <td><input type="text" name="SupplierURL" id="SupplierURL" value="<?= $SupplierURL;?>"></td></tr>
                    <td colspan ="2" align="center">
                        <input type="hidden" name="SupplierID" value="<?php echo $SupplierID;?>">
                        <input type="hidden" name="deletesupplier" value="delete">
                        <button class="btn btn-theme04" type="button"><a style="color:white;" href="supplier.php">取消</a></button>
                        <button class="btn btn-primary" type="reset" name="button2">重新填寫</button>
                        <button class="btn btn-theme" type="submit" onclick="javascript:return edit();">確定修改</button>
                        <input type="hidden" name="action" value="update">
                        
                    </td>
                </tr>
                </div>
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
            <h4 class="modal-title" id="myModalLabel">新增廠商</h4>
          </div>
          <!-- /row -->
          
          <div class="row mt" id="modal-new">
            <div class="col-10">
              <div class="form-panel">
                <div class="form">
                  <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="">
                  <!-- <div class="form-group ">
                      <label for="lastname" class="control-label col-2">SupplierLogo</label>
                      <div class="col-10">
                        <input class=" form-control" id="SupplierLogo" name="SupplierLogo" type="hidden" />
                        <a href="upload.php">Upload a Logo</a>
                      </div>
                    </div> -->
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
                        <input class="form-control " id="SupplierAddress" name="SupplierAddress"  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-2">SupplierURL</label>
                      <div class="col-10">
                        <input class="form-control " id="SupplierURL" name="SupplierURL"  />
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

<?php
    $stmt->close();
    $dblink->close();
?>