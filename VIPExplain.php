<?php

include "connectSQL.php";
session_start();
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
    <title>什么是VIP？</title>
    <link rel="icon" type="text/css" href="./images/logo.ico">
    <link rel="stylesheet" href="styles/index-style.css">
    <link rel="stylesheet" href="styles/allset.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome-all.css">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
</head>
<?php include "header.php"; ?>
<h3>什么是VIP？</h3>
<p>VIP是指注册在本网站的尊贵会员，在购物时享有商品的折扣价格优惠。</p>
<h3>如何成为VIP？</h3>
<p>只要在本网站注册并且消费金额达到10000万及以上，用户自动升级为VIP，享有独有优惠价格。</p>
</div>
<script type="text/javascript">
    $(function () {
        $("li").click(function () {
            $(this).addClass("active").siblings().removeClass("active");
        })
    })
</script>
</body>
</html>