<?php
    include_once("./head.php");
    $informs = getInforms();
?>
    <ul>
        <?php foreach ($informs as $inform) { ?>
            <li><a href="inform.php?id=<?=$inform['id']?>"><?= $inform["title"] ?></a></li>
        <?php } ?>
    </ul>

<?php include_once("./foot.php"); ?>