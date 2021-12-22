<?php
header("content-type:text/html;charset=utf-8");
include "connectSQL.php";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select * from users";
if ($username == "" || $password == "")
    echo '<script>alert("您输入的信息不完整，请重新输入！");history.back();</script><br>';
else {
    if ($result = mysqli_query($coon, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['UserName'] == $username && $row['UserPassword'] == $password) {
                if ($row['UserPower'] == '1') {
                    echo '<script>alert("欢迎您，管理员登陆成功！");window.location.href="admin/manage.php"; </script><br>';
                    $_SESSION['user'] = $username;
                    $IsRight = 1;
                    break;
                } else {
                    echo '<script>alert("登陆成功！");window.location.href="index.php"; </script><br>';
                    $_SESSION['user'] = $username;
                    $IsRight = 1;
                    break;
                }
            }
        }
        if ($IsRight != 1)
            echo '<script>alert("您输入的用户名或密码有误，请重新输入！");window.location.href="login.php";</script><br>';
    }
}