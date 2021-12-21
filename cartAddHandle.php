<?php
header("content-type:text/html;charset=utf-8");
session_start();
include "connectSQL.php";
if ($_SESSION['user'] == '')
    echo "<script>alert('请您先登录！');window.location.href='login.php';</script>";
$id = $_GET['id'];
$cartlist = array();
if (!empty($_SESSION['cartlist'])) {
    for ($i = 0; $i < sizeof($_SESSION['cartlist']); $i++) {
        $cartlist[$i] = $_SESSION['cartlist'][$i];
    }
}

class good
{
    public $goodid;
    public $goodnum;

    function settype()
    {
        settype($this->goodid, 'int');
        settype($this->goodnum, 'int');
    }
}

function addGood(&$s1, $s2, &$s3)
{
    for ($i = 0; $i < sizeof($_SESSION['cartlist']); $i++) {
        if ($_SESSION['cartlist'][$i]->goodid == $s2) {
            $_SESSION['cartlist'][$i]->goodnum += 1;
            $s1->goodid = $s2;
            $s1->goodnum = $_SESSION['cartlist'][$i]->goodnum;
            break;
        }
    }
    if ($i == sizeof($_SESSION['cartlist'])) {
        $s1->goodid = $s2;
        $s1->goodnum = 1;
        array_push($s3, $s1);
    }
}

$good = new good();
if ($id != '') {
    addGood($good, $id, $cartlist);
    $_SESSION['cartlist'] = $cartlist;
    echo "<script>alert('购物车添加商品成功！');history.back();</script>";
} else
    $_SESSION['cartlist'] = $cartlist;





