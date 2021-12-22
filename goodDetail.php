<?php
include "connectSQL.php";
include "header.php";
$id = $_GET['id'];
$sql = "select * from goods where GoodId='$id'";
if ($result = mysqli_query($coon, $sql)) {
    $row = mysqli_fetch_assoc($result);
    $data[] = $row;
} else {
    $data = array();
}

$sql3 = "select * from comments where GoodId='$id'";
if ($result3 = mysqli_query($coon, $sql3)) {
    while ($row3 = mysqli_fetch_assoc($result3))
        $data3[] = $row3;
} else
    $data3 = array();
?>


<div class="row">
    <?php
    if (!empty($data)) {
        foreach ($data as $value) {
            ?>
            <div class="col-md-8 col-xs-8">
                <div><?php $imagepath = "./" . $value['GoodImage'];
                    echo "<a href='#'><img class='img-thumbnail img-responsive' src='$imagepath'></a>"; ?></div>
                <br><br>
                <h3>商品评论</h3><br>
                <?php
                if (!empty($data3)) {
                    foreach ($data3 as $value3) {
                        ?>
                        <table class="table table-bordered table-hover">
                            <thread>
                            <tr class="info">
                                <th style="font-weight: bold;"><span>评论时间：<?php echo $value3['Time']; ?></span></th>
                                <th style="font-weight: bold;">用户名：<span><?php echo $value3['UserName']; ?></span></th>
                            </tr>
                            </thread>
                            <tbody>
                            <tr>
                                <td colspan="2"><span><?php echo $value3['Content']; ?></span></td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <?php
                    }
                } ?>
                <form action="commentAddHandle.php" method="post">
                    <h4>写下你的评论</h4>
                    <textarea class="form-control" rows="9" name="comment"></textarea><br>
                    <input type="hidden" name="goodid" value="<?php echo $id; ?>">
                    <input class="btn btn-info" type="submit" value="提交评论">
                </form>
            </div>
            <div class="col-md-4 col-xs-4 jumbotron">
                <h1 style="font-weight: bold;"><?php echo $value['GoodName']; ?></h1>
                <hr>
                <span style="color: #828282;"><?php echo $value['GoodSummary']; ?></span><br><br>
                <p class="text-left"><h4><span>普通会员：￥<?php echo $value['GoodPrice1']; ?></span></h4></p>
                <p class="text-left"><h4><span style="color: #ff4400;">超级会员：<strong>￥<?php echo $value['GoodPrice2']; ?></strong></span></h4></p>
                <br>
                <p>
                    <a class="btn btn-danger btn-block" href="cartAddHandle.php?id=<?php echo $value['GoodId'] ?>">
                        <span style="color: white;">加入购物车</span>
                    </a>
                </p>
                </div>
            <?php
        }
    }
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