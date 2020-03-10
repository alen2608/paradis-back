


<?php 

require_once("OrderDetailVO.php");

require_once("ProductDAO.php");
require_once("ProductVO.php");
require_once("ProductSortDAO.php");
require_once("ProductSortVO.php");



// require_once("dbLinkConfig.php");


class OrderDetailDAO{

    
    public $sql_fetchAll = "SELECT * FROM orderDetails";
    public $sql_fetchByOrderID = "SELECT * FROM orderDetails WHERE orderID = ?";

    // public $sql_fetch

    //@@@3 sql要動態組合
    // public $sql_insertRecords = "SELECT * FROM orders WHERE memberID = ?";

    
    function fetchAll(){

        //###1 為何寫上面不行!?
        require_once("dbLinkConfig.php");

        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
        $stmt_fetchAll = $db_link->prepare($this->sql_fetchAll);

        $arr_orderDetailVOs=array();
        if($stmt_fetchAll->execute()){
            while($row=$stmt_fetchAll->fetch(PDO::FETCH_ASSOC)){

                $OrderDetailVO = new OrderDetailVO();

                $OrderDetailVO->setByAssocArray($row);
                $arr_orderDetailVOs[] = $OrderDetailVO;
            }
        }
        $db_link = NULL;

        return $arr_orderDetailVOs;
    }

    // ###6 命名能否更精簡 還是要 MemID OrderID!?
    // function fetchByID($oid){

    // }

    function fetchByOrderID($oid){

        require_once("dbLinkConfig.php");
        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
        $stmt_fetchByOrderID = $db_link->prepare($this->sql_fetchByOrderID);

        $arr_orderDetailVOs=array();
        if($stmt_fetchByOrderID->execute(array($oid))){
            while($row=$stmt_fetchByOrderID->fetch(PDO::FETCH_ASSOC)){

                $OrderDetailVO = new OrderDetailVO();

                $OrderDetailVO->setByAssocArray($row);
                $arr_orderDetailVOs[] = $OrderDetailVO;
            }
        }
        $db_link = NULL;

        return $arr_orderDetailVOs;
    }


    function getOrderDetailVOsWithOrderIDAndProductIDs($orderID, $arrProductIDs)
    {
        $arrProductPrices = ProductDAO::getProductPricesByProductIDs($arrProductIDs);

        $arrOrderDetailVOs= array();
        for($i = 0; $i < count($arrProductIDs); $i++){
            $orderDetailVO = new OrderDetailVO();

            $orderDetailVO->orderID = $orderID;

            $orderDetailVO->productID = $arrProductIDs[$i];
            $orderDetailVO->unitPrice = $arrProductPrices[$i];

            //### TODO: fake data
            $orderDetailVO->quantity = 1;
            $orderDetailVO->discountID = 0;

            $arrOrderDetailVOs[] = $orderDetailVO;
        }


        return $arrOrderDetailVOs;
    }

    function insertRecordsWithOrderDetailVOs($arrOrderDetailVOs){
        // $newestOrderDetailID=0;

        $arrInsertData = $this->getInsertDataArrayByrOrderDetailVOArray($arrOrderDetailVOs);
        // print_r( $arrInsertData );// ok
        $this->insertRecordsWithDataArray($arrInsertData);
        $newestOrderDetailID = $arrOrderDetailVOs[0]->orderID;

        // echo "orderID: ".$newestOrderDetailID."<br>";
        return $newestOrderDetailID;
    }

    function getInsertDataArrayByrOrderDetailVOArray($arrOrderDetailVOs)
    {
        $arrInsertData = array();
        for($i=0; $i < count($arrOrderDetailVOs); $i++){
            $vo = $arrOrderDetailVOs[$i];
            $aRowOfData = [
                $vo->orderID,
                $vo->productID,
                $vo->unitPrice,
                $vo->quantity,
                $vo->discountID,
            ];
            $arrInsertData[] = $aRowOfData;
        }
        return $arrInsertData;
    }

    function insertRecordsWithDataArray($arr_rawData){

        require("dbLinkConfig.php");

        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);

        $arr_dataToInsert = Array();
        foreach($arr_rawData as $row=>$record){
            foreach($record as $value){
                $arr_dataToInsert[] = $value;
            }
        }

        // print_r($arr_dataToInsert);

        // 若存在則變成修改該筆資料欄位
        $arr_updateCols = array();
        $colNames = $this->getColNamesOfTable();
        foreach ($colNames as $curCol) {
            $arr_updateCols[] = $curCol . " = VALUES($curCol)";
        }
        $onDup = implode(', ', $arr_updateCols);

        //@@@8 allPlaces: 每個 (?..?) 的位置 =>  (?..?), ~ (?..?)
        $rowPlaces = '(' . implode(', ', array_fill(0, count($colNames), '?')) . ')';
        $allPlaces = implode(', ', array_fill(0, count($arr_rawData), $rowPlaces));

        // echo $allPlaces."<br>"; // OK


        $tblName = "orderDetails";
        //@@@3.1 sql要動態組合
        $sql_insertRecords = "INSERT INTO $tblName (" . implode(', ', $colNames) . ") VALUES " . $allPlaces . " ON DUPLICATE KEY UPDATE $onDup";
        $stmt_insertRecords = $db_link->prepare ($sql_insertRecords);

        try {
            if($stmt_insertRecords->execute($arr_dataToInsert)){

                //### 不確定會印什麼  ----->  0
                $lastInsertId = $db_link->lastInsertId();
                // echo "insert detailVOs success";
            }

        } catch (PDOException $e){
            echo $e->getMessage();
        }
        //  $db_link->commit();
        $db_link = NULL;

        // echo "<br>" . $lastInsertId . "<br>";


        // echo "inserted ". count($arr_rawData) ." records <br>";
        // return $lastInsertId;
    }

    function createDBLink($dbHost, $dbUsername, $dbPsw, $dbName){
        
        try{
            $dbLink = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUsername, $dbPsw);
        }catch(PDOException $e){
            print "connected failed {$e->getMEssage()}";
            die();
        }
        return $dbLink;
    }


    function getColNamesOfTable(){
        // @@@9 取得 obj 的 欄位名稱
    // echo "<br>".$str."<br>";
        $OrderDetailVO = new OrderDetailVO();

        //###888 擔心 每次 key印出來的順序 會不會一樣 (因為Hash沒有順序)
        //###888.1 目前測 跟 Class內屬性宣告 的順序一致
        $arr_colNames = array_keys( get_object_vars($OrderDetailVO));
        // print_r($arr_colNames);
        return $arr_colNames;
    }
}

//###1. transaction commit 問題
//@@@99
// 1. The LAST_INSERT_ID() doesn't work on UPDATE as it works on INSERT.
//     1.1 https://stackoverflow.com/questions/26498960/lastinsertid-for-update-in-prepared-statement


?>

