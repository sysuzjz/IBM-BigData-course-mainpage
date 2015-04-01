<?php
    include_once("../model/public.php");
    include_once("../presenter/public.action.php");
    $overview = getOverview();
    var_dump($overview);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>首页</title>
    </head>
    <body>
        <form action="../presenter/test.php" method="post">
            <script id="container" name="content" type="text/plain"></script>
            <input type="submit" value="提交" />
        </form>
    </body>
    <!-- 配置文件 -->
    <script type="text/javascript" src="../lib/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="../lib/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var editor = UE.getEditor('container', {
            "autoHeightEnabled": true
        });
    </script>
</html>