<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');
define('DB_NAME', 'paradis');

function conn()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    mysqli_query($link, "set names utf8");
    return $link;
}

function doresult($sql)
{
    $result = mysqli_query(conn(), $sql);
    return $result;
}
 
function dolists($result)
{
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}
function totalnums($sql)
{
    $result = mysqli_query(conn(), $sql);
    return $result->num_rows;
}

