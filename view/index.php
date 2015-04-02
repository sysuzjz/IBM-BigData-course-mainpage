<?php
    include_once("./head.php");
    $overview = getOverview();
?>

    <?php if(isTeacher()) { ?>
        <a href="./edit_overview.php">编辑概括</a>
    <?php } ?>
    <h1><?=$overview["title"]?></h1>
    <span><?=date("Y-m-d H:i:s",$overview["time"])?></span>
    <div><?=$overview["content"]?></div>

<?php include_once("./foot.php"); ?>