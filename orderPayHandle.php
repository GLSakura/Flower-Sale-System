<?php
header("content-type:text/html;charset=utf-8");
include "connectSQL.php";
session_start();
$user = $_SESSION['user'];
$ispaid = $_GET['ispaid'];
$orderid = $_GET['orderid'];
$sql5 = "select * from users where UserName='$user'";
$result5 = mysqli_query($coon, $sql5);
$row5 = mysqli_fetch_assoc($result5);
$sql1 = "update orders set IsPaid='1' where OrderId='$orderid'";
$result1 = mysqli_query($coon, $sql1);
$sql = "select * from orders where OrderId='$orderid'";
$result = mysqli_query($coon, $sql);
$orderlist = array();
$goodlist = array();
$row = mysqli_fetch_assoc($result);
$data[] = $row;
$price = $row['OrderPrice'];

for ($i = 0; $i < sizeof($data); $i++) {
    $orderlist[$i] = explode("|", $data[$i]['Goods']);
}
for ($i = 0; $i < sizeof($orderlist); $i++) {
    for ($j = 0; $j < sizeof($orderlist[$i]); $j++) {
        $goodlist[$j] = explode(",", $orderlist[$i][$j]);
        $str = $goodlist[$j][0];
        $str2 = $goodlist[$j][1];
        $sql2 = "update goods set GoodNumber=(GoodNumber-$str2),SoldNumber=(SoldNumber+$str2) where GoodId='$str'";
        mysqli_query($coon, $sql2);
    }
}
$sql3 = "update users set ConsumeNum=(ConsumeNum+$price) where UserName='$user'";
mysqli_query($coon, $sql3);
if ($row5['ConsumeNum'] >= 10000) {
    $sql4 = "update users set IsVIP='1' where UserName='$user'";
    mysqli_query($coon, $sql4);
    if (mysqli_affected_rows($coon)) {
        echo "<script>alert('您的消费金额已达到10000元以上，恭喜您成为VIP用户！');</script>";
    }
}
if ($ispaid == '1') {
    echo "<script>alert('订单支付成功！即将跳转到网站首页。。。');window.location.href='index.php';</script>";
}