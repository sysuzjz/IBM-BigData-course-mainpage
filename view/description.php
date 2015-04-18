<?php
    include_once("./head.php");
    $content = getContent("description");
?>
    <h2>课程描述</h2>
    <div class="subhead clear-float">
        <?php if(isTeacher()) { ?>
            <a href="#" class="float-left edit-btn">编辑</a>
        <?php } ?>
        <span class="float-right">发表时间：<?=date("Y-m-d H:i:s",$content["time"])?></span>
        
    </div>
    <div id="content-container">
        <p><?=$content["content"]?></p>
    </div>
    <?php if(isTeacher()) { ?>
        <div id="edit-container">
            <form action="../presenter/admin.action.php" method="post">
                <input type="hidden" name="func" value="updateContent" />
                <input type="hidden" name="type" value="description" />
                <script id="container" name="content" type="text/plain"><?=$content['content']?></script>
                <input type="submit" value="提交" />
            </form>
        </div>
    <?php } ?>

<?php include_once("./foot.php"); ?>