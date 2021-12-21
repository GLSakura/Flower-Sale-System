<?php
include "connectSQL.php";
include "header.php";
$user = $_SESSION['user'];
$sql = "select * from orders where UserName='$user'";
if ($result = mysqli_query($coon, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else
    $data = array();
?>
<table class="table table-bordered">
    <thead><p style="font-size: 24px;font-weight: bold;">个人资料</p></thead>
    <tr style="font-size: 16px;">
        <td>
            <p>用户名：&nbsp;&nbsp;<?php echo $row1['UserName']; ?></p>
            <p>真实姓名：&nbsp;&nbsp;<?php echo $row1['TrueName']; ?></p>
            <p>性别：&nbsp;&nbsp;<?php echo $row1['UserSex']; ?></p>
            <p>年龄：&nbsp;&nbsp;<?php echo $row1['UserAge']; ?></p>
            <p>邮箱：&nbsp;&nbsp;<?php echo $row1['UserEmail']; ?></p>
            <p>联系电话：&nbsp;&nbsp;<?php echo $row1['UserPhone']; ?></p>
            <p>常用地址：&nbsp;&nbsp;<?php echo $row1['UserAddress']; ?></p>
            <p>注册时间：&nbsp;&nbsp;<?php echo $row1['RegisterTime']; ?></p>
            <p>已消费金额：&nbsp;&nbsp;<?php echo $row1['ConsumeNum']; ?></p>
            <p>是否为VIP：&nbsp;&nbsp;<?php if ($row1['IsVIP'] == '0') echo "否"; else echo "是"; ?><a
                        style="text-decoration: none;" href="VIPExplain.php">&nbsp;&nbsp;什么是VIP？</a></p>
            <a class="btn btn-info" type="button"
               href="userInfoChange.php?userid=<?php echo $row1['UserId'] ?>">修改个人信息</a>
        </td>
    </tr>
</table>
<table class="table table-bordered">
    <thead><p style="font-size: 24px;font-weight: bold;">订单记录</p></thead>
    <tr style="font-size: 16px;">
        <td>
            <a style="text-decoration: none;" href="orderShow.php">查看我的订单</a>
        </td>
    </tr>
</table>
</div>
</body>
</html>