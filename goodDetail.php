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
            <div class="col-md-8">
                <div><?php $imagepath = "./" . $value['GoodImage'];
                    echo "<a href='#'><img class='img-rounded' style='width: 50%;height: 50%;margin-left: 180px;' src='$imagepath'></a>"; ?></div>
                <br><br>
                <h3>商品评论</h3><br>
                <?php
                if (!empty($data3)) {
                    foreach ($data3 as $value3) {
                        ?>
                        <table class="table">
                            <tr>
                                <td style="font-weight: bold;" colspan="2"><span><?php echo $value3['Time']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 70px;font-weight: bold;">
                                    <span><?php echo $value3['UserName']; ?></span></td>
                                <td><span><?php echo $value3['Content']; ?></span></td>
                            </tr>
                        </table>
                        <br>
                        <?php
                    }
                } ?>
                <form action="commentAddHandle.php" method="post">
                    <h4>写下你的评论</h4>
                    <textarea style="resize: none;" name="comment" cols="90" rows="6"
                              placeholder="在这里写下你的评论。。。"></textarea>
                    <input type="hidden" name="goodid" value="<?php echo $id; ?>">
                    <input class="btn btn-info" type="submit" value="提交评论">
                </form>
            </div>
            <div class="col-md-4">
                <span style="font-size: 25px;font-weight: bold;line-height: 35px;font-style: italic;font-family: Georgia, serif;">THE FLOWER</span><br><br>
                <span><?php echo $value['GoodName']; ?></span><br>
                <span style="color: #828282;"><?php echo $value['GoodSummary']; ?></span><br>
                <span>普通会员价格：￥<?php echo $value['GoodPrice1']; ?></span><br>
                <span style="color: red;">超级会员价格：<strong>￥<?php echo $value['GoodPrice2']; ?></strong></span><br>
                <a class="btn btn-danger" style="color: #F22D00;width: 100%;"
                   href="cartAddHandle.php?id=<?php echo $value['GoodId'] ?>"><span
                            style="color: white;">加入购物车</span></a><br><br>
                <br>
                <?php
                if (!empty($data1)) {
                    foreach ($data1 as $value1) {
                        ?>
                        <div style="color: #828282;">
                            <h3 style="font-size: 15px;font-weight: lighter;font-family: Times, serif, simhei;border-bottom: 1px solid black;">
                                品牌故事<br><span>Composition</span></h3>
                            <span><?php echo $value1['BrandStory']; ?></span><br>
                        </div><br>
                        <div style="color: #828282;">
                            <h3 style="font-size: 15px;font-weight: lighter;font-family: Times, serif, simhei;border-bottom: 1px solid black;">
                                保养说明<br><span>CareDescription</span></h3>
                            <span><?php echo $value1['CareDescription']; ?></span><br>
                        </div><br>
                        <div style="color: #828282;">
                            <h3 style="font-size: 15px;font-weight: lighter;font-family: Times, serif, simhei;border-bottom: 1px solid black;">
                                运输说明<br><span>TransDescription</span></h3>
                            <span><?php echo $value1['TransDescription']; ?></span><br>
                        </div><br>
                        <div style="color: #828282;">
                            <h3 style="font-size: 15px;font-weight: lighter;font-family: Times, serif, simhei;border-bottom: 1px solid black;">
                                退换货说明<br><span>ChangeDescription</span></h3>
                            <span><?php echo $value1['ChangeDescription']; ?></span><br>
                        </div><br>
                        <?php
                    }
                }
                ?>
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