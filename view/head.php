<?php 
    include_once("../model/public.php");
    include_once("../presenter/public.action.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>大数据分析基础实践</title>
    <link rel="stylesheet" type="text/css" href="<?=$DIR['CSS']?>public.css" />
    <link rel="stylesheet" type="text/css" href="<?=$DIR['CSS']?>head.css" />
    <link rel="stylesheet" type="text/css" href="<?=$DIR['CSS']?>body.css" />
    <link rel="stylesheet" type="text/css" href="<?=$DIR['CSS']?>foot.css" />
    <script type="text/javascript">
        /* 
         * 检测IE版本
         * 若IE版本低于8，则跳转
        */
        var isIE = !!window.ActiveXObject
        var version = navigator.appVersion;
        var version = version.split(";");  
        var trimVersion = version[1].replace(/\s/g,""); 
        if(isIE && (trimVersion=="MSIE6.0" || trimVersion == "MSIE7.0") ) {
            alert("您的IE版本过低，请升级您的IE浏览器至IE8+或使用谷歌、火狐等高级浏览器");
            window.location.href = "http://ie.microsoft.com";
        }
    </script>
</head>
<body>
    <div id="cover"></div>
    <div id="header">
        <div class="container">
            <?php if(!isLogin()) { ?>
                <div class="float-right">
                    <button id="button-login">教师登录</button>
                </div>
            <?php } else { ?>
                <form action="../presenter/admin.action.php" method="post" class="float-right">
                    <input type="hidden" name="func" value="logout" />
                    <input type="submit" value="退出登录" id="button-logout" />
                </form>
            <?php } ?>
            <h2 id="sub-head-title">教育部－IBM产学合作专业综合改革项目建设课程</h2>
            <h1 id="head-title">大数据分析基础实践</h1>
        </div>
    </div>
    <div id="menu-container" class="container">
        <ul id="menu" class="clear-float">
            <li>
                <a href="informs.php">通知</a>
            </li>
            <li>
                <a href="#" data-type="overview">课程概况</a>
            </li>
            <li>
                <a href="#" data-type="download">课堂教案</a>
            </li>
            <li>
                <a href="#" data-type="lab">课程实验</a>
            </li>
            <li>
                <a href="#" data-type="homework">课后作业</a>
            </li>
            <li>
                <a href="#" data-type="test">考核内容</a>
            </li>
            <li>
                <a href="reference.php">参考资料</a>
            </li>
            <li>
                <a href="resource.php">网上资源</a>
            </li>
            <li>
                <a href="assessment.php">学生评价</a>
            </li>
        </ul>
        <ul class="submenu clear-float" id="default-submenu">
            <li>
                <a href="index.php">首页</a>
            </li>
        </ul>
        <ul class="submenu clear-float" data-type="overview">
            <li>
                <a href="description.php">课程描述</a>
            </li>
            <li>
                <a href="teacher.php">教师信息</a>
            </li>
            <li>
                <a href="summary.php">内容简介</a>
            </li>
            <li>
                <a href="plan.php">教学计划</a>
            </li>
            <li>
                <a href="outline.php">实验大纲</a>
            </li>
        </ul>
        <ul class="submenu clear-float" data-type="download">
            <li>
                <a href="ppt_download.php">PPT下载</a>
            </li>
            <li>
                <a href="video_download.php">相关视频</a>
            </li>

        </ul>
        <ul class="submenu clear-float" data-type="lab">
            <li>
                <a href="lab1.php">数据分析基础</a>
            </li>
            <li>
                <a href="lab2.php">数据挖掘</a>
            </li>
            <li>
                <a href="lab3.php">商务智能</a>
            </li>
            <li>
                <a href="lab4.php">大数据分析处理</a>
            </li>
            <!-- <li>
                <a href="lab5.php">大数据系统平台</a>
            </li> -->
        </ul>
        <ul class="submenu clear-float" data-type="homework">
            <li>
                <a href="homework.php">作业习题</a>
            </li>
            <li>
                <a href="answer.php">参考答案</a>
            </li>
        </ul>
        <ul class="submenu clear-float" data-type="test">
            <li>
                <a href="test_outline.php">考试大纲</a>
            </li>
            <li>
                <a href="simulating1.php">模拟卷1</a>
            </li>
            <li>
                <a href="simulating2.php">模拟卷2</a>
            </li>
        </ul>
    </div>
    <div id="bodybox">
        <div id="login">
            <form action="../presenter/public.action.php" method="post">
                <input type="hidden" name="func" value="login" />
                <div>
                    <label class="inform">用户名：</label>
                    <input type="text" name="uname" placeholder="用户名" required="required" />
                </div>
                <div>
                    <label class="inform">密码：</label>
                    <input type="password" name="password" placeholder="密码" required="required" />
                </div>
                <!-- <div id="autoLogin">
                    <input type="checkbox" name="autoLogin" checked="checked" />自动登录
                </div> -->
                <div class="submit">
                    <input type="submit" value="提交" id="button-submit" />
                    <input type="button" value="取消" id="button-cancel" />
                </div>
            </form>
        </div>

        <div class="container">
    
