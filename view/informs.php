<?php
    include_once("../presenter/public.action.php");
    $informs = getInforms();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>通知</title>
</head>
<body>
    <ul>
        <?php foreach ($informs as $inform) { ?>
            <li><a href="inform.php?id=<?=$inform['id']?>"><?= $inform["title"] ?></a></li>
        <?php } ?>
    </ul>
</body>
</html>