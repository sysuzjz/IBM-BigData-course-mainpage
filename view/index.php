<?php
    include_once("./head.php");
    $overview = getOverview();
?>

    <?php if(isTeacher()) { ?>
        <a href="./edit_overview.php">编辑概括</a>
    <?php } ?>
    <div class="container">
	    <h1><?=$overview["title"]?></h1>
	    <p id="time"><?=date("Y-m-d H:i:s",$overview["time"])?></p>
	    <div><p><?=$overview["content"]?></p></div>
    </div>

<?php include_once("./foot.php"); ?>