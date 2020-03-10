<?php
include("mysqli.func.php");
$disname = $_POST['disname'];
$distype = $_POST['distype'];
$coname = $_POST['coname'];
$pdname = $_POST['pdname'];
$caname = $_POST['caname'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];
$distype = $_POST['distype'];
$distr = $_POST['distr'];
$disnum = $_POST['disnum'];
$sql = "INSERT INTO Discount(DiscountName, CompanyID, ProductSortID, CategoryID, DiscountTypeID, DiscounTerms, DiscounContent, StartData, EndData) VALUES('$disname','$coname','$pdname','$caname','$distype','$distr','$disnum','$sdate','$edate')";
mysqli_query(conn(), $sql);
header("Location: discount.php");
