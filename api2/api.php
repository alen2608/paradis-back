<?php

// echo mime_content_type( 1546 );
$strContentType = $_SERVER["CONTENT_TYPE"];
// echo $strContentType;
$mimeType = getMIMETypeString($strContentType);
echo $mimeType ."-------------------";



// echo $_GET["url"] . "-------------------";// order


// echo $_SERVER['REQUEST_URI'];  // ### 有抓到 params
$reqURI = $_SERVER['REQUEST_URI']; 
$yyy = explode("?",$reqURI);
echo end($yyy) ;


// print_r( file_get_contents($_SERVER['REQUEST_URI']) );
foreach($_GET as $key => $value){
    echo $key . " : " . $value . "<br />\r\n";
  }
// print_r( );

// print_r($_SERVER["CONTENT_TYPE"]);
// echo "eee";
// exit();



$root = realpath($_SERVER["DOCUMENT_ROOT"]);
// echo $root.'\project_serverside\order\OrderController.php';
$path = $root . '\paradis\order\OrderController.php';

require($path);

$method = $_SERVER['REQUEST_METHOD'];

// print_r($_GET["url"]);
$url = explode("/", rtrim($_GET["url"], "/")); //order
print_r($url);



// $path = realpath($_SERVER['DOCUMENT_ROOT'])."/project_serverside"."/order"."OrderController.php";
// echo $path;
// // require_once "/project_serverside/order/OrderController.php";
// require_once realpath ($path);
// header("Content-Type: text/html; charset=utf-8");



// print_r($_GET);


// echo "aaa";



//用 mime 來判斷 走哪邊
switch ($mimeType){
    case "multipart/form-data":{ // POST FormData
        doNonJSONWay();
        break;
    }
    case "application/json":{ // POST JSON
        doJSONWay();
        break;
    }
    case "application/jsonapplication":{ //GET 會走這
        doNonJSONWay();
        break;
    }
    default:{
        break;
    }
}

// if ($mimeType) {
//     // echo "json";
//     doJSONWay();
// } else {
//     // echo "----------- not json";
//     doNonJSONWay();
// }

// exit();

function doJSONWay(){
    // print_r($_GET["url"]);
    // echo $_SERVER['REQUEST_URI']. "5555555555". "<br>";

    // $result = file_get_contents($_SERVER['REQUEST_URI']);
    // print_r($result);

    $json = file_get_contents('php://input'); // 必須是POST
    // print_r($json);// ["1564565"]
    // $dataInJSONFormat = json_decode($json); // decode 留給 Controller 內做
    // print_r($JSONData); //Array([0] => 1564565 )
    // echo $JSONData; //not string

    global $method, $url;
    $controllerName = ucfirst($url[0]) . "Controller";
    $controller = new $controllerName();

    $controller->handleReqWithJSONData($method, $json);


}

function doNonJSONWay()
{
    $params = 0;
    foreach ($_POST as $key => $value) { // value 就是接收陣列[id1, id2, id3...]

        // echo($value."-----".$key."<br>"); // key是 Products


        // print_r($value);

        global $params;
        $params = $value;
        foreach ($value as $k => $v) {
            // echo "selected" . $k ."---". $v; // 0 --- ID
            // global $params;
            // $params = $v;
        }
    }

    global $method, $url;
    // echo $params;
    $controllerName = ucfirst($url[0]) . "Controller";
    $controller = new $controllerName();
    // echo $controllerName . "<br><br><br>";

    // $controller->testFunc();
    $controller->handleReq($method, $params);
}

function getMIMETypeString($rawContentTypeStr){
    $arrMIMETypes = ["multipart/form-data", "application/json", "application/jsonapplication"];
    $strMIME="";
    foreach($arrMIMETypes as $mimeType)
    {
        // echo $mimeType;
        // 幹 回傳找到的位置0 請小心
        if(strpos($rawContentTypeStr, $mimeType) !== false) {
            echo $mimeType;
            $strMIME = $mimeType;
            break;
        }
    }
    return $strMIME;
}


// print_r($params);





// print_r(file_get_contents('php://input')); #111 Multi/form-data === file_get_contents('php://input') 會抓不到東西

// echo $method . " +++++++" . $url[0] . " ". $url[1];

// parse_str(file_get_contents('php://input'), $putData);
// print_r($putData);




// echo $method;
// switch ($method) {
//     case "POST":

//         echo "creating ...";
//         break;
//     case "GET":
//         break;
//     case "PUT":
//         echo 'update ...';
//         break;
//     case "DELETE":
//         echo 'delete ...';
//         break;
//     
//         echo "Thank you";
// }
