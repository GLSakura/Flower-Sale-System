<?php
header("content-type:text/html;charset=utf-8");
include "connectSQL.php";
$id = $_GET['id'];
$deletesql = "delete from goodsizes where SizeId=$id";
if (mysqli_query($coon, $deletesql)) {
    echo "<script>alert('删除规格成功');window.location.href='sizeManager.php';</script>";
} else {
    echo "<script>alert('删除规格失败');window.location.href='sizeManager.php';</script>";
}