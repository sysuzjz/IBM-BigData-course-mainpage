<?php
    include_once("./head.php");
    if(!isTeacher()) {
        redirectErrorPage("您的权限不够", 5);
    }
    $overview = getOverview();
?>
    <form action="../presenter/admin.action.php" method="post">
        <input type="hidden" name="func" value="updateOverview" />
        标题：<input type="text" name="title" value="<?=$overview['title']?>" />
        <script id="container" name="content" type="text/plain"><?=$overview['content']?></script>
        <input type="submit" value="提交" />
    </form>
<?php include_once("./foot.php"); ?>