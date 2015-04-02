<?php 
    include_once("../model/public.php");
    include_once("../presenter/public.action.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>课程网站</title>
</head>
<body>
    <?php if(!isLogin()) { ?>
        <form action="../presenter/admin.action.php" method="post">
            <input type="hidden" name="func" value="login" />
            用户名：<input type="text" name="uname" placeholder="用户名" />
            密码：  <input type="password" name="password" placeholder="密码" />
            <input type="checkbox" name="autoLogin" checked="checked" />自动登录
            <input type="submit" value="提交" />
        </form>
    <?php } else { ?>
        <form action="../presenter/admin.action.php" method="post">
            <input type="hidden" name="func" value="logout" />
            <input type="submit" value="退出登录" />
        </form>
    <?php } ?>