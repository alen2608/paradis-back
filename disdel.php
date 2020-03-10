<?php
include("mysqli.func.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE  FROM Discount WHERE DiscountID= $id";
    mysqli_query(conn(), $sql);
    header("Location: discount.php");
}
if (isset($_POST['Checkbox'])) {
    $check = $_POST['Checkbox'];
    echo $check;
    foreach ($check as $value) {
        echo $value;
        $sql = "DELETE FROM Discount WHERE DiscountID = $value";
        mysqli_query(conn(), $sql);
    }
    header("Location: discount.php");
} else {
    header("Location: discount.php");
}
