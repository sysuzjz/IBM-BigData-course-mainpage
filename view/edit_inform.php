<?php
    include_once("./head.php");
    if(!isTeacher()) {
        redirectErrorPage("您的权限不够", 5);
    }
    $type = (isset($_GET["type"]) && $_GET["type"] == 1) ? 1 : 0;
    if(isset($_GET['id'])) {
        $inform = getInformById($_GET['id']);
        $type = $inform["type"];
    }
?>
    <h2>通知/新闻编辑</h2>
    <form action="../presenter/admin.action.php" method="post">
        <input type="hidden" name="func" value="updateInform" />
        <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>">
        <div>
            <label class="inform">标题：</label>
            <input type="text" name="title" value="<?= isset($_GET['id']) ? $inform['title'] : "" ?>" required="required" />
        </div>
        <div>
            <label class="inform">类型：</label>
            <input type="radio" name="type" value="0" <?= $type == 0 ? 'checked="checked"' : '' ?> /> 通知
            <input type="radio" name="type" value="1" <?= $type == 1 ? 'checked="checked"' : '' ?> /> 新闻
        </div>
        <script id="container" name="content" type="text/plain"><?= isset($_GET['id']) ? $inform['content'] : "" ?></script>
        <input type="submit" value="提交" />
    </form>
<?php include_once("./foot.php"); ?>