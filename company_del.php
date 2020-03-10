<?php
//載入資料庫連線參數
require_once('conn.php'); ?>
<?php
//資料庫連線並執行sql語法,主要是刪除該ID品牌資料
mysqli_select_db($conn, $database_conn);
if (isset($_GET['id'])) {
  $query_insert = "delete from companys where CompanyID='" . $_GET['id'] . "' ";
  $insert = mysqli_query($conn, $query_insert);
}
if (isset($_POST['Checkbox'])) {
  $check = $_POST['Checkbox'];
  foreach ($check as $value) {
    $query_insert = "DELETE FROM companys WHERE CompanyID = $value";
    $insert = mysqli_query($conn, $query_insert);
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>無標題文件</title>
  <style type="text/css">
    .style1 {
      color: #333333
    }
  </style>
</head>

<body>
  <div align="center">
    <p class="style1">&nbsp;</p>
    <p class="style1">刪除完畢</p>
    <p><a href="company_list.php">回上頁</a></p>
  </div>
  </form>
</body>

</html>
<script language=javascript>
  setTimeout("location.href='company_list.php'", 300);
</script>