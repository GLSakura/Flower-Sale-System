<?php
session_start();
$order = ($_GET['order'] != '') ? $_GET['order'] : '';
$user = $_SESSION['user'];
$str1 = $_SESSION['user'];
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
    <title>鲜花购物网站</title>
    <link rel="icon" type="text/css" href="./images/logo.png">
    <link rel="stylesheet" href="styles/index-style.css">
    <link rel="stylesheet" href="styles/allset.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome-all.css">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <style>
        hr {
            margin: 10px 0;
        }

        input:disabled {
            text-decoration: none;
            border: 0;
            background-color: white;
        }
        span:hover {
            cursor: pointer
        }
    </style>
</head>
<body style="margin: 0 auto;">
<div class="content">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-4" style="margin-top: 30px;">鲜花购物商城
            <?php
            if ($_SESSION['user'] == "")
                echo "<a class='btn btn-success btn-xs' href='login.php'>登录</a>" . "&nbsp;&nbsp;&nbsp;<a class='btn btn-info btn-xs'  href='register.php'>注册</a>";
            else {
                echo '<p>欢迎您，'.$_SESSION['user'] . "！  ".'<a class="btn btn-danger btn-xs"  href="loginOut.php">退出登录</a>'.'</p>';
            }
            ?>
        </div>
        <div class="col-md-5">
            <img src="./images/title-logo.png" alt="和音">
        </div>
        <div class="col-md-3" style="margin-top: 30px;padding-left: 150px;">
            <a class="" href="shoppingCart.php" style="font-size: 15px;text-decoration: none;color: black;">查看购物车
                <i class="fas fa-shopping-cart" style="font-size: 20px;"></i>
            </a>
        </div>
    </div>
    <hr style="height: 2px;background-color: black;border: 1px solid black;">
    <div class="navbar navbar-inverse">
        <ul class="nav nav-pills navbar-nav">
            <li><a href="index.php">首页</a></li>
            <li><a href="userInfo.php">个人中心</a></li>
            <li><a href="shoppingCart.php">购物车</a></li>
            <li><a href="orderShow.php">我的订单</a></li>
            <li><a href="VIPExplain.php">VIP</a></li>
        </ul>
        <form class="navbar-form navbar-right" method="post" action="goodSearch.php?order=<?php echo $order; ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="goodsearch" placeholder="请输入商品名检索信息"/>
            </div>
            <button type="submit" class="btn btn-success">搜索</button>
        </form>
    </div>
    <hr>