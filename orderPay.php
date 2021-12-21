<?php
include "connectSQL.php";
session_start();
$orderid = $_GET['orderId'];
$sql2 = "select * from orders where OrderId='$orderid'";
$result2 = mysqli_query($coon, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$sql = "update orders set IsPaid='1' where OrderId='$orderid'";
$user = $_SESSION['user'];
if ($user != '') {
    $sql1 = "select * from users where UserName='$user'";
    $result1 = mysqli_query($coon, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>法兰沃----懂你的心</title>
    <link rel="icon" type="text/css" href="./images/logo.ico">
    <link rel="stylesheet" href="styles/index-style.css">
    <link rel="stylesheet" href="styles/allset.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome-all.css">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
</head>
<?php include "header.php"; ?>
当前订单总价格为：<?php echo $row2['OrderPrice']; ?>
共需支付<?php echo $row2['OrderPrice']; ?>
<br>
<label>请选择支付平台：</label><br>
<img src="images/wx-pay.png" alt="" style="width: 100px;height: 40px;">微信支付<input class="radio2" type="radio"
                                                                                  name="radio2" value="radio单选项1"/><br>
<img src="images/zfb-pay.jpg" alt="" style="width: 100px;height: 40px;">支付宝支付<input class="radio2" type="radio"
                                                                                    name="radio2"
                                                                                    value="radio单选项2"/><br>
<img src="images/yhk-pay.jpg" alt="" style="width: 100px;height: 40px;">银行卡支付<input class="radio2" type="radio"
                                                                                    name="radio2"
                                                                                    value="radio单选项3"/><br>
<span>请输入支付密码：</span><br>
<input type="password" placeholder="在此输入支付密码"><br><br>
<a class="btn btn-success" href="orderPayHandle.php?orderid=<?php echo $orderid; ?>&&ispaid=1">确认支付</a>
</div>
</body>
</html>
