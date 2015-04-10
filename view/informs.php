<?php
    include_once("./head.php");
    $informs = getInforms();
?>
    <table id="table-container" data-func="deleteInform">
        <thead>
            <tr>
                <?php if(isTeacher()) { ?>
                    <th>管理</th>
                <?php } ?>
                <th>标题</th>
                <th>时间</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($informs as $inform) { ?>
                <tr>
                    <?php if(isTeacher()) { ?>
                        <td>
                            <a href="edit_inform.php?id=<?=$inform['id']?>">编辑</a>
                            <a href="#" class="delete-btn" data-id="<?=$inform['id']?>">删除</a>
                        </td>
                    <?php } ?>
                    <td><a href="inform.php?id=<?=$inform['id']?>"><?= $inform["title"] ?></a></td>
                    <td><?= date("Y-m-d H:i:s",$inform["time"]); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php include_once("./foot.php"); ?>