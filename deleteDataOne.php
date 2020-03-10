<?php

    include_once("mysqlConnect.php");
    
    if( ($_GET["tid"]) != "" and ($_GET["tname"] != "")  ){

        $sql_query = "DELETE FROM Categories
        WHERE CategoryID = ?;";
        $stmt = $db_link->prepare($sql_query);
        $stmt->bind_param("i", $_GET["tid"]);
        $stmt->execute();

         header("Location: addProductType.php");
   
    }else{

        $sql_query = "DELETE FROM Products
        WHERE ProductID = ?;";
        $stmt = $db_link->prepare($sql_query);
        $stmt->bind_param("i", $_GET["id"]);
        $stmt->execute();

        header("Location: product.php");

    }
       

?>