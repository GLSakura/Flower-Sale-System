<?php
include "connectSQL.php";
include "header_admin.php";
$sql = "select * from users";
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
        <li class="active"><a href="userManager.php">用户管理</a></li>
        <li><a href="goodManager.php">商品管理</a></li>
        <li><a href="orderManager.php">订单管理</a></li>
        <li><a href="commentManager.php">评论管理</a></li>
    </ul>
</div>

<form class="navbar-form navbar-right" method="post" action="userSearch.php">
    <p style="display: inline;">当前共有<?php echo mysqli_num_rows($result); ?>条用户信息&nbsp;&nbsp;&nbsp;</p>
    <a class="btn btn-primary" href="userAdd.php">添加用户</a>
    &nbsp;&nbsp;
    <div class="form-group">
        <input type="text" class="form-control" name="usersearch" placeholder="请输入用户名检索信息"/>
    </div>
    <button type="submit" class="btn btn-default">搜索</button>
</form>

<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th style='width: 30px;'>ID</th>
        <th style='width: 80px;'>用户名</th>
        <th style='width: 80px;'>姓名</th>
        <th style='width: 90px;'>密码</th>
        <th style='width: 45px;'>性别</th>
        <th style='width: 45px;'>年龄</th>
        <th style='width: 140px;'>邮件</th>
        <th style='width: 90px;'>联系电话</th>
        <th style='width: 100px;'>用户地址</th>
        <th style='width: 45px;'>权限</th>
        <th style='width: 45px;'>消费金额</th>
        <th style='width: 30px;'>VIP</th>
        <th style='width: 130px;'>注册时间</th>
        <th style="width: 110px;">操作</th>
    </tr>
    </thead>
    <tbody style="font-size: 6px;">
    <?php

    if (!empty($data)) {
        foreach ($data as $value) {
            ?>
            <tr>
                <td><?php echo $value['UserId']; ?></td>
                <td><?php echo $value['UserName']; ?></td>
                <td><?php echo $value['TrueName']; ?></td>
                <td><?php echo $value['UserPassword']; ?></td>
                <td><?php echo $value['UserSex']; ?></td>
                <td><?php echo $value['UserAge']; ?></td>
                <td><?php echo $value['UserEmail']; ?></td>
                <td><?php echo $value['UserPhone']; ?></td>
                <td><?php echo $value['UserAddress']; ?></td>
                <td><?php echo $value['UserPower']; ?></td>
                <td><?php echo $value['ConsumeNum']; ?></td>
                <td><?php echo $value['IsVIP']; ?></td>
                <td><?php echo $value['RegisterTime']; ?></td>
                <td><a class="btn btn-info btn-xs" href="userChange.php?id=<?php echo $value['UserId'] ?>">修改</a>
                    <a class="btn btn-danger btn-xs" href="userDel.php?id=<?php echo $value['UserId'] ?>">删除</a>
                </td>
            </tr>
            <?php
        }
    }
    ?>


    </tbody>
</table>
</div>
<!--删除确认模态弹出框-->
<div class="modal" id="del-confirm" tabindex="-1" role="dialog" style="overflow: scroll;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title">删除用户信息</h4>
            </div>
            <div class="modal-body">
                <p>确认删除该用户信息么？</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">取消</button>
                <button class="btn btn-primary" type="button" onclick="delUser()">确定</button>
            </div>
        </div>
    </div>
</div>
<!--删除用户信息-->
<script>

</script>
</body>
</html>