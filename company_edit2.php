<?php 
//載入資料庫連線參數
require_once('conn.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<style type="text/css">
<!--
.style1 {color: #666666}
-->
</style>
</head>

<body>
<?php
//資料庫連線並執行sql語法,主要是修改該ID品牌資料
mysqli_select_db($conn,$database_conn);
$query_insert = "update  companys set CompanyName='".$_POST['CompanyName']."' , CompanyURL='".$_POST['CompanyURL']."' , CompanyAddress='".$_POST['CompanyAddress']."' , CompanyPhone='".$_POST['CompanyPhone']."' where CompanyID='".$_POST['id']."'";
$insert = mysqli_query($conn,$query_insert);
 // update xx set file1=oo,file2=oo2
?>

<div align="center">
  <p>&nbsp;</p>
  <p class="style1">修改完畢</p>
  <p><a href="company_list.php">回上頁</a></p>
</div>
</body>
</html>

<script language=javascript>
setTimeout("location.href='company_list.php'",100);
</script>
