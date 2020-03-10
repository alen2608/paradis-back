<?php
// 一個簡單但可以運作的 REST API，
// 物件導向與MVC課程時，再來寫進化版

$method = $_SERVER['REQUEST_METHOD'];
$url = explode("/", rtrim($_GET["url"], "/") );

$dbLink = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
mysqli_query($dbLink, "set names utf8");
mysqli_select_db($dbLink, "paradis");

$commandText = "select * from members";
$result = mysqli_query($dbLink, $commandText);

switch ($method . " " . $url[0]) {
    case "POST members":
        insertmembers();
        break;
    case "GET members":
        if (isset($url[1]))
            getmembersById($url[1]);
        else
            getmembers();
        break;
    case "PUT members":
        updatemembers($url[1]);
        break;
    case "DELETE members":
        deletemembers($url[1]);
        break;
    default:
        echo "";
}
mysqli_close($dbLink);


function getmembersbyId($id) {
    if (!is_numeric($id))
    	die( "ID is not a number." );

    global $dbLink;
    $result = mysqli_query($dbLink, 
      "select * from members where MemberID = " . $id );
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}


function getmembers() {
    global $dbLink;
    $result = mysqli_query($dbLink, 
      "select * from members");
    echo "[";
    while ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    }
    echo "]";
}


function insertmembers() {
    global $dbLink;
    
    $MemberName     = $_POST["MemberName"];
    $MemberPW       = $_POST["MemberPW"];
    $MemberSex      = $_POST["MemberSex"];
    $MemberBirthday = $_POST["MemberBirthday"];
    $MemberPhone    = $_POST["MemberPhone"];
    $MemberEmail    = $_POST["MemberEmail"];
    $MemberAddress  = $_POST["MemberAddress"];
    $MemberLevel    = $_POST["MemberLevel"];

    $commandText = 
        "insert into members "
      . "set MemberName     = '{$MemberName}' "
      . "  , MemberPW       = '{$MemberPW}'"
      . "  , MemberSex      = '{$MemberSex}'"
      . "  , MemberBirthday = '{$MemberBirthday}'"
      . "  , MemberPhone    = '{$MemberPhone}'"
      . "  , MemberEmail    = '{$MemberEmail}'"
      . "  , MemberAddress  = '{$MemberAddress}'"
      . "  , MemberLevel    = '{$MemberLevel}'";
    $result = mysqli_query($dbLink, $commandText); 

    header("Location: http://localhost/paradis/member_table.php");
}


function updatemembers($id) {
    if (! isset ( $id ))
    	die ( "Parameter id not found." );
    if (! is_numeric ( $id ))
        die ( "id not a number." );

    global $dbLink;
    
    parse_str(file_get_contents('php://input'), $putData);
    //echo json_encode($putData);
    //return;

    $MemberName     = $putData["MemberName"];
    $MemberPW       = $putData["MemberPW"];
    $MemberSex      = $putData["MemberSex"];
    $MemberBirthday = $putData["MemberBirthday"];
    $MemberPhone    = $putData["MemberPhone"];
    $MemberEmail    = $putData["MemberEmail"];
    $MemberAddress  = $putData["MemberAddress"];
    $MemberLevel    = $putData["MemberLevel"];

    $commandText = 
        "update members "
      . "set MemberName     = '{$MemberName}' "
      . "  , MemberPW       = '{$MemberPW}'"
      . "  , MemberSex      = '{$MemberSex}'"
      . "  , MemberBirthday = '{$MemberBirthday}'"
      . "  , MemberPhone    = '{$MemberPhone}'"
      . "  , MemberEmail    = '{$MemberEmail}'"
      . "  , MemberAddress  = '{$MemberAddress}'"
      . "  , MemberLevel    = '{$MemberLevel}'"
      . "  where MemberId = {$id}";
    mysqli_query($dbLink, $commandText); 
    
}


function deletemembers($id) {
    if (! isset ( $id ))
    	die ( "member id not found." );
    if (! is_numeric ( $id ))
        die ( "ID not a number." );

    global $dbLink;
    
    $commandText = 
        "delete from members "
      . "  where MemberId = {$id}";
    mysqli_query($dbLink, $commandText); 
}

?>