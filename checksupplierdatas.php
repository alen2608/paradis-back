<?php 
//載入資料庫連線參數
require_once('conn.php'); ?>
<?php
//資料庫連線並執行sql語法,主要是新增品牌資料
mysqli_select_db($conn, $database_conn);

$query_insert = "insert into companys(CompanyName,CompanyURL,CompanyAddress,CompanyPhone) values('".$_POST['CompanyName']."','".$_POST['CompanyURL']."','".$_POST['CompanyAddress']."','".$_POST['CompanyPhone']."')";
 //values('".."','".."','".."')  
$insert = mysqli_query($conn,$query_insert) ;
 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新增完畢</title>
<style type="text/css">
<!--
.style1 {color: #666666}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <label>
   
  </label>
  <div align="center">
    <p>&nbsp;</p>
    <p class="style1">新增完畢</p>
    <hr />
    <p><a href="company_add.php">回上頁</a></p>
  </div>
</form>
</body>
</html>
 

<script language=javascript>
setTimeout("location.href='company_list.php'",200);
</script>