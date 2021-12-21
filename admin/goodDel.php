<?php
header("content-type:text/html;charset=utf-8");
include "connectSQL.php";
$id=$_GET['id'];
$deletesql = "delete from goods where GoodId=$id";
if(mysqli_query($coon,$deletesql)){
    echo "<script>alert('删除商品成功');window.location.href='goodManager.php';</script>";
}else{
    echo "<script>alert('删除商品失败');window.location.href='goodManager.php';</script>";
}