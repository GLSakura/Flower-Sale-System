<?php
include "connectSQL.php";
include "header_admin.php";
$id = $_GET['id'];
$sql = "select * from goodsizes where SizeId=$id";
if ($result = mysqli_query($coon, $sql)) {
    $data = mysqli_fetch_assoc($result);
}
?>
<div class="navbar navbar-default">
    <ul class="nav nav-pills navbar-nav">
        <li><a href="manage.php">首页</a></li>
        <li><a href="userManager.php">用户管理</a></li>
        <li><a href="goodManager.php">商品管理</a></li>
        <li><a href="orderManager.php">订单管理</a></li>
        <li><a href="commentManager.php">评论管理</a></li>
        <li class="active"><a href="sizeManager.php">规格配置</a></li>
        <li><a href="soldAnalysis.php">销售分析</a></li>
    </ul>
</div>
<h4>修改规格配置</h4>
<form method="post" action="sizeChangeHandle.php?id=<?php echo $data['SizeId']; ?>" enctype="multipart/form-data"
      role="form" style="width: 300px;margin: 0 auto; margin-top: 20px;">
    <div class="form-group">
        <label class="control-label" for="hmgnum">红玫瑰数量：</label>
        <input class="form-control" type="text" name="hmgnum" value="<?php echo $data['红玫瑰']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="mtxnum">满天星数量：</label>
        <input class="form-control" type="text" name="mtxnum" value="<?php echo $data['满天星']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="bhnum">百合数量：</label>
        <input class="form-control" type="text" name="bhnum" value="<?php echo $data['百合']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="zmgnum">紫玫瑰数量：</label>
        <input class="form-control" type="text" name="zmgnum" value="<?php echo $data['紫玫瑰']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="lmgnum">蓝玫瑰数量：</label>
        <input class="form-control" type="text" name="lmgnum" value="<?php echo $data['蓝玫瑰']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="yjxnum">郁金香数量：</label>
        <input class="form-control" type="text" name="yjxnum" value="<?php echo $data['郁金香']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="bmgnum">白玫瑰数量：</label>
        <input class="form-control" type="text" name="bmgnum" value="<?php echo $data['百玫瑰']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="xrknum">向日葵数量：</label>
        <input class="form-control" type="text" name="xrknum" value="<?php echo $data['向日葵']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="knxnum">康乃馨数量：</label>
        <input class="form-control" type="text" name="knxnum" value="<?php echo $data['康乃馨']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="mlynum">玛利亚数量：</label>
        <input class="form-control" type="text" name="mlynum" value="<?php echo $data['玛利亚']; ?>">
    </div>
    <button class="btn btn-info" type="submit">修改规格</button>
    <button class="btn btn-default" type="reset">重置</button>
</form>
</div>
</body>
</html>