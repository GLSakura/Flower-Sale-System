<?php
include "connectSQL.php";
include "header.php";
?>
<h3>什么是VIP？</h3>
<p>VIP是指注册在本网站的尊贵会员，在购物时享有商品的折扣价格优惠。</p>
<h3>如何成为VIP？</h3>
<p>只要在本网站注册并且消费金额达到10000万及以上，用户自动升级为VIP，享有独有优惠价格。</p>
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