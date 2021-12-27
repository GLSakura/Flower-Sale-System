<?php
include "connectSQL.php";
include "header_admin.php";
$sql = "select * from orders";
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
        <li><a href="goodManager.php">商品管理</a></li>
        <li class="active"><a href="orderManager.php">订单管理</a></li>
        <li><a href="commentManager.php">评论管理</a></li>
    </ul>
</div>
<form class="navbar-form navbar-right" method="post" action="orderSearch.php">
    <p style="display: inline;">当前共有<?php echo mysqli_num_rows($result); ?>条订单信息&nbsp;&nbsp;&nbsp;</p>
    <div class="form-group">
        <input type="text" class="form-control" name="ordersearch" placeholder="请输入订单号检索信息"/>
    </div>
    <button type="submit" class="btn btn-default">搜索</button>
</form>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 5%;">订单ID</th>
        <th style="width: 8%;">商品id及数量</th>
        <th style="width: 5%;">用户名</th>
        <th style="width: 5%;">收件人</th>
        <th style="width: 5%;">联系电话</th>
        <th style="width: 12%;">收货地址</th>
        <th style="width: 10%;">留言</th>
        <th style="width: 5%;">订单金额</th>
        <th style="width: 5%;">是否付款</th>
        <th style="width: 10%;">生成时间</th>
        <th style="width: 7%;">操作</th>
    </tr>
    </thead>
    <tbody style="font-size: 6px;">
    <?php

    if (!empty($data)) {
        foreach ($data as $value) {
            ?>
            <tr>
                <td><?php echo $value['OrderId']; ?></td>
                <td><?php echo $value['Goods']; ?></td>
                <td><?php echo $value['UserName']; ?></td>
                <td><?php echo $value['ReceiveName']; ?></td>
                <td><?php echo $value['Phone']; ?></td>
                <td><?php echo $value['Address']; ?></td>
                <td><?php echo $value['Words']; ?></td>
                <td><?php echo $value['OrderPrice']; ?></td>
                <td><?php echo $value['IsPaid']; ?></td>
                <td><?php echo $value['OrderTime']; ?></td>
                <td><a class="btn btn-info btn-xs" href="orderChange.php?id=<?php echo $value['OrderId'] ?>">修改</a>
                    <a class="btn btn-danger btn-xs" href="orderDel.php?id=<?php echo $value['OrderId'] ?>">删除</a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>
</table>
</div>
</body>
</html>