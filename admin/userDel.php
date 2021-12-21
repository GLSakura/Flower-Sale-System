<?php
header("content-type:text/html;charset=utf-8");
include "connectSQL.php";

$id = $_GET['id'];
$deletesql = "delete from users where UserId=$id";
if (mysqli_query($coon, $deletesql)) {
    echo "<script>alert('删除用户成功');window.location.href='userManager.php';</script>";
} else {
    echo "<script>alert('删除用户失败');window.location.href='userManager.php';</script>";
}
