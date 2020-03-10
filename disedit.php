<?php
include("mysqli.func.php");
$id=$_GET['disid'];
$disname = $_GET['editdisname'];
$distype = $_GET['editdistype'];
$coname = $_GET['editconame'];
$pdname = $_GET['editpdname'];
$caname = $_GET['editcaname'];
$sdate = $_GET['editsdate'];
$edate = $_GET['editedate'];
$distype = $_GET['editdistype'];
$distr = $_GET['editdistr'];
$disnum = $_GET['editdisnum'];
$sql = "UPDATE Discount SET DiscountName='$disname', CompanyID='$coname', ProductSortID='$pdname', CategoryID='$caname', DiscountTypeID='$distype', DiscounTerms='$distr', DiscounContent='$disnum', StartData='$sdate', EndData='$edate' WHERE DiscountID='$id'";
mysqli_query(conn(), $sql);
header("Location: discount.php");
