<?php
    include_once("./head.php");
    $informs = getInforms(0);
    $newses = getInforms(1);
?>
    <div id="inform-container">
        <h2>通知列表</h2>
        <?php if(isTeacher()) { ?>
            <div class="subhead clear-float">
                <a href="edit_inform.php?type=0" class="float-left">新建通知</a>
            </div>
        <?php } ?>
        <table class="table-container" data-func="deleteInform">
            <thead>
                <tr>
                    <?php if(isTeacher()) { ?>
                        <th width="40">管理</th>
                    <?php } ?>
                    <th>标题</th>
                    <th>时间</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informs as $inform) { ?>
                    <tr>
                        <?php if(isTeacher()) { ?>
                            <td class="align-center">
                                <a href="edit_inform.php?id=<?=$inform['id']?>">编辑</a>
                                <a href="#" class="delete-btn" data-id="<?=$inform['id']?>">删除</a>
                            </td>
                        <?php } ?>
                        <td><a href="inform.php?id=<?=$inform['id']?>"><?= $inform["title"] ?></a></td>
                        <td class="align-center"><?= date("Y-m-d H:i:s",$inform["time"]); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div id="news-container">
        <h2>新闻列表</h2>
        <?php if(isTeacher()) { ?>
            <div class="subhead clear-float">
                <a href="edit_inform.php?type=1" class="float-left">新建新闻</a>
            </div>
        <?php } ?>
        <table class="table-container" data-func="deleteInform">
            <thead>
                <tr>
                    <?php if(isTeacher()) { ?>
                        <th width="40">管理</th>
                    <?php } ?>
                    <th>标题</th>
                    <th>时间</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newses as $news) { ?>
                    <tr>
                        <?php if(isTeacher()) { ?>
                            <td class="align-center">
                                <a href="edit_inform.php?id=<?=$news['id']?>">编辑</a>
                                <a href="#" class="delete-btn" data-id="<?=$news['id']?>">删除</a>
                            </td>
                        <?php } ?>
                        <td><a href="inform.php?id=<?=$news['id']?>"><?= $news["title"] ?></a></td>
                        <td class="align-center"><?= date("Y-m-d H:i:s",$news["time"]); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <form action="../presenter/admin.action.php" method="post" id="delete-form">
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="func" value="" />
        <input type="submit" value="submit" />
    </form>

<?php include_once("./foot.php"); ?>