<?php
include "connectSQL.php";
include "header.php";
$data = array();
$arr = array();
$arr = $_POST['select'];
$arr1 = $_POST['num'];
$address = " ";
$sumprice = 0;

if (empty($arr)) {
    echo "<script>alert('请先选中商品或者添加商品至购物车再进行结算！');history.back();</script>";
} else {
    $sql = "select * from users where UserName='$user'";
    $result = mysqli_query($coon, $sql);
    $row = mysqli_fetch_assoc($result);
    $address = $row['UserAddress'];
    $phone = $row['UserPhone'];
    $name = $row['TrueName'];
}
for ($i = 0; $i < sizeof($arr); $i++) {
    $id = $arr[$i];
    $sql = "select * from goods where GoodId='$id'";
    $result = mysqli_query($coon, $sql);
    $row = mysqli_fetch_assoc($result);
    $data[$i] = $row;
}

?>
<form role="form" class="" method="post" action="orderHandle.php">
    <h4 style="margin: 0;font-weight: bold;">确认收货地址</h4>
    <hr>
    <span>寄送至：</span>
    <input class="form-control" type="text" name="address" style="width: 600px;" value="<?php echo $address; ?>">
    <br>
    <h4 style="margin: 0;font-weight: bold;">确认收件人姓名</h4>
    <hr>
    <span>收件人姓名：</span>
    <input class="form-control" type="text" name="name" style="width: 300px;" value="<?php echo $name; ?>">
    <br>
    <h4 style="margin: 0;font-weight: bold;">确认联系电话</h4>
    <hr>
    <span>联系电话：</span>
    <input class="form-control" type="text" name="phone" style="width: 300px;" value="<?php echo $phone; ?>">
    <br>
    <h4 style="margin: 0;font-weight: bold;">确认订单信息</h4>
    <hr>
    <table id="cartTable" class="table">
        <thead>
        <tr>
            <th style='width: 20%;'>商品信息</th>
            <th style='width: 20%;'>商品单价</th>
            <th style='width: 20%;'>商品数量</th>
            <th style='width: 10%;'>小计</th>
        </tr>
        </thead>
        <tbody style="font-size: 6px;">
        <?php
        if (!empty($data)) {
            $j = 0;
            $k = 0;
            foreach ($data as $value) {
                ?>
                <tr style="height: 80px; font-size: 15px;">
                    <td style="line-height: 80px;"><?php $imagepath = "./" . $value['GoodImage'];
                        echo "<img class='img-circle' style='width: 60px;height: 60px;' src='$imagepath'>";
                        echo $value['GoodName']; ?></td>
                    <td class="price" style="line-height: 80px;">
                        <?php
                        if ($row1['IsVIP'] == 0)
                            echo $value['GoodPrice1'];
                        else
                            echo $value['GoodPrice2'];
                        ?></td>
                    <td class="count" style="line-height: 80px;">
                        <span><?php echo $arr1[$j];
                            $j++; ?></span>
                    </td>
                    <td class="subtotal"
                        style="line-height: 80px; font-weight: bold; color: #ff0036;"><?php echo $arr1[$k] * $value['GoodPrice1'];
                        $sumprice += $arr1[$k] * $value['GoodPrice1'];
                        $k++; ?></td>
                </tr>
                <?php
            }
        }
        ?>
        <?php
        for ($i = 0; $i < sizeof($arr); $i++) {
            echo '<input type="hidden" name="select[]" value="' . $arr[$i] . '">';
            echo '<input type="hidden" name="num[]" value="' . $arr1[$i] . '">';
        }
        ?>
        <tr style="height: 80px; font-size: 12px;background-color: #f2f7ff;border-bottom: 1px solid #ddd;">
            <td colspan="2">
                <div style="line-height: 80px;">
                    <span style="float: left;">给卖家留言：</span>
                    <input class="form-control" name="words" style="float:left;width: 400px;margin-top: 23px;"
                           type="text" placeholder="填写内容已和卖家协商确认">
                </div>
            </td>
            <td style="line-height: 80px;">
                <span>运送方式：&nbsp;&nbsp;普通配送&nbsp;快递&nbsp;免邮</span>
            </td>
            <td style="line-height: 80px;"><span style="font-size: 15px; font-weight: bold; color: #ff0036;">0.00</span>
            </td>
        </tr>
        </tbody>
    </table>
    <input type="hidden" name="sumprice" value="<?php echo $sumprice; ?>">
    <div style="float: right;">
        <span style="float: right; margin-right: 30px;">实付款：￥<span
                    style=" font-size: 26px; color: #ff0036; font-weight: bold; text-decoration: none; border: 0;"><?php echo $sumprice; ?></span></span><br>
        <input class="btn" type="submit" value="提交订单"
               style="background-color: #FF0036; color: white; width: 150px; float: right; margin-right: 30px;">
    </div>
</form>
</div>
</body>
</html>
