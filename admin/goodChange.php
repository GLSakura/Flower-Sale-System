<?php
include "connectSQL.php";
include "header_admin.php";
$id = $_GET['id'];
$sql = "select * from goods where GoodId=$id";
if ($result = mysqli_query($coon, $sql)) {
    $data = mysqli_fetch_assoc($result);
}
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
<h4>修改商品信息</h4>
<form method="post" action="goodChangeHandle.php?id=<?php echo $data['GoodId']; ?>" enctype="multipart/form-data"
      role="form" style="width: 300px;margin: 0 auto; margin-top: 20px;">
    <div class="form-group">
        <label class="control-label" for="goodname">商品名称：</label>
        <input class="form-control" type="text" name="goodname" size="20" value="<?php echo $data['GoodName']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="goodsummary">商品简介：</label>
        <input class="form-control" type="text" name="goodsummary" size="20"
               value="<?php echo $data['GoodSummary']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="goodprice1">普通价格：</label>
        <input class="form-control" type="text" name="goodprice1" size="20" value="<?php echo $data['GoodPrice1']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="goodprice2">会员价格：</label>
        <input class="form-control" type="text" name="goodprice2" size="20" value="<?php echo $data['GoodPrice2']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="goodnumber">商品数量：</label>
        <input class="form-control" type="text" name="goodnumber" value="<?php echo $data['GoodNumber']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="soldnumber">已售数量：</label>
        <input class="form-control" type="text" name="soldnumber" value="<?php echo $data['SoldNumber']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="goodimage">商品图片：</label>
        <input class="form-control" type="file" name="goodimage">
    </div>
    <button class="btn btn-info" type="submit">修改商品</button>
    <button class="btn btn-default" type="reset">重置</button>
</form>
</div>
</body>
</html>
