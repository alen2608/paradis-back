<?php
// require_once
require_once "orderDAO.php";
require_once "orderVO.php";
require_once "OrderDetailDAO.php";
require_once "OrderDetailVO.php";

// require_once "ProductDAO.php";



class OrderController{

    function handleReqWithJSONData($methodType, $JSONData){
        switch ($methodType) {
            case "POST":
                // echo "creating ...";
                break;
            case "GET":

                break;
            case "PUT":
                echo 'JSON update ...';

                break;
            case "DELETE":{
                echo 'JSON delete ...';
                $arrIDs = json_decode($JSONData);
                print_r( $arrIDs );
                $this->deleteOrdersByIDs($arrIDs); //傳入Array 可做多筆
                // exit();
                break;
            }  
            default:
                echo "JSON Thank you";
        }
    }


    function handleReq($methodType, $params){
        switch ($methodType) {
            case "POST":
                $this->insertOrderWithData($params);
                // echo "creating ...";
                break;
            case "GET":
                // 傳入陣列 要做多筆嗎 怎設計!?
                // 目前只要做一筆
                $this->getOrderDetailByID($params); 
                break;
            case "PUT":
                echo 'update ...';
                break;
            case "DELETE":
                echo 'delete ...';
                break;
            default:
                echo "Thank you";
        }

    }

    function insertOrderWithData($arrData){ // 處理 ArrData

        $orderDAO = new orderDAO();

        //TODO: 塞Member ID
        $newestOrderID = $orderDAO->insertSingleRecordWithMemberID("1");
// echo "~~~~".$newestOrderID."~~~";

        //@@@5 寫在 OrderDAO內!?
        $orderDetailDAO = new OrderDetailDAO();

        // print_r($data);

        $arrOrderDetailVOs = $orderDetailDAO->getOrderDetailVOsWithOrderIDAndProductIDs($newestOrderID, $arrData);
        print_r($arrOrderDetailVOs);

        $newestOrderDetailID = $orderDetailDAO->insertRecordsWithOrderDetailVOs($arrOrderDetailVOs);
        // print_r()

        return $newestOrderID;
    }

    function getOrderDetailByID($orderID){

    }
    

    function deleteOrdersByIDs($arrOrderIDs){
        $orderDAO = new orderDAO();
        $orderDAO->deleteOrdersByIDs($arrOrderIDs);

    }

    function testFunc(){
        echo "OrderController hi";
    }
}
