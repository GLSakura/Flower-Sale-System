<?php
include "connectSQL.php";
include "header_admin.php";
$id = $_GET['id'];
$sql = "select * from orders where OrderId=$id";
if ($result = mysqli_query($coon, $sql)) {
    $data = mysqli_fetch_assoc($result);
}
?>
<div class="navbar navbar-default">
    <ul class="nav nav-pills navbar-nav">
        <li><a href="manage.php">首页</a></li>
        <li><a href="userManager.php">用户管理</a></li>
        <li><a href="goodManager.php">商品管理</a></li>
        <li class="active"><a href="orderManager.php">订单管理</a></li>
        <li><a href="commentManager.php">评论管理</a></li>
        <li><a href="sizeManager.php">规格配置</a></li>
        <li><a href="soldAnalysis.php">销售分析</a></li>
    </ul>
</div>
<h4>修改订单信息</h4>
<form method="post" action="orderChangeHandle.php?id=<?php echo $data['OrderId']; ?>" enctype="multipart/form-data"
      role="form" style="width: 300px;margin: 0 auto; margin-top: 20px;">
    <div class="form-group">
        <label class="control-label" for="goods">商品id及数量（用|分割）：</label>
        <input class="form-control" type="text" name="goods" size="20" value="<?php echo $data['Goods']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="username">用户名：</label>
        <input class="form-control" type="text" name="username" size="20" value="<?php echo $data['UserName']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="receivename">收件人姓名：</label>
        <input class="form-control" type="text" name="receivename" size="20"
               value="<?php echo $data['ReceiveName']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="phone">联系电话：</label>
        <input class="form-control" type="text" name="phone" size="20" value="<?php echo $data['Phone']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="address">收货地址：</label>
        <input class="form-control" type="text" name="address" value="<?php echo $data['Address']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="words">留言：</label>
        <input class="form-control" type="text" name="words" value="<?php echo $data['Words']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="orderprice">订单金额：</label>
        <input class="form-control" type="text" name="orderprice" value="<?php echo $data['OrderPrice']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="ispaid">是否付款：</label>
        <input class="form-control" type="text" name="ispaid" value="<?php echo $data['IsPaid']; ?>">
    </div>
    <button class="btn btn-info" type="submit">修改订单信息</button>
    <button class="btn btn-default" type="reset">重置</button>
</form>
</div>
</body>
</html>