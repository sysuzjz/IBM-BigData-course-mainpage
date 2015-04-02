<?php
    include_once("../presenter/public.action.php");
    $overview = getOverview();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>首页</title>
    </head>
    <body>
        <?php if(isTeacher()) { ?>
            <a href="./edit_overview.php">编辑概括</a>
        <?php } ?>
        <h1><?=$overview["title"]?></h1>
        <span><?=date("Y-m-d H:i:s",$overview["time"])?></span>
        <div><?=$overview["content"]?></div>
    </body>
</html>