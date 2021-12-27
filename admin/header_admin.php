<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理系统</title>
    <link rel="icon" type="text/css" href="../images/logo.png">
    <link rel="stylesheet" href="../styles/index-style.css">
    <link rel="stylesheet" href="../styles/allset.css">
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <script src="../scripts/bootstrap.min.js"></script>
    <script src="../scripts/bootstrap.js"></script>
    <script src="../scripts/jquery-3.3.1.min.js"></script>
</head>
<body style="margin: 0 auto;">

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 style="display: inline;">鲜花销售后台管理系统</h1>
            <?php
            session_start();
            if ($_SESSION['user'] == "")
                echo "<script>alert('请您先登录系统！即将跳转到登录页面。。。');window.location.href='../login.php';</script>";
            else {
                echo "<p class='text-right' style='float: right;display: inline;margin-top: 10px;'>欢迎您，" . $_SESSION['user'] . "！  " . "<a class='btn btn-danger btn-xs'  href='../loginOut.php'>退出登录</a>" . "</p>";
            }
            ?>
        </div>
    </div>
