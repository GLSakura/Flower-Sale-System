<?php
header("content-type:text/html;charset=utf-8");
include "connectSQL.php";
$id = $_GET['orderId'];
$deletesql = "delete from orders where OrderId=$id";
if (mysqli_query($coon, $deletesql)) {
    echo "<script>alert('取消订单成功');window.location.href='orderShow.php';</script>";
} else {
    echo "<script>alert('取消订单失败');window.location.href='orderShow.php';</script>";
}

