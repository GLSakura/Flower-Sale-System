<?php
header("content-type:text/html;charset=utf-8");
include "connectSQL.php";     //调用数据库连接文件
include "goodImageUpload.php";
$IsRegister=0;//确认用户名是否被注册
//接收前台传递过来的post值
$goodname=$_POST['goodname'];
$goodsummary=$_POST['goodsummary'];
$goodprice1=$_POST['goodprice1'];
$goodprice2=$_POST['goodprice2'];
$goodnumber=$_POST['goodnumber'];
$soldnumber=$_POST['soldnumber'];
$date=date("Y-m-d H:i:s");
$filepath=upload();

if($goodname==""||$goodsummary==''||$goodprice1==""||$goodprice2==""||$goodnumber=="")
    echo "<script>alert('商品信息填写不完整，请重新核实！');history.back();</script>";
else {
    if ($result = mysqli_query($coon, 'SELECT * FROM goods')) {//读取数据
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['GoodName'] == $goodname) {
                $IsRegister = 1;
            }
        }
        if ($IsRegister != 0) {//用户名重复
            echo '<script>alert("商品名称已存在！请重新输入");history.back();</script><br>';
        }
        else{//用户名不存在，可以创建!
            //执行插入语句
            $sqlinsert = "INSERT INTO goods(GoodName,GoodSummary, GoodPrice1, GoodPrice2, GoodNumber,SoldNumber,GoodImage, UpdateTime) VALUES('$goodname','$goodsummary','$goodprice1',
            '$goodprice2','$goodnumber','$soldnumber','$filepath','$date')";
            if($result1 = mysqli_query($coon, $sqlinsert)){
                echo "<script>alert('添加商品成功！');window.location.href='goodManager.php';</script>";
            }
            else
                echo "<script>alert('添加商品失败！请重新输入信息！');history.back();</script>";
        }
    }

}