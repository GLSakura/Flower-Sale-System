<?php
include "header_admin.php";
?>
<div class="navbar navbar-default">
    <ul class="nav nav-pills navbar-nav">
        <li><a href="manage.php">首页</a></li>
        <li><a href="userManager.php">用户管理</a></li>
        <li class="active"><a href="goodManager.php">商品管理</a></li>
        <li><a href="orderManager.php">订单管理</a></li>
        <li><a href="commentManager.php">评论管理</a></li>
    </ul>
</div>
<h4>添加商品信息</h4>
<form method="post" action="goodAddHandle.php" enctype="multipart/form-data" role="form"
      style="width: 300px;margin: 0 auto; margin-top: 20px;">
    <div class="form-group">
        <label class="control-label" for="goodname">商品名称：</label>
        <input class="form-control" type="text" name="goodname" size="20">
    </div>
    <div class="form-group">
        <label class="control-label" for="goodsummary">商品简介：</label>
        <input class="form-control" type="text" name="goodsummary" size="20">
    </div>
    <div class="form-group">
        <label class="control-label" for="goodprice1">普通价格：</label>
        <input class="form-control" type="text" name="goodprice1" size="20">
    </div>
    <div class="form-group">
        <label class="control-label" for="goodprice2">会员价格：</label>
        <input class="form-control" type="text" name="goodprice2" size="20">
    </div>
    <div class="form-group">
        <label class="control-label" for="goodnumber">商品数量：</label>
        <input class="form-control" type="text" name="goodnumber">
    </div>
    <div class="form-group">
        <label class="control-label" for="soldnumber">已售数量：</label>
        <input class="form-control" type="text" name="soldnumber">
    </div>
    <div class="form-group">
        <label class="control-label" for="goodimage">商品图片：</label>
        <input class="form-control" type="file" name="goodimage">
    </div>
    <button class="btn btn-info" type="submit">添加商品</button>
    <button class="btn btn-default" type="reset">重置</button>
</form>
</div>
</body>
</html>
