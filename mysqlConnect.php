<?php

    header("Content-Type: text/HTML; charset = utf-8");
    
    // 資料庫主機設定
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "paradis";

    // 連線資料庫
    $db_link = @new mysqli($db_host,$db_username,$db_password,$db_name);
    
    if($db_link -> connect_error != ""){
        echo "資料庫連接失敗";
    }else{
        $db_link -> query("SET NAMES 'utf8'");
    }

    if ($result = $db_link->query("SELECT DATABASE()")) {
	    $row = $result->fetch_row();
	    $result->close();
	}

?>