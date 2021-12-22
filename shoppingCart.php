<?php
include "connectSQL.php";
include "header.php";
$data = array();
$cartlist = array();
if (!empty($_SESSION['cartlist'])) {
    for ($i = 0; $i < sizeof($_SESSION['cartlist']); $i++) {
        $cartlist[$i] = $_SESSION['cartlist'][$i];
    }
}

class good
{
    public $goodid;
    public $goodnum;

    function settype()
    {
        settype($this->goodid, 'int');
        settype($this->goodnum, 'int');
    }
}

for ($i = 0; $i < sizeof($cartlist); $i++) {
    $str = $cartlist[$i]->goodid;
    $sql = "select * from goods where GoodId='$str'";
    $result = mysqli_query($coon, $sql);
    $row = mysqli_fetch_assoc($result);
    $data[$i] = $row;
}
?>

<form role="form" action="calculate.php" method="post">
    <table id="cartTable" class="table  table-hover">
        <thead>
        <tr>
            <th style='width: 10%;'><label><input class="check-all check" type="checkbox">全选</label></th>
            <th style='width: 20%;'>商品信息</th>
            <th style='width: 20%;'>商品单价</th>
            <th style='width: 20%;'>商品数量</th>
            <th style='width: 10%;'>金额</th>
            <th style="width: 10%;">操作</th>
        </tr>
        </thead>
        <tbody style="font-size: 6px;">
        <?php
        if (!empty($data)) {
            $j = 0;
            $k = 0;
            foreach ($data as $value) {
                ?>
                <tr style="height: 80px;">
                    <td style="line-height: 80px;"><input class="check-one check" type="checkbox" name="select[]"
                                                          value="<?php echo($value['GoodId']); ?>"></td>
                    <td style="line-height: 80px;"><?php $imagepath = "./" . $value['GoodImage'];
                        echo "<img class='img-circle' style='width: 60px;height: 60px;' src='$imagepath'>";
                        echo $value['GoodName']; ?></td>
                    <td class="price" style="line-height: 90px;">
                        <?php
                        if ($row1['IsVIP'] == 0)
                            echo $value['GoodPrice1'];
                        else
                            echo $value['GoodPrice2'];
                        ?></td>
                    <td class="count" style="line-height: 80px;">
                        <input class="count-input" type="text" style="width: 60px;height: 30px;" name="num[]"
                               value="<?php echo $cartlist[$j]->goodnum;
                               $j++; ?>">
                    </td>
                    <td class="subtotal" style="line-height: 80px; color: #ff4400;">
                        <?php
                        $price = ($row1['IsVIP'] == 0) ? $value['GoodPrice1'] : $value['GoodPrice2'];
                        echo $cartlist[$k]->goodnum * $price;
                        $k++; ?></td>
                    <td class="operation" style="line-height: 80px;">
                        <span class="delete">删除</span>
                    </td>
                </tr>
                <?php
            }
        } else
            echo "<tr><td colspan='6'><h3>购物车里空空如也。。。</h3></td></tr>";
        ?>
        </tbody>
    </table>
    <input class="btn" type="submit"
           style="background-color: #F22D00;color: white;float: right;width: 100px;height: 35px;" id="calculate"
           value="结算">
</form>
<div class="foot" id="foot" style="background-color: #E5E5E5;height: 35px;">
    <label class="select-all"><input class="check-all check" type="checkbox">全选&nbsp;&nbsp;</label>
    <span class="delete" id="deleteAll">删除</span>
    <div class="total" style="float: right;margin-right: 20px;line-height: 35px;">合计（不含运费）：￥<span id="priceTotal"
                                                                                                  tyle="color: #ff4400;">0.00</span>
    </div>
    <div class="selected" id="selected" style="float: right;margin-right: 20px;line-height: 35px;">已选商品<span
                id="selectedTotal" style="color: #ff4400;">0</span>件
    </div>
</div>
</div>
</body>
</html>