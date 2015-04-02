<?php 
    include_once("../presenter/public.action.php");
    if(isset($_GET["id"])) {
        $inform = getInformById($_GET["id"]);
    }
    if(!isset($_GET["id"]) || empty($inform)) {
        redirectErrorPage("该通知不存在或已被删除", 5);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$inform["title"]?></title>
</head>
<body>
    <?php if(isTeacher()) { ?>
        <a href="edit_inform.php?id=<?=$inform['id']?>">编辑</a>
    <?php } ?>
    <h1><?= $inform["title"] ?></h1>
    <span><?= date("Y:m:d H:i:s", $inform["time"]) ?></span>
    <div>
        <?= $inform["content"] ?>
    </div>
</body>
</html>