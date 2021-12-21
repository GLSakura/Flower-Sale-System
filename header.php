<body style="margin: 0 auto;">
<div class="content">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-4" style="margin-top: 30px;">欢迎来到法兰沃鲜花购物网站!
            <?php
            if ($_SESSION['user'] == "")
                echo "<a class='btn btn-success btn-xs' href='login.php'>登录</a>" . "&nbsp;&nbsp;&nbsp;<a class='btn btn-info btn-xs'  href='register.php'>注册</a>";
            else {
                echo '<p>欢迎您，' . '<a href="userInfo.php"><img class="img-rounded" style="width: 30px;height: 30px;" src="' . $row1['UserImage'] . '" title="' . $str1 . '"></a>' . '<a class="btn btn-danger btn-xs"  href="loginOut.php">退出登录</a>' . '</p>';
            }
            ?>
        </div>
        <div class="col-md-5">
            <img src="./images/title-logo.jpg" alt="法兰沃">
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
            <li><a href="lastGoods.php">新品上市</a></li>
            <li><a href="hotGoods.php">最热爆款</a></li>
        </ul>
        <form class="navbar-form navbar-right" method="post" action="goodSearch.php?order=<?php echo $order; ?>">
            <div class="form-group">
                <input type="text" class="form-control" name="goodsearch" placeholder="请输入商品名检索信息"/>
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
    </div>
    <hr>