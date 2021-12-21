<?php
include "header_admin.php";
?>
<div class="navbar navbar-default">
    <ul class="nav nav-pills navbar-nav">
        <li><a href="manage.php">首页</a></li>
        <li class="active"><a href="userManager.php">用户管理</a></li>
        <li><a href="goodManager.php">商品管理</a></li>
        <li><a href="orderManager.php">订单管理</a></li>
        <li><a href="commentManager.php">评论管理</a></li>
        <li><a href="sizeManager.php">规格配置</a></li>
        <li><a href="soldAnalysis.php">销售分析</a></li>
    </ul>
</div>
<h4>添加用户信息</h4>
<form method="post" action="userAddHandle.php" role="form" enctype="multipart/form-data"
      style="width: 300px;margin: 0 auto; margin-top: 20px;">
    <div class="form-group">
        <label class="control-label" for="username">用户名：</label>
        <input class="form-control" type="text" name="username" size="20">
    </div>
    <div class="form-group">
        <label class="control-label" for="truename">真实姓名：</label>
        <input class="form-control" type="text" name="truename" size="20" placeholder="请输入真实姓名：">
    </div>
    <div class="form-group">
        <label class="control-label" for="password">密码：</label>
        <input class="form-control" type="password" name="password" size="20">
    </div>
    <div class="form-group">
        <label class="control-label" for="password-confirm">确认密码：</label>
        <input class="form-control" type="password" name="password-confirm" size="20" placeholder="请再次输入密码：">
    </div>
    <div class="form-group">
        <label class="control-label" for="usersex">性别：</label>
        <select class="form-control" name="usersex">
            <option value="男">男</option>
            <option value="女">女</option>
            <option value="保密">保密</option>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label" for="userage">年龄：</label>
        <input class="form-control" type="text" name="userage">
    </div>
    <div class="form-group">
        <label class="control-label" for="useremail">邮箱：</label>
        <input class="form-control" type="text" name="useremail">
    </div>
    <div class="form-group">
        <label class="control-label" for="userphone">联系电话：</label>
        <input class="form-control" type="text" name="userphone">
    </div>
    <div class="form-group">
        <label class="control-label" for="useraddress">常用地址：</label>
        <input class="form-control" type="text" name="useraddress">
    </div>
    <div class="form-group">
        <label class="control-label" for="userpower">用户权限：</label>
        <input class="form-control" type="text" name="userpower" placeholder="0表示普通用户，1表示管理员">
    </div>
    <div class="form-group">
        <label class="control-label" for="consumenum">消费金额：</label>
        <input class="form-control" type="text" name="consumenum" placeholder="在此输入用户累计已消费金额">
    </div>
    <div class="form-group">
        <label class="control-label" for="isVIP">是否为VIP：</label>
        <input class="form-control" type="text" name="isVIP" placeholder="0表示非VIP用户，1表示VIP用户">
    </div>
    <div class="form-group">
        <label class="control-label" for="userimage">用户头像：</label>
        <input class="form-control" type="file" name="userimage">
    </div>
    <button class="btn btn-info" type="submit">添加用户</button>
    <button class="btn btn-default" type="reset">重置</button>
</form>
</div>
</body>
</html>