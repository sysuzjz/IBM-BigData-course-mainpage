<?php 
    include_once("./head.php");
    if(isset($_GET["id"])) {
        $inform = getInformById($_GET["id"]);
    }
    if(!isset($_GET["id"]) || empty($inform)) {
        redirectErrorPage("该通知不存在或已被删除", 5);
    }
?>
    <h2><?= $inform["title"] ?></h2>
    <?php if(isTeacher()) { ?>
        <a href="edit_inform.php?id=<?=$inform['id']?>">编辑</a>
    <?php } ?>
    <span><?= date("Y:m:d H:i:s", $inform["time"]) ?></span>
    <div>
        <?= $inform["content"] ?>
    </div>
<?php include_once("./foot.php"); ?>