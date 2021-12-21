<?php
header("content-type:text/html;charset=utf-8");
include "connectSQL.php";
$id = $_GET['id'];
$deletesql = "delete from orders where OrderId=$id";
if (mysqli_query($coon, $deletesql)) {
    echo "<script>alert('删除订单成功');window.location.href='orderManager.php';</script>";
} else {
    echo "<script>alert('删除订单失败');window.location.href='orderManager.php';</script>";
}