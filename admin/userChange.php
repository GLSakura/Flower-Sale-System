<?php
include "connectSQL.php";
include "header_admin.php";
$id = $_GET['id'];
$sql = "select * from users where UserId=$id";
if ($result = mysqli_query($coon, $sql)) {
    $data = mysqli_fetch_assoc($result);
}
?>
<div class="navbar navbar-default">
    <ul class="nav nav-pills navbar-nav">
        <li><a href="manage.php">首页</a></li>
        <li class="active"><a href="userManager.php">用户管理</a></li>
        <li><a href="goodManager.php">商品管理</a></li>
        <li><a href="orderManager.php">订单管理</a></li>
        <li><a href="commentManager.php">评论管理</a></li>
        <li><a href="soldAnalysis.php">销售分析</a></li>
    </ul>
</div>
<h4>修改用户信息</h4>

<form method="post" action="userChangeHandle.php?id=<?php echo $data['UserId']; ?>" enctype="multipart/form-data"
      role="form" style="width: 300px;margin: 0 auto; margin-top: 20px;">
    <div class="form-group">
        <label class="control-label" for="username">用户名：</label>
        <input class="form-control" type="text" name="username" size="20" value="<?php echo $data['UserName']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="truename">真实姓名：</label>
        <input class="form-control" type="text" name="truename" size="20" value="<?php echo $data['TrueName']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="password">密码：</label>
        <input class="form-control" type="password" name="password" size="20"
               value="<?php echo $data['UserPassword']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="password-confirm">确认密码：</label>
        <input class="form-control" type="password" name="password-confirm" size="20" placeholder="请再次输入密码：">
    </div>
    <div class="form-group">
        <label class="control-label" for="usersex">性别：</label>
        <select class="form-control" name="usersex">
            <option value="男" <?php if ($data['UserSex'] == '男') echo "selected='selected'"; else echo ""; ?>>男</option>
            <option value="女" <?php if ($data['UserSex'] == '女') echo "selected='selected'"; else echo ""; ?>>女</option>
            <option value="保密" <?php if ($data['UserSex'] == '保密') echo "selected='selected'"; else echo ""; ?>>保密
            </option>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="userage">年龄：</label>
        <input class="form-control" type="text" name="userage" value="<?php echo $data['UserAge']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="useremail">邮箱：</label>
        <input class="form-control" type="text" name="useremail" value="<?php echo $data['UserEmail']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="userphone">联系电话：</label>
        <input class="form-control" type="text" name="userphone" value="<?php echo $data['UserPhone']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="useraddress">常用地址：</label>
        <input class="form-control" type="text" name="useraddress" value="<?php echo $data['UserAddress']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="userpower">用户权限：</label>
        <input class="form-control" type="text" name="userpower" placeholder="0表示普通用户，1表示管理员">
    </div>
    <div class="form-group">
        <label class="control-label" for="consumenum">消费金额：</label>
        <input class="form-control" type="text" name="consumenum" value="<?php echo $data['ConsumeNum']; ?>">
    </div>
    <div class="form-group">
        <label class="control-label" for="isVIP">是否为VIP：</label>
        <input class="form-control" type="text" name="isVIP" placeholder="0表示非VIP用户，1表示VIP用户">
    </div>
    <button class="btn btn-info" type="submit">提交修改</button>
</form>
</div>
</body>
</html>
