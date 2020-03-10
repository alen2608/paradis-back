<?php

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', '');
define('DB_NAME', 'paradis');
$dblink = @new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME) or die(mysqli_connect_error());
mysqli_query($dblink, "set names utf8");
$result = mysqli_query($dblink, "select * from suppliers");

if (isset($_COOKIE["logo"])){
    $c = $_COOKIE["logo"];// $_Cookie[cookie名稱] 讀取cookie
} else{
    $c = "No cookie found";
}


if (isset($_POST["addsupplier"]) && ($_POST["addsupplier"] == "add")){
    $sql_query = "INSERT INTO suppliers
        (SupplierLogo,
        SupplierName, 
        SupplierPassword,
        SupplierBrand, 
        SupplierPhone, 
        SupplierEmail, 
        SupplierAddress, 
        SupplierURL) 
        VALUES(?,?,?,?,?,?,?,?)";
        $stmt = $dblink->prepare($sql_query); 
        $stmt->bind_param("ssssssss", 
        $_POST['SupplierLogo'],
        $_POST['SupplierName'],
        $_POST['SupplierPassword'],
        $_POST['SupplierBrand'],
        $_POST['SupplierPhone'],
        $_POST['SupplierEmail'],
        $_POST['SupplierAddress'],
        $_POST['SupplierURL']);
        $stmt->execute();
        $stmt->close();
        $dblink->close();
        header("Location:supplier.php");
}



function conn()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    mysqli_query($link, "set names utf8");
    return $link;
}

function doresult($sql)
{
    $result = mysqli_query(conn(), $sql);
    return $result;
}
 
function dolists($result)
{
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}
function totalnums($sql)
{
    $result = mysqli_query(conn(), $sql);
    return $result->num_rows;
}

