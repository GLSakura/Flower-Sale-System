<?php
include "connectSQL.php";
include "header.php";
session_start();
$arr = array();
$arr = $_POST['select'];
$arr1 = $_POST['num'];
$address = $_POST['address'];
$sumprice = $_POST['sumprice'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$words = $_POST['words'];
$goods = "";
$ordertime = date("Y-m-d H:i:s");
function composeGoods($str1, $str2)
{
    $goods = array();
    $lastgoods = "";
    for ($i = 0; $i < sizeof($str1); $i++) {
        $goods[$i] = $str1[$i] . "," . $str2[$i];
    }
    for ($i = 0; $i < sizeof($str1); $i++) {
        if ($i == sizeof($str1) - 1)
            $lastgoods .= $goods[$i];
        else
            $lastgoods .= ($goods[$i] . "|");
    }
    return $lastgoods;
}

$goods = composeGoods($arr, $arr1);

if ($address == '' || $name == '' || $phone == '')
    echo "<script>alert('您的信息填写不完整，请重新核实！');window.location.href='shoppingCart.php';</script>";
else {
    if (mb_strlen($words) >= 255) {
        echo "<script>alert('你的留言超出了最大限制长度（255）！请重新输入。');window.location.href='shoppingCart.php';</script>";
    } else {
        $sql = "insert into orders(OrderTime, Goods, UserName, ReceiveName, Phone, Address, Words, OrderPrice, IsPaid) 
values ('$ordertime','$goods','$user','$name','$phone','$address','$words','$sumprice','0')";
        $result1 = mysqli_query($coon, $sql);
        if ($result1 != false) {
            unset($_SESSION['cartlist']);
            echo "<script>alert('提交订单成功！');</script>";
        } else
            echo "<script>alert('订单提交失败！');history.back();</script>";
    }
}
?>

    <h1>提交订单成功！</h1><a href="orderShow.php">查看订单</a>
</div>
</body>
</html>


