<?php
include "connectSQL.php";
include "header_admin.php";
session_start();
$sql_sold = "select * from goods order by SoldNumber desc ";
$sql_rest = "select * from goods order by GoodNumber desc ";
$sql_user = "select * from users where ConsumeNum!=0 order by ConsumeNum desc ";
if ($result = mysqli_query($coon, $sql_sold)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data_sold[] = $row;
    }
} else
    $data_sold = array();
if ($result = mysqli_query($coon, $sql_rest)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data_rest[] = $row;
    }
} else
    $data_rest = array();
if ($result = mysqli_query($coon, $sql_user)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data_user[] = $row;
    }
} else
    $data_user = array();
?>

<div class="navbar navbar-default">
    <ul class="nav nav-pills navbar-nav">
        <li><a href="manage.php">首页</a></li>
        <li><a href="userManager.php">用户管理</a></li>
        <li><a href="goodManager.php">商品管理</a></li>
        <li><a href="orderManager.php">订单管理</a></li>
        <li><a href="commentManager.php">评论管理</a></li>
        <li class="active"><a href="soldAnalysis.php">销售分析</a></li>
    </ul>
</div>
</div>

<div id="container-sold"></div>
<pre hidden id="csv_sold"><?php
    echo "分类,商品名称" . PHP_EOL;
    if (!empty($data_sold)) {
        for ($i = 0; $i < sizeof($data_sold); $i++) {
            if ($i == sizeof($data_sold) - 1)
                echo $data_sold[$i]['GoodName'] . ',' . $data_sold[$i]['SoldNumber'];
            else
                echo $data_sold[$i]['GoodName'] . ',' . $data_sold[$i]['SoldNumber'] . PHP_EOL;
        }
    }
    ?>
</pre>
<br><br>
<div id="container-rest"></div>
<pre hidden id="csv_rest"><?php
    echo "分类,商品名称" . PHP_EOL;
    if (!empty($data_rest)) {
        for ($i = 0; $i < sizeof($data_rest); $i++) {
            if ($i == sizeof($data_rest) - 1)
                echo $data_rest[$i]['GoodName'] . ',' . $data_rest[$i]['GoodNumber'];
            else
                echo $data_rest[$i]['GoodName'] . ',' . $data_rest[$i]['GoodNumber'] . PHP_EOL;
        }
    }
    ?>
</pre>
<br><br>
<div id="container-user"></div>
<pre hidden id="csv_user"><?php
    echo "分类,用户名" . PHP_EOL;
    if (!empty($data_user)) {
        for ($i = 0; $i < sizeof($data_user); $i++) {
            if ($i == sizeof($data_user) - 1)
                echo $data_user[$i]['UserName'] . ',' . $data_user[$i]['ConsumeNum'];
            else
                echo $data_user[$i]['UserName'] . ',' . $data_user[$i]['ConsumeNum'] . PHP_EOL;
        }
    }
    ?>
</pre>
<script>
    function createchart_sold() {
        var options = {
            chart: {
                type: 'column'
            },
            title: {
                text: '商品已销售情况'
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: '销售量（/件）'
                }
            },
            series: []
        };
        var csvData = document.getElementById('csv_sold').innerHTML;
        var lines = csvData.split('\n');
        // 遍历每一行
        Highcharts.each(lines, function (line, lineNo) {
            var items = line.split(',');
            // 处理第一行，即分类
            if (lineNo === 0) {
                Highcharts.each(items, function (item, itemNo) {
                    if (itemNo > 0) {
                        options.xAxis.categories.push(item);
                    }
                });
            }
            // 处理其他的每一行
            else {
                var series = {
                    data: []
                };
                Highcharts.each(items, function (item, itemNo) {
                    if (itemNo === 0) {
                        series.name = item;   // 数据列的名字
                    } else {
                        series.data.push(parseFloat(item)); // 数据，记得转换成数值类型
                    }
                });
                // 最后将数据 push 到数据列配置里
                options.series.push(series);
            }
        });
        // 创建图表
        var chart_sold = new Highcharts.Chart('container-sold', options);
    }

    function createchart_rest() {
        var options = {
            chart: {
                type: 'column'
            },
            title: {
                text: '商品剩余库存情况'
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: '库存量（/件）'
                }
            },
            series: []
        };
        var csvData = document.getElementById('csv_rest').innerHTML;
        var lines = csvData.split('\n');
        // 遍历每一行
        Highcharts.each(lines, function (line, lineNo) {
            var items = line.split(',');
            // 处理第一行，即分类
            if (lineNo === 0) {
                Highcharts.each(items, function (item, itemNo) {
                    if (itemNo > 0) {
                        options.xAxis.categories.push(item);
                    }
                });
            }
            // 处理其他的每一行
            else {
                var series = {
                    data: []
                };
                Highcharts.each(items, function (item, itemNo) {
                    if (itemNo === 0) {
                        series.name = item;   // 数据列的名字
                    } else {
                        series.data.push(parseFloat(item)); // 数据，记得转换成数值类型
                    }
                });
                // 最后将数据 push 到数据列配置里
                options.series.push(series);
            }
        });
        // 创建图表
        var chart_sold = new Highcharts.Chart('container-rest', options);
    }

    function createchart_user() {
        var options = {
            chart: {
                type: 'column'
            },
            title: {
                text: '消费用户排名前20'
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: '消费金额（/元）'
                }
            },
            series: []
        };
        var csvData = document.getElementById('csv_user').innerHTML;
        var lines = csvData.split('\n');
        // 遍历每一行
        Highcharts.each(lines, function (line, lineNo) {
            var items = line.split(',');
            // 处理第一行，即分类
            if (lineNo === 0) {
                Highcharts.each(items, function (item, itemNo) {
                    if (itemNo > 0) {
                        options.xAxis.categories.push(item);
                    }
                });
            }
            // 处理其他的每一行
            else {
                var series = {
                    data: []
                };
                Highcharts.each(items, function (item, itemNo) {
                    if (itemNo === 0) {
                        series.name = item;   // 数据列的名字
                    } else {
                        series.data.push(parseFloat(item)); // 数据，记得转换成数值类型
                    }
                });
                // 最后将数据 push 到数据列配置里
                options.series.push(series);
            }
        });
        // 创建图表
        var chart_sold = new Highcharts.Chart('container-user', options);
    }


    createchart_sold();
    createchart_rest();
    createchart_user();

</script>
</body>
</html>