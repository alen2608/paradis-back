<?php

require_once "orderVO.php";
require_once "OrderDetailVO.php";

require_once "orderDAO.php";
require_once "OrderDetailDAO.php";

    // @@@9 取得 obj 的 欄位名稱
    // $OrderDetailVO = new OrderDetailVO();
    // $str = implode(", ", array_keys( get_object_vars($OrderDetailVO) ));;
    // echo "<br>".$str."<br>";

    $orderDAO = new orderDAO();

  
  $orderDetailDAO = new OrderDetailDAO();
  $arr_orderDetailVOs = $orderDetailDAO->fetchByOrderID(201901010001);
//   $arr_orderDetailVOs = $orderDetailDAO->fetchAll();


//   print_r($arr_orderDetailVOs);

    $aVO = $arr_orderDetailVOs[0];

    print_r($aVO);
    print_r(count($arr_orderDetailVOs));

    echo "<br>" . $aVO->orderID . "<br>";
    // header("Location:orderTable.php");
    exit();




  //@@@4 update
    // $testVO = new orderVO();
    // $testVO->orderID = "201901070001";
    // $testVO->memberID = "111111";
    // $testVO->orderDate = "20300101";
    // $testVO->requiredDate = "20300101";
    // $testVO->shippedDate ="20300101";

    // $lastUpdateID = $orderDAO->updateSingleRecordWithVO($testVO);
    // echo "lastUpdateID = " . $lastUpdateID . "<br>";

  //@@@3 delete
//   $lastDeleteID = $orderDAO->deleteSingleRecordByOrderID(201901010001);
//   echo "lastDeleteID = " . $lastDeleteID . "<br>";


//@@@2 insert
    // $testVO = new orderVO();
    // $testVO->orderID = "99999";
    // $testVO->memberID = "111111";
    // $testVO->orderDate = "20300101";
    // $testVO->requiredDate = "20300101";
    // $testVO->shippedDate ="20300101";

    // $lastInsertID = $orderDAO->insertSingleRecordWithVO($testVO);
    // echo "lastInsertID = " . $lastInsertID . "<br>";

  //@@@1 fetch 
//   $arr_orderVOs = $orderDAO->fetchByMemberID(100);

//   $aVO = $arr_orderVOs[0];

//   print_r($aVO);
//   echo "<br>" .$aVO->orderID . "<br>";

//@@@5 不能這樣寫 -> 物件寫法
//   echo $aVO['orderID'];

    // header("Location:orderTable.php");
    // exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    
    <table border="1" align="center"> 

        <?php
        // $a=<<<ewr
        
        // ewr;

        //     $tmp = $arr_orderVOs[0];
        //     $tmpArr = get_object_vars($tmp);
        //     $properties = array_keys($tmpArr);

        //     // 欄位名稱列
        //     echo "<tr>";
        //     for($i = 0; $i < count($properties); $i++)
        //     {
        //         echo "<td>" . $properties[$i] . "</td>"; 
        //     }
        //     echo "</tr>";

        //     // 資料列
        //     foreach($arr_orderVOs as $index=>$orderVO){
        //         // echo "key = " . $key . " -------- value =" ;
        //         // print_r($value);
            
        //         // echo "fetch finished";
        //         echo "<tr>";    

        //             foreach($orderVO as $orderField=>$orderContent)
        //             {
        //                 echo "<td>" . $orderContent . "</td>";
        //             }
        //         echo "</tr>";


        //     }
        ?>

    </table>



</body>
</html>


<?php

// require_once "orderVO.php";
// require_once "orderDAO.php";

//   $orderDAO = new orderDAO();

// //   $arr_orderVOs = $orderDAO->fetchAll();

//   $arr_orderVOs = $orderDAO->fetchByMemberID(33);



// //   print_r($arr_orderVOs);
//   foreach($arr_orderVOs as $index=>$orderVO){
//     // echo "key = " . $key . " -------- value =" ;
//     // print_r($value);

//     // echo "fetch finished";
//     echo "<tr>";
//         foreach($orderVO as $orderField=>$orderContent)
//         {
//             echo "<td>" .. "</td>";
//         }
//     echo "</tr>";

//     // echo "orderID: "  . $orderVO->orderID . 
//     //      "   memberID:  " . $orderVO->memberID . 
//     //      "   orderDate:   "  . $orderVO->orderDate . 
//     //      "   requiredDate:  " . $orderVO->requiredDate . 
//     //      "   shippedDate:  "  . $orderVO->shippedDate . 
//     //      "<br>";
//     }


    
?>

