<?php
    include_once("./head.php");
    $resources = getResources();
?> 
    <table id="table-container" data-func="deleteResource">
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
            <?php foreach ($resources as $resource) { ?>
                <tr>
                    <?php if(isTeacher()) { ?>
                        <td>
                            <a href="#" class="delete-btn" data-id="<?=$resource['id']?>">删除</a>
                        </td>
                    <?php } ?>
                    <td><a href="<?=$resource['path']?>"><?= $resource["name"] ?></a></td>
                    <td><?= date("Y-m-d H:i:s",$resource["time"]); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php include_once("./foot.php"); ?>