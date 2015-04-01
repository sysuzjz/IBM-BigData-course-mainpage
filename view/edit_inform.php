<?php
    include_once("../model/public.php");
    include_once("../presenter/public.action.php");
    if(!isTeacher()) {
        redirectErrorPage("您的权限不够", 5);
    }
    if(isset($_GET['id'])) {
        $inform = getInformById($_GET['id']);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>概括编辑</title>
</head>
<body>
    <form action="../presenter/edit_overview.action.php" method="post">
        标题：<input type="text" name="title" value="<?= isset($_GET['id']) ? $inform['title'] : "" ?>" />
        <script id="container" name="content" type="text/plain"><?= isset($_GET['id']) ? $inform['content'] : "" ?></script>
        <input type="submit" value="提交" />
    </form>
</body>
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