<?php
    include_once("./head.php");
    $resources = getResources();
?>  
    <div class="container">
        <ul>
            <?php foreach ($resources as $resource) { ?>
                <li><a href="<?=$resource['path']?>"><?= $resource["name"] ?></a></li>
            <?php } ?>
        </ul>
    </div>

<?php include_once("./foot.php"); ?>