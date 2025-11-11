<?php
$op=$_GET["chon"];
if($op!="") {
    include("database.class.php");
    $dao = new DAO("root", "", "udn");

    $sql = "SELECT * FROM {$op}";
    $header = "DANH SÁCH {$op}";
    $dao->table($sql, $header);
}
?>