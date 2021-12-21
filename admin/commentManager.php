<?php
include "connectSQL.php";
include "header_admin.php";
$sql = "select * from comments";
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
        <li><a href="orderManager.php">订单管理</a></li>
        <li class="active"><a href="commentManager.php">评论管理</a></li>
        <li><a href="soldAnalysis.php">销售分析</a></li>
    </ul>
</div>
<form class="navbar-form navbar-right" method="post" action="commentSearch.php">
    <p style="display: inline;">当前共有<?php echo mysqli_num_rows($result); ?>条评论信息&nbsp;&nbsp;&nbsp;</p>
    <div class="form-group">
        <input type="text" class="form-control" name="usersearch" placeholder="请输入用户名检索信息"/>
    </div>
    <button type="submit" class="btn btn-default">搜索</button>
</form>
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style='width: 5%;'>评论ID</th>
        <th style='width: 5%;'>评论时间</th>
        <th style='width: 5%;'>商品ID</th>
        <th style="width: 5%;">用户名</th>
        <th style="width: 20%;">评论详情</th>
        <th style="width: 5%;">操作</th>
    </tr>
    </thead>
    <tbody style="font-size: 6px;">
    <?php
    if (!empty($data)) {
        foreach ($data as $value) {
            ?>
            <tr>
                <td><?php echo $value['CommentId']; ?></td>
                <td><?php echo $value['Time']; ?></td>
                <td><?php echo $value['GoodId']; ?></td>
                <td><?php echo $value['UserName']; ?></td>
                <td><?php echo $value['Content']; ?></td>
                <td>
                    <a class="btn btn-danger btn-xs" href="commentDel.php?id=<?php echo $value['CommentId'] ?>">删除</a>
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