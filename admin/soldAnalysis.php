﻿<?php
include "connectSQL.php";
include "header_admin.php";
session_start();
$sql_sold = "select * from goods order by SoldNumber desc ";
$sql_rest = "select * from goods order by GoodNumber desc ";
$sql_user = "select * from users where ConsumeNum!=0 order by ConsumeNum desc ";
$sql_flower_sold = "select * from flowers order by SoldNumber desc ";
$sql_flower_rest = "select * from flowers order by FlowerNumber desc ";
$sql_flower_profit = "select * from flowers order by SoldProfit desc ";
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
if ($result = mysqli_query($coon, $sql_flower_sold)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data_flower_sold[] = $row;
    }
} else
    $data_flower_sold = array();
if ($result = mysqli_query($coon, $sql_flower_rest)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data_flower_rest[] = $row;
    }
} else
    $data_flower_rest = array();
if ($result = mysqli_query($coon, $sql_flower_profit)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data_flower_profit[] = $row;
    }
} else
    $data_flower_profit = array();
?>

<div class="navbar navbar-default">
    <ul class="nav nav-pills navbar-nav">
        <li><a href="manage.php">首页</a></li>
        <li><a href="userManager.php">用户管理</a></li>
        <li><a href="goodManager.php">商品管理</a></li>
        <li><a href="orderManager.php">订单管理</a></li>
        <li><a href="commentManager.php">评论管理</a></li>
        <li><a href="sizeManager.php">规格配置</a></li>
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
//        foreach ($data as $value){
//            echo $value['GoodName'].','.$value['SoldNumber'].PHP_EOL;
//        }
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
//        foreach ($data as $value){
//            echo $value['GoodName'].','.$value['SoldNumber'].PHP_EOL;
//        }
    }
    ?>
</pre>
<br><br>
<div id="container-flower-sold"></div>
<pre hidden id="csv_flower_sold"><?php
    echo "分类,鲜花名称" . PHP_EOL;
    if (!empty($data_flower_sold)) {
        for ($i = 0; $i < sizeof($data_flower_sold); $i++) {
            if ($i == sizeof($data_flower_sold) - 1)
                echo $data_flower_sold[$i]['FlowerName'] . ',' . $data_flower_sold[$i]['SoldNumber'];
            else
                echo $data_flower_sold[$i]['FlowerName'] . ',' . $data_flower_sold[$i]['SoldNumber'] . PHP_EOL;
        }
    }
    ?>
</pre>
<br><br>
<div id="container-flower-rest"></div>
<pre hidden id="csv_flower_rest"><?php
    echo "分类,鲜花名称" . PHP_EOL;
    if (!empty($data_flower_rest)) {
        for ($i = 0; $i < sizeof($data_flower_rest); $i++) {
            if ($i == sizeof($data_flower_rest) - 1)
                echo $data_flower_rest[$i]['FlowerName'] . ',' . $data_flower_rest[$i]['FlowerNumber'];
            else
                echo $data_flower_rest[$i]['FlowerName'] . ',' . $data_flower_rest[$i]['FlowerNumber'] . PHP_EOL;
        }
    }
    ?>
</pre>
<br><br>
<div id="container-flower-profit"></div>
<pre hidden id="csv_flower_profit"><?php
    echo "分类,鲜花名称" . PHP_EOL;
    if (!empty($data_flower_profit)) {
        for ($i = 0; $i < sizeof($data_flower_profit); $i++) {
            if ($i == sizeof($data_flower_profit) - 1)
                echo $data_flower_profit[$i]['FlowerName'] . ',' . $data_flower_profit[$i]['SoldProfit'];
            else
                echo $data_flower_profit[$i]['FlowerName'] . ',' . $data_flower_profit[$i]['SoldProfit'] . PHP_EOL;
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

    function createchart_flower_sold() {
        var options = {
            chart: {
                type: 'column'
            },
            title: {
                text: '鲜花已销售情况'
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
        var csvData = document.getElementById('csv_flower_sold').innerHTML;
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
        var chart_flower_sold = new Highcharts.Chart('container-flower-sold', options);
    }

    function createchart_flower_rest() {
        var options = {
            chart: {
                type: 'column'
            },
            title: {
                text: '鲜花库存情况'
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
        var csvData = document.getElementById('csv_flower_rest').innerHTML;
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
        var chart_flower_rest = new Highcharts.Chart('container-flower-rest', options);
    }

    function createchart_flower_profit() {
        var options = {
            chart: {
                type: 'column'
            },
            title: {
                text: '鲜花销售利润情况'
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: '利润（/元）'
                }
            },
            series: []
        };
        var csvData = document.getElementById('csv_flower_profit').innerHTML;
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
        var chart_sold = new Highcharts.Chart('container-flower-profit', options);
    }

    createchart_sold();
    createchart_rest();
    createchart_user();
    createchart_flower_sold();
    createchart_flower_rest();
    createchart_flower_profit();
</script>
</body>
</html>