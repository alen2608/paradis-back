<?php 

require("ProductVO.php");
require("ProductSortDAO.php");
require("ProductSortVO.php");



// require_once("dbLinkConfig.php");


class ProductDAO{

    //fetch
    // public $sql_fetchAll = "SELECT * FROM Products";

    public $sql_fetchAll = "SELECT * FROM Products";


    static public $sql_getProductPricesByProductIDs= "SELECT p.ProductID, ps.UnitPrice price
    FROM productsorts ps
    JOIN products p
    ON ps.ProductSortID = p.ProductSortID
    WHERE p.ProductID IN productIDsPH";

    // public $sql_fetchByMemberID = "SELECT * FROM ordProductsers 
    // WHERE memberID = ?";

    // //insert
    // public $sql_insertSingleRecord =  "INSERT INTO orders (`orderID`, `memberID`, `orderDate`, `requiredDate`, `shippedDate`) 
    // VALUES
    // (?, ?, ?, ?, ?)";

    // //delete
    // public $sql_deleteSingleRecordByOrderID =  "DELETE FROM `orders` 
    // WHERE orderID = ?";
    // public $sql_deleteSingleRecordByMemberID =  "DELETE FROM `orders` 
    // WHERE memberID = ?";

    // //update
    // public $sql_updateSingleRecordWithVO =
    // "UPDATE orders 
    // SET orderDate = ?, requiredDate= ?, shippedDate=? 
    // WHERE orderID = ?";


    // public $sql_fetchAll = "2";
    // public $sql_fetchByMemberID = "1";
    
    function fetchAll(){

        // 為何寫上面不行!?
        require("dbLinkConfig.php");

        //###1 try-catch 寫在哪!?
        // try {
        //     //code...
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }

        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
        $stmt_fetchAll = $db_link->prepare($this->sql_fetchAll);

        $arr_productVOs=array();
        if($stmt_fetchAll->execute()){
            while($row=$stmt_fetchAll->fetch(PDO::FETCH_ASSOC)){

                // print_r($row);

                $productVO = new ProductVO();
                $productVO->setByAssocArray($row);

                // echo $orderVO->orderID . "<br>";
                $arr_productVOs[] = $productVO; //@@@3 faster

            }
        }
        $db_link = NULL;
        
        // echo "fetch success";

        return $arr_productVOs;
    }

    // function fetchByID($oid){

    // }

    function fetchByMemberID($mid){

        require("dbLinkConfig.php");

        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
        $stmt_fetchByMemberID = $db_link->prepare($this->sql_fetchByMemberID);

        $arr_orderVOs=array();
        if($stmt_fetchByMemberID->execute(array($mid))){
            while($row=$stmt_fetchByMemberID->fetch(PDO::FETCH_ASSOC)){

                //###1 這邊OK
                // print_r($row);

                $orderVO = new orderVO();
                $orderVO->setByAssocArray($row);

                // echo $orderVO->orderID . "<br>";
                array_push($arr_orderVOs, $orderVO);
            }
        }
        $db_link = NULL;
        
        // echo "fetch success";
        return $arr_orderVOs;
    }

    function insertSingleRecordWithVO($vo){

        $orderID = $vo->orderID;
        $memberID = $vo->memberID;
        $orderDate = $vo->orderDate;
        $requiredDate = $vo->requiredDate;
        $shippedDate = $vo->shippedDate;

        require("dbLinkConfig.php");

        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
        $stmt_insertSingleRecord = $db_link->prepare($this->sql_insertSingleRecord);

        $lastInsertId; 
        if($stmt_insertSingleRecord->execute(array($orderID, $memberID, $orderDate, $requiredDate, $shippedDate))){
            // $lastInsertId = $db_link->lastInsertId();
            $lastInsertId = $orderID;
        }
        $db_link = NULL;

        return $lastInsertId;
    }

    function updateSingleRecordWithVO($vo){

        $orderID = $vo->orderID;
        // $memberID = $vo->memberID;
        $orderDate = $vo->orderDate;
        $requiredDate = $vo->requiredDate;
        $shippedDate = $vo->shippedDate;

        require_once("dbLinkConfig.php");

        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
        $stmt_updateSingleRecordWithVO = $db_link->prepare($this->sql_updateSingleRecordWithVO);

        $lastUpdateId; 
        if($stmt_updateSingleRecordWithVO->execute(array($orderDate, $requiredDate, $shippedDate, $orderID))){
            // $lastInsertId = $db_link->lastInsertId();
            $lastUpdateId = $orderID;
        }
        $db_link = NULL;

        return $lastUpdateId;
    }

    function deleteSingleRecordByOrderID($orderID){
        require("dbLinkConfig.php");

        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
        $stmt_deleteSingleRecordByOrderID = $db_link->prepare($this->sql_deleteSingleRecordByOrderID);

        $lastDeleteId; 
        if($stmt_deleteSingleRecordByOrderID->execute(array($orderID))){
            // $lastInsertId = $db_link->lastInsertId();
            $lastDeleteId = $orderID;
        }
        $db_link = NULL;

        return $lastDeleteId;
    }

    // function deleteSingleRecordByMemberID($memID){
    //     require_once("dbLinkConfig.php");

    //     $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
    //     $stmt_deleteSingleRecordByMemberID = $db_link->prepare($this->sql_deleteSingleRecordByMemberID);

    //     $lastDeleteId; 
    //     if($stmt_insertSingleRecord->execute(array($memID))){
    //         // $lastInsertId = $db_link->lastInsertId();
    //         $lastDeleteId = $memID;
    //     }
    //     $db_link = NULL;

    //     return $lastDeleteId;
    // }

    // function updateSingleRecordWithVO($vo){

    // }

    static function createDBLink($dbHost, $dbUsername, $dbPsw, $dbName){

        try{
            $dbLink = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUsername, $dbPsw);
        }catch(PDOException $e){
            print "connected failed {$e->getMEssage()}";
            die();
        }
        return $dbLink;
    }

    static function getProductPricesByProductIDs($arrProductIDs){
        
        require("dbLinkConfig.php");

        // echo "=====".$arrProductIDs."<br>";

        $db_link = self::createDBLink($db_host, $db_username, $db_psw, $db_name);
        $inputForPlaceHolders = "(";
        $arrInputQs = array_fill(0, count($arrProductIDs), '?');
        $strQs = implode(',', $arrInputQs);
        $inputForPlaceHolders = "(".$strQs.")";


        $sql_getProductPricesByProductIDs = str_replace("productIDsPH",  $inputForPlaceHolders, self::$sql_getProductPricesByProductIDs);
        // echo  $sql_getProductPricesByProductIDs;

        $stmt_getProductPricesByProductIDs = $db_link->prepare($sql_getProductPricesByProductIDs);

        $arrProductPrices = array();
        if($stmt_getProductPricesByProductIDs->execute($arrProductIDs)){
            while($row=$stmt_getProductPricesByProductIDs->fetch(PDO::FETCH_ASSOC)){

                // print_r($row);

                foreach ($row as $key => $value) {
                    // echo $key."--".$value."++ <br>";
                    // echo $value."++ <br>";

                    if($key == "price"){
                        $arrProductPrices[] = $value;
                    }
                    // foreach($value as $k=>$price){
                    //     echo $price."++ <br>";
                    // }
                }
                // echo "6666";

                // $productVO = new ProductVO();
                // $productVO->setByAssocArray($row);

                // echo $orderVO->orderID . "<br>";
                // $arr_productVOs[] = $productVO; //@@@3 faster

            }
        }
        $db_link = NULL;

        // print_r( $arrProductPrices );

        return $arrProductPrices;
    }

    static function getProductPriceByProductIDAndPriceMappingTable($productID, $arrPriceMappingTables){

        $productPrice=0;

        

        


        return $productPrice;
    }

    static function getProductSortIDByProductID($productID){
        $productSortID=1;



        return $productSortID;
    }


}


?>