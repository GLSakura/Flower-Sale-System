<?php
include "connectSQL.php";
include "header.php";
$id = $_GET['userid'];
$sql = "select * from users where UserId=$id";
if ($result = mysqli_query($coon, $sql)) {
    $data = mysqli_fetch_assoc($result);
}
?>
<h3>用户信息修改</h3>
<form method="post" action="userInfoChangeHandle.php?userid=<?php echo $id; ?>" role="form"
      enctype="multipart/form-data" style="width: 300px;margin: 0 auto; margin-top: 60px;">
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
            <option value="男" <?php if ($data['UserSex'] == '男') echo "selected='selected'"; else echo ""; ?>>男
            </option>
            <option value="女" <?php if ($data['UserSex'] == '女') echo "selected='selected'"; else echo ""; ?>>女
            </option>
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
    <button class="btn btn-info" type="submit">提交修改</button>
</form>
</body>
</html>
