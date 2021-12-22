<?php
include "connectSQL.php";
include "header.php";
$orderid = $_GET['orderId'];
$sql2 = "select * from orders where OrderId='$orderid'";
$result2 = mysqli_query($coon, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$sql = "update orders set IsPaid='1' where OrderId='$orderid'";

?>
当前订单总价格为：<?php echo $row2['OrderPrice']; ?>，
共需支付<?php echo $row2['OrderPrice']; ?>
<br>
<label>请选择支付平台：</label><br>
<img src="images/wx-pay.png" alt="" style="width: 100px;height: 40px;">微信支付<input class="radio2" type="radio"
                                                                                  name="radio2" value="radio单选项1"/><br>
<img src="images/zfb-pay.jpg" alt="" style="width: 100px;height: 40px;">支付宝支付<input class="radio2" type="radio"
                                                                                    name="radio2"
                                                                                    value="radio单选项2"/><br>
<img src="images/yhk-pay.jpg" alt="" style="width: 100px;height: 40px;">银行卡支付<input class="radio2" type="radio"
                                                                                    name="radio2"
                                                                                    value="radio单选项3"/><br>
<a class="btn btn-success" href="orderPayHandle.php?orderid=<?php echo $orderid; ?>&&ispaid=1">确认支付</a>
</div>
</body>
</html>
