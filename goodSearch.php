<?php
include "connectSQL.php";
session_start();
$order = $_GET['order'];
$goodsearch = $_POST['goodsearch'];
if ($goodsearch == '')
    $goodsearch = $_GET['goodsearch'];
switch ($order) {
    case '':
    case 'default':
        $sql = "select * from goods where GoodName like '%$goodsearch%'";
        break;
    case 'timefromnew':
        $sql = "select * from goods where GoodName like '%$goodsearch%' order by UpdateTime desc ";
        break;
    case 'timefromold':
        $sql = "select * from goods where GoodName like '%$goodsearch%' order by UpdateTime";
        break;
    case 'pricefromhigh':
        $sql = "select * from goods where GoodName like '%$goodsearch%' order by GoodPrice1 desc";
        break;
    case 'pricefromlow':
        $sql = "select * from goods where GoodName like '%$goodsearch%' order by GoodPrice1";
        break;
    case 'soldfromhigh':
        $sql = "select * from goods where GoodName like '%$goodsearch%' order by SoldNumber desc";
        break;
    case 'soldfromlow':
        $sql = "select * from goods where GoodName like '%$goodsearch%' order by SoldNumber";
        break;
}
if ($result = mysqli_query($coon, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
} else
    $data = array();
$num = mysqli_num_rows($result);
$user = $_SESSION['user'];
if ($user != '') {
    $sql1 = "select * from users where UserName='$user'";
    $result1 = mysqli_query($coon, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>法兰沃----懂你的心</title>
    <link rel="icon" type="text/css" href="./images/logo.ico">
    <link rel="stylesheet" href="styles/index-style.css">
    <link rel="stylesheet" href="styles/allset.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome-all.css">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
</head>
<?php include "header.php"; ?>
<div class="panel panel-default">
    <div class="panel-body search-firstline">
        <span style="float: left;line-height: 20px;margin-left: 30px;margin-right: 20px;">排序</span>
        <ul>
            <li style="margin-right: 40px;<?php echo ($order == 'default' || $order == '') ? "font-weight:bolder" : ""; ?>">
                <a href="goodSearch.php?order=default&goodsearch=<?php echo $goodsearch; ?>">默认排序</a></li>
            <li style="margin-right: 40px;<?php echo ($order == 'timefromnew') ? "font-weight:bolder" : ""; ?>"><a
                        href="goodSearch.php?order=timefromnew&goodsearch=<?php echo $goodsearch; ?>">按时间降序排序</a></li>
            <li style="margin-right: 40px;<?php echo ($order == 'timefromold') ? "font-weight:bolder" : ""; ?>"><a
                        href="goodSearch.php?order=timefromold&goodsearch=<?php echo $goodsearch; ?>">按时间升序排序</a></li>
            <li style="margin-right: 40px;<?php echo ($order == 'pricefromhigh') ? "font-weight:bolder" : ""; ?>"><a
                        href="goodSearch.php?order=pricefromhigh&goodsearch=<?php echo $goodsearch; ?>">按价格从高到低</a></li>
            <li style="margin-right: 40px;<?php echo ($order == 'pricefromlow') ? "font-weight:bolder" : ""; ?>"><a
                        href="goodSearch.php?order=pricefromlow&goodsearch=<?php echo $goodsearch; ?>">按价格从低到高</a></li>
            <li style="margin-right: 40px;<?php echo ($order == 'soldfromhigh') ? "font-weight:bolder" : ""; ?>"><a
                        href="goodSearch.php?order=soldfromhigh&goodsearch=<?php echo $goodsearch; ?>">按销量从高到低</a></li>
            <li style="margin-right: 40px;<?php echo ($order == 'soldfromlow') ? "font-weight:bolder" : ""; ?>"><a
                        href="goodSearch.php?order=soldfromlow&goodsearch=<?php echo $goodsearch; ?>">按销量从低到高</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <?php
    if (!empty($data)) {
        foreach ($data as $value) {
            ?>
            <div class="col-md-4">
                <div><?php $imagepath = "./" . $value['GoodImage'];
                    $href = "goodDetail.php?id=" . $value['GoodId'];
                    echo "<a href='$href'><img class='img-rounded' style='width: 100%;height: 500px;' src='$imagepath'></a>"; ?></div>
                <h5>
                    <span>THE FLOWER</span><br>
                    <span style="font-size: 18px;font-family: Arial;">￥<?php echo $value['GoodPrice1']; ?></span><br>
                    <span style="color: #ff4400;font-size: 18px;">VIP：<strong>￥<?php echo $value['GoodPrice2']; ?></strong></span>
                    <span style="float: right;color: #828282;">已有<?php echo $value['SoldNumber']; ?>人购买</span><br>
                    <span><?php echo $value['GoodName']; ?></span><br>
                    <span style="color: #828282;"><?php echo $value['GoodSummary']; ?></span><br>
                    <span>
                                <a class="btn btn-info btn-xs" href="goodDetail.php?id=<?php echo $value['GoodId'] ?>">查看详情</a>
                                <a class="btn btn-danger btn-xs" style="color: #F22D00;"
                                   href="cartAddHandle.php?id=<?php echo $value['GoodId'] ?>"><span
                                            style="color: white;">加入购物车</span></a>
                            </span>
                </h5>
            </div>
            <?php
        }
    } else
        echo "<h3>&nbsp;&nbsp;&nbsp;没有查询到相关商品信息！</h3>";
    ?>
</div>
</div>
<script type="text/javascript">
    $(function () {
        $("li").click(function () {
            $(this).addClass("active").siblings().removeClass("active");
        })
    })
</script>
</body>
</html>