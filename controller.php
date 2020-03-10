<?php

$method = $_POST["action"];

switch ($method) {
    case "addData":
        addData();
        break;
    case "addType":
        addDataType();
        break;
    case "update":
        updateData();
        break;
    case "updateType":
        updateDataType();
        break;
    case "deleteAll":
        deleteAll();
        break;
    default:
        echo "error method!!";
}

function addData()
{
    
    include_once("mysqlConnect.php");

    echo $_POST["categoryName"];
    // 更新 productSorts 資料表
    $sql_query = "INSERT INTO productSorts (ProductSortName, UnitPrice, ProductDetail)
    value(?, ?, ?);";
    $stmt = $db_link->prepare($sql_query);
    $stmt->bind_param("sis", $_POST["productName"], $_POST["unitPrice"], $_POST["productDetail"]);
    $stmt->execute();

    // 更新 product 資料表

    $sql_query = "Select * from productsorts WHERE ProductSortName = '$_POST[productName]';";
    $result = $db_link->query($sql_query);
    $row_result = $result->fetch_assoc();
    // echo $row_result["ProductSortID"];

    $sql_query = "INSERT INTO products ( ProductSortID, CategoryID, UnitsInStock, CompanyID, UnitsOnOrder, ProductName) value ";

    for ($i = 0; $i <  $_POST["colorChartNum"]; $i++) {

        $new_productName = $_POST["productName"] . "-" . $_POST["ColorChart"][$i];
        $UnitsInStock = $_POST["unitsInStock"][$i];
        var_dump($_POST["unitsInStock"]);

        $sql_query = $sql_query . " ( $row_result[ProductSortID], $_POST[categoryName], $UnitsInStock, $_POST[companyName], 0, '$new_productName'),";



        // $stmt = $db_link->prepare($sql_query);
        // $stmt->bind_param("siiii", $new_productName, $_POST["categoryName"][$i], $_POST["unitsInStock"][$i], $_POST["companyName"], $unitsOnOrder);
        // $stmt->execute();
    }

    // 去除最右邊的逗號
    $sql_query = rtrim($sql_query, ",");
    $result = $db_link->query($sql_query);

    // $stmt->close();
    $db_link->close();
    // 重新導向回到主畫面
    header("Location: product.php");
}


function addDataType()
{
    include_once("mysqlConnect.php");
    $sql_query = "INSERT INTO categories(CategoryName)
        value(?);";
    // 開始執行預備語法
    $stmt = $db_link->prepare($sql_query);
    $stmt->bind_param("s", $_POST["CName"]);
    $stmt->execute();
    $stmt->close();
    $db_link->close();
    // 重新導向回到新增類別畫面
    header("Location: addProductType.php");
}


function updateData()
{
    include_once("mysqlConnect.php");

    // $pid = $_POST["productID"];
    $productNewname = $_POST["productSortName"] . "-" . $_POST["productColor"];
    // echo $productNewname,"<br>";
    // 更新 product 資料表
    $sql_query = "UPDATE products
    SET CategoryID = ?, UnitsInstock = ?, UnitsOnOrder = ?, CompanyID = ?, ProductName = ?
    WHERE ProductID = $_POST[productID];";
    $stmt = $db_link->prepare($sql_query);
    $stmt->bind_param("iiiis", $_POST["categoryName"], $_POST["unitsInStock"], $_POST["unitsOnOrder"], $_POST["companyName"],  $productNewname);
    $stmt->execute();

    // 更新 productSort 資料表
    $sql_query = "UPDATE ProductSorts
    SET ProductSortName = ?, UnitPrice = ?, ProductDetail = ?
    WHERE ProductSortID = $_POST[productSortID];";
    $stmt = $db_link->prepare($sql_query);
    $stmt->bind_param("sis", $_POST["productSortName"], $_POST["unitPrice"], $_POST["productDetail"]);
    $stmt->execute();

    // 更新 product資料表中的所有名稱 (防止修改到色票)

    // 1. 撈出 product資料表中需要的 「商品名稱」、「商品類別」、ID(更新回去時使用)
    $sql_query = "SELECT ProductID, ProductName, CategoryID from Products
    WHERE ProductSortID IN(
    SELECT ProductSortID 
    from Products
    WHERE ProductID = $_POST[productID]);";

    $result = $db_link->query($sql_query);

    while ($row_result = $result->fetch_assoc()) {
        // 分割字串成陣列，找出我們需要的部分
        $arr_result = explode("-", $row_result["ProductName"]);
        $arr_result[0] = $_POST["productSortName"];
        $arr_result = $arr_result[0] . "-" . $arr_result[1];
        
        // 將「新商品名」、「商品類別」更新回資料庫
        $sql_query = "UPDATE products
        SET ProductName = ?, CategoryID = ?, CompanyID = ?
        WHERE ProductID = $row_result[ProductID];";
        $stmt = $db_link->prepare($sql_query);
        $stmt->bind_param("sis", $arr_result, $_POST["categoryName"], $_POST["companyName"]);
        $stmt->execute();
    }

    $db_link->close();
    $stmt->close();
    header("Location: product.php");
}

function updateDataType()
{
    include_once("mysqlConnect.php");
    // 更新 product 資料表
    $sql_query = "UPDATE Categories
    SET CategoryName = ?
    WHERE CategoryID = $_POST[ProductTypeId];";
    $stmt = $db_link->prepare($sql_query);
    $stmt->bind_param("s", $_POST["ProductTypeName"]);
    $stmt->execute();

    $db_link->close();
    $stmt->close();

    header("Location: addProductType.php");
}

function deleteAll()
{
    include_once("mysqlConnect.php");
    // 更新 product 資料表
    $check = $_POST["checkbox"];
    print_r($check);

    $sql_query = "DELETE FROM products
    WHERE ProductID IN (";
  
    foreach( $_POST["checkbox"] as $arr_index => $arr_content ){
        $sql_query = $sql_query . "$arr_content,";
    }
   
    // 去除最右邊的逗號 (SQL語法)，加入右括號
    $sql_query = rtrim($sql_query, ",");
    $sql_query = $sql_query . ");";
    // 去除最左邊邊的逗號 (聯繫參數)
    // $str_content = ltrim($str_content, ",");

    var_dump($sql_query);
    echo "<br>";

    $db_link->query($sql_query);
    $db_link->close();

    header("Location: product.php");
}
