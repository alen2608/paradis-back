<?php
// require_once
require_once "orderDAO.php";
require_once "orderVO.php";
require_once "OrderDetailDAO.php";
require_once "OrderDetailVO.php";

// require_once "ProductDAO.php";



class OrderController{

    function handleReq($methodType, $params){
        switch ($methodType) {
            case "POST":
                $this->insertOrderWithData($params);
                // echo "creating ...";
                break;
            case "GET":
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

    function insertOrderWithData($data){

        $orderDAO = new orderDAO();

        //TODO: 塞Member ID
        $newestOrderID = $orderDAO->insertSingleRecordWithMemberID("1");
// echo "~~~~".$newestOrderID."~~~";

        //@@@5 寫在 OrderDAO內!?
        $orderDetailDAO = new OrderDetailDAO();

        // print_r($data);

        $arrOrderDetailVOs = $orderDetailDAO->getOrderDetailVOsWithOrderIDAndProductIDs($newestOrderID, $data);
        // print_r($arrOrderDetailVOs);

        $newestOrderDetailID = $orderDetailDAO->insertRecordsWithOrderDetailVOs($arrOrderDetailVOs);
        // print_r()

        return $newestOrderID;
    }

    

    function testFunc(){
        echo "OrderController hi";
    }
}
