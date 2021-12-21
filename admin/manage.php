<?php
include "header_admin.php";
?>

<div class="navbar navbar-default">
    <ul class="nav nav-pills navbar-nav">
        <li class="active"><a href="manage.php">首页</a></li>
        <li><a href="userManager.php">用户管理</a></li>
        <li><a href="goodManager.php">商品管理</a></li>
        <li><a href="orderManager.php">订单管理</a></li>
        <li><a href="commentManager.php">评论管理</a></li>
        <li><a href="soldAnalysis.php">销售分析</a></li>
    </ul>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h1>后台管理系统</h1>
    </div>
    <div class="panel-body">
        <p>本网站是个人开发的小项目，目前实现的功能比较少，很不全面，另外网页操作界面还是有一些不美观。总的来说
            本网站有很多小缺陷，期待在日后，我们可以将其功能和界面修缮，以达到用户的需求。
        </p>
        <h3>系统信息</h3>
        <table class="table table-bordered">
            <tr>
                <th>操作系统</th>
                <td><?php echo PHP_OS; ?></td>
            </tr>
            <tr>
                <th>PHP版本</th>
                <td><?php echo PHP_VERSION; ?></td>
            </tr>
            <tr>
                <th>运行方式</th>
                <td><?php echo PHP_SAPI; ?></td>
            </tr>
        </table>
        <h3>网站信息</h3>
        <table class="table table-bordered">
            <tr>
                <th>系统名称</th>
                <td>和音鲜花购物商城</td>
            </tr>

            <tr>
                <th>网站首页</th>
                <td><a class="btn btn-info" href="../index.php">点击这里跳转到网站首页</a></td>
            </tr>
        </table>
    </div>
    <div class="panel-footer">
        开发者：Glan
    </div>
</div>

</div>
</body>
</html>
