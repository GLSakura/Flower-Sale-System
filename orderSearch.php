<?php
include "connectSQL.php";
include "header.php";
$ordersearch = $_POST['ordersearch'];
if ($ordersearch != '')
    $sql = "select * from orders where UserName='$user' and OrderId='$ordersearch' order by OrderTime desc";
else
    $sql = "select * from orders where UserName='$user' order by OrderTime desc";
$result = mysqli_query($coon, $sql);
$orderlist = array();
$goodlist = array();
$goodid = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
for ($i = 0; $i < sizeof($data); $i++) {
    $orderlist[$i] = explode("|", $data[$i]['Goods']);
}
?>

<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 30%;">宝贝</th>
        <th style="width: 10%;">单价</th>
        <th style="width: 10%;">数量</th>
        <th style="width: 10%;">小计</th>
        <th style="width: 10%;">总价</th>
        <th style="width: 10%;">是否付款</th>
        <th style="width: 20%;">操作</th>
    </tr>
    </thead>
</table>
<?php
for ($i = 0; $i < sizeof($orderlist); $i++) {
    ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="7" style="background-color: #F1F1F1;">
                <?php echo $data[$i]['OrderTime'] ?>&nbsp;&nbsp;
                <span>订单号：&nbsp;&nbsp;</span>
                <?php echo $data[$i]['OrderId'] ?>
            </th>
        </tr>
        </thead>
        <?php
        for ($j = 0; $j < sizeof($orderlist[$i]); $j++) {
            $goodlist[$j] = explode(",", $orderlist[$i][$j]);
            $str = $goodlist[$j][0];
            $sql1 = "select * from goods where GoodId='$str'";
            $result1 = mysqli_query($coon, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            ?>
            <tr>
                <td style="width: 30%;"><?php $imagepath = "./" . $row1['GoodImage'];
                    $href = "goodDetail.php?id=" . $row1['GoodId'];
                    echo "<a href='$href'><img class='img-circle' style='width: 50px;height: 50px;' src='$imagepath'></a>";
                    echo $row1['GoodName']; ?></td>
                <td style="width: 10%;"><?php if ($row2['IsVIP'] == '0') $price = $row1['GoodPrice1']; else $price = $row1['GoodPrice2'];
                    echo $price; ?></td>
                <td style="width: 10%;"><?php echo $goodlist[$j][1]; ?></td>
                <td style="width: 10%;"><?php echo $goodlist[$j][1] * $price; ?></td>
                <?php
                if ($j == 0) {
                    $str1 = ($data[$i]['IsPaid'] == '0') ? "否" : "是";
                    echo "<td style='width: 10%;' rowspan='0'>" . $data[$i]['OrderPrice'] . "</td>";
                    echo "<td style='width: 10%;' rowspan='0'>" . $str1 . "</td>";
                    if ($str1 == '否') {
                        echo "<td style='width: 20%;' rowspan='0'>
                    <a class='btn btn-info' href='orderPay.php?orderId=" . $data[$i]['OrderId'] . "'>支付</a>&nbsp;&nbsp;&nbsp;
                    <a class='btn btn-danger' href='orderDelHandle.php?orderId=" . $data[$i]['OrderId'] . "'>取消订单</a>
                    </td>";
                    } elseif ($str1 == '是') {
                        echo "<td style='width: 20%;' rowspan='0'>
                    <a disabled='disabled' class='btn btn-info' href='orderPay.php?orderId=" . $data[$i]['OrderId'] . "'>支付</a>&nbsp;&nbsp;&nbsp;
                    <a disabled='disabled' class='btn btn-danger' href='orderDelHandle.php?orderId=" . $data[$i]['OrderId'] . "'>取消订单</a>
                    </td>";
                    }
                }
                ?>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
if (sizeof($orderlist) == 0) {
    ?>
    <h3>没有查询到相关订单信息！</h3>
    <?php
}
?>

</div>
</body>
</html>
