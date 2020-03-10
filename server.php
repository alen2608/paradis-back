<?php
include("mysqli.func.php");
header('Content-Type: application/json; charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    @$id = $_POST["id"];
    $sql = "SELECT * FROM Discount WHERE DiscountID = $id";
    $result = doresult($sql);
    $row = dolists($result);
    $disname = $row['DiscountName'];
    $sdate = $row['StartData'];
    $edate = $row['EndData'];
    $coname = $row['CompanyID'];
    $psname = $row['ProductSortID'];
    $caname = $row['CategoryID'];
    $dtname = $row['DiscountTypeID'];
    $distr = $row['DiscounTerms'];
    $disnum = $row['DiscounContent'];
}
echo json_encode(array(
    'id' => $id,
    'disname' => $disname,
    'coname' => $coname,
    'psname' => $psname,
    'caname' => $caname,
    'dtname' => $dtname,
    'sdate' => $sdate,
    'edate' => $edate,
    'distr' => $distr,
    'disnum' => $disnum,
));
