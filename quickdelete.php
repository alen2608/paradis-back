<?php

// 修改include檔案連結
include("susqli.func.php");
// 


if (isset($_POST['checkbox'])) {
  $check = $_POST['checkbox'];
  foreach ($check as $value) {
      echo $value;
      $sql = "DELETE FROM suppliers WHERE SupplierID = $value";
      mysqli_query(conn(), $sql);
  }
  header("Location: supplier.php");
}

?>
