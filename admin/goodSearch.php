<?php
include "connectSQL.php";
include "header_admin.php";
$goodsearch = $_POST['goodsearch'];
$sql = "select * from goods where GoodName like '%$goodsearch%'";
if ($result = mysqli_query($coon, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else
    $data = array();
$num = mysqli_num_rows($result);
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

<form class="navbar-form navbar-right" method="post" action="goodSearch.php">
    <p style="display: inline;">当前共有<?php echo mysqli_num_rows($result); ?>条商品信息&nbsp;&nbsp;&nbsp;</p>
    <a class="btn btn-primary" href="goodAdd.php">添加商品</a>
    &nbsp;&nbsp;
    <div class="form-group">
        <input type="text" class="form-control" name="goodsearch"
               placeholder="<?php echo ($goodsearch == '') ? '' : $goodsearch; ?>"/>
    </div>
    <button type="submit" class="btn btn-default">搜索</button>
</form>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style='width: 5%;'>商品ID</th>
        <th style='width: 5%;'>商品名称</th>
        <th style="width: 25%;">商品简介</th>
        <th style='width: 5%;'>普通价格</th>
        <th style='width: 5%;'>会员价格</th>
        <th style='width: 5%;'>商品数量</th>
        <th style="width: 5%;">已售数量</th>
        <th style='width: 5%;'>缩略图片</th>
        <th style="width: 9%;">更新时间</th>
        <th style="width: 7%;">操作</th>
    </tr>
    </thead>
    <tbody style="font-size: 6px;">
    <?php

    if (!empty($data)) {
        foreach ($data as $value) {
            ?>
            <tr>
                <td><?php echo $value['GoodId']; ?></td>
                <td><?php echo $value['GoodName']; ?></td>
                <td><?php echo $value['GoodSummary']; ?></td>
                <td><?php echo $value['GoodPrice1']; ?></td>
                <td><?php echo $value['GoodPrice2']; ?></td>
                <td><?php echo $value['GoodNumber']; ?></td>
                <td><?php echo $value['SoldNumber']; ?></td>
                <td><?php echo $value['GoosSize']; ?></td>
                <td><?php $imagepath = "../" . $value['GoodImage'];
                    echo "<img class='img-circle' style='width: 60px;height: 60px;' src='$imagepath'>"; ?></td>
                <td><?php echo $value['UpdateTime']; ?></td>
                <td><a class="btn btn-info btn-xs" href="goodChange.php?id=<?php echo $value['GoodId'] ?>">修改</a>
                    <a class="btn btn-danger btn-xs" href="goodDel.php?id=<?php echo $value['GoodId'] ?>">删除</a>
                </td>
            </tr>
            <?php
        }
    } else
        echo "<tr><td colspan='13'><h3>没有查询到相关商品信息！</h3></td></tr>";
    ?>
    </tbody>
</table>
</div>
</body>
</html>
