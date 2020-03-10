<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
//主機位置
$hostname_conn = "127.0.0.1";
//資料庫名稱
$database_conn = "paradis";
//連線帳號
$username_conn = "root";
//連線密碼
$password_conn = "";
//資料庫連線
$conn = mysqli_connect($hostname_conn, $username_conn,
$password_conn,$database_conn) ;
//使用utf8格文
mysqli_query($conn,"SET CHARACTER SET UTF8");
mysqli_set_charset($conn, "utf8");

?>