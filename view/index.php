<?php
    include_once("./head.php");
    $overview = getOverview();
?>
    <h2>课程概括</h2>
    <?php if(isTeacher()) { ?>
        <a href="./edit_overview.php">编辑概括</a>
    <?php } ?>
	    <h1><?=$overview["title"]?></h1>
	    <p class="float-right"><?=date("Y-m-d H:i:s",$overview["time"])?></p>
	    <div><p><?=$overview["content"]?></p></div>

<?php include_once("./foot.php"); ?>