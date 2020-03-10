<?php 

require("orderVO.php");

// require("dbLinkConfig.php");


class orderDAO{

    //fetch
    public $sql_fetchAll = "SELECT * FROM orders";
    public $sql_fetchByMemberID = "SELECT * FROM orders 
    WHERE memberID = ?";

    //insert
    public $sql_insertSingleRecord =  "INSERT INTO orders (`orderID`, `memberID`, `orderDate`, `requiredDate`, `shippedDate`) 
    VALUES
    (?, ?, ?, ?, ?)";

    //delete
    public $sql_deleteSingleRecordByOrderID =  "DELETE FROM `orders` 
    WHERE orderID = ?";
    public $sql_deleteSingleRecordByMemberID =  "DELETE FROM `orders` 
    WHERE memberID = ?";
    public $sql_deleteRecordsByOrderIDs = "DELETE FROM `orders` 
    WHERE orderID IN orderIDsPH";

    //update
    public $sql_updateSingleRecordWithVO =
    "UPDATE orders 
    SET orderDate = ?, requiredDate= ?, shippedDate=? 
    WHERE orderID = ?";



    //latest order id
    public $sql_getLatestOrderID =
    "SELECT orderID From orders
     ORDER BY orderID DESC LIMIT 1";

    // public $sql_fetchAll = "2";
    // public $sql_fetchByMemberID = "1";
    
    function getLastOrderID(){
        
        require("dbLinkConfig.php");

        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
        $stmt_getLatestOrderID = $db_link->prepare($this->sql_getLatestOrderID);

        $lastOrderID;
        if($stmt_getLatestOrderID->execute()){
            while($row=$stmt_getLatestOrderID->fetch(PDO::FETCH_ASSOC)){
                // print_r($row);
                $lastOrderID = $row["orderID"];
            }
        }
        $db_link = NULL;
        // echo "fetch success";
        return $lastOrderID;
    }

    function deleteOrdersByIDs($arrOrderIDs){

        require("dbLinkConfig.php");

        $db_link = self::createDBLink($db_host, $db_username, $db_psw, $db_name);
        $inputForPlaceHolders = "(";
        $arrInputQs = array_fill(0, count($arrOrderIDs), '?');
        $strQs = implode(',', $arrInputQs);
        $inputForPlaceHolders = "(".$strQs.")";

        $sql_deleteRecordsByOrderIDs = str_replace("orderIDsPH",  $inputForPlaceHolders, $this->sql_deleteRecordsByOrderIDs);
        $stmt_deleteRecordsByOrderIDs = $db_link->prepare($sql_deleteRecordsByOrderIDs);
        
        $blHasDeleted = false;
        if($stmt_deleteRecordsByOrderIDs->execute($arrOrderIDs)){
            print_r($arrOrderIDs);
            echo "成功 delete" . $arrOrderIDs . "<br>";
            $blHasDeleted = true;
        }
        $db_link = NUll;

        return $blHasDeleted;
    }


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

        $arr_orderVOs=array();
        if($stmt_fetchAll->execute()){
            while($row=$stmt_fetchAll->fetch(PDO::FETCH_ASSOC)){

                // print_r($row);

                $orderVO = new orderVO();
                $orderVO->setByAssocArray($row);

                // echo $orderVO->orderID . "<br>";
                array_push($arr_orderVOs, $orderVO);
                // $arr_orderVOs[] = $orderVO; //@@@3 faster

            }
        }
        $db_link = NULL;
        // echo "fetch success";

        return $arr_orderVOs;
    }

    // function fetchByID($oid){

    // }

    function fetchByMemberID($mid){
        require("dbLinkConfig.php");

        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
        $stmt_fetchByMemberID = $db_link->prepare($this->sql_fetchByMemberID);

        $arr_orderVOs = array();
        if ($stmt_fetchByMemberID->execute(array($mid))) {
            while ($row = $stmt_fetchByMemberID->fetch(PDO::FETCH_ASSOC)) {

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

        $memberID = $vo->memberID;
        //@@@5 create 才在這邊新增
        $orderID = $vo->orderID;
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

    function insertSingleRecordWithMemberID($memID){

        // echo $memID;
        $memberID = $memID;

        // $memberID = $vo->memberID;

        // //@@@5 create 才在這邊新增
        // $orderID = $vo->orderID;
        // $orderDate = $vo->orderDate; 
        // $requiredDate = $vo->requiredDate;
        // $shippedDate = $vo->shippedDate;

        

        $newOrderID = $this->getNewOrderID();
        $curDate = new DateTime();
        $orderDate = $curDate->format("Ymd");

        $requiredDate = "20200506";
        $shippedDate = "20200406";
    
// echo "+++++++". $newOrderID. "--------";

        require("dbLinkConfig.php");

        $db_link = $this->createDBLink($db_host, $db_username, $db_psw, $db_name);
        $stmt_insertSingleRecord = $db_link->prepare($this->sql_insertSingleRecord);

        $lastInsertId; 
        if($stmt_insertSingleRecord->execute(array($newOrderID, $memberID, $orderDate, $requiredDate, $shippedDate))){
            // $lastInsertId = $db_link->lastInsertId();
            $lastInsertId = $newOrderID;
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

        require("dbLinkConfig.php");

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
    //     require("dbLinkConfig.php");

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

    function createDBLink($dbHost, $dbUsername, $dbPsw, $dbName){

        try{
            $dbLink = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8", $dbUsername, $dbPsw);
        }catch(PDOException $e){
            print "connected failed {$e->getMEssage()}";
            die();
        }
        return $dbLink;
    }

    function getNewOrderID(){

        $lastOrderID = $this->getLastOrderID();
        $lastOrderDate = substr( $lastOrderID , 0 , 8 );
        $lastOrderSer = substr( $lastOrderID , 8 , 4 );

        // echo $lastOrderSer."<br>";


        $curDate = new DateTime();
        $curDateStr = $curDate->format("Ymd");

        $newOrderDate = $lastOrderDate;
        $newOrderSer =$lastOrderSer;
        if($newOrderDate != $curDateStr){
            //換日 日期更新 重製0
            $newOrderDate = $curDateStr;
            $newOrderSer = 1;
        }
        else{
            // 沒換日 往上加
            $newOrderSer = $newOrderSer + 1;
        }

        // echo $newOrderSer;

        // echo ".....".$newOrderSer;
        $newOrderSer = str_pad($newOrderSer, 4, "0", STR_PAD_LEFT);
        $newOrderID = $newOrderDate.$newOrderSer;
        // echo $eee . "===" . $ddd;
        // echo ".....".$newOrderID;

        return $newOrderID;
    }

}
