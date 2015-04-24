<?php
    include_once("./head.php");
    $content = getContent("assessment");
    $comments = getComments();
?>
    <h2>学生评价</h2>
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
                <input type="hidden" name="type" value="assessment" />
                <script id="container" name="content" type="text/plain"><?=$content['content']?></script>
                <input type="submit" value="提交" />
            </form>
        </div>
    <?php } ?>
    <div id="comments-container">
        <form action="../presenter/student.action.php" method="post" id="comment-form">
            <legend>发表评论</legend>
            <input type="hidden" name="func" value="submitComment" />
            <textarea name="content" required="required"></textarea>
            <input type="submit" value="submit" />
        </form>
        <table class="table-container" data-func="deleteComment">
            <?php foreach ($comments as $comment) { ?>
                <tr>
                    <?php if(isLogin()) { ?>
                        <td width="80"><a href="#" class="delete-btn" data-id="<?=$comment['id']?>">删除</a></td>
                    <?php } ?>
                    <td>
                        <p class="clear-float">
                            <span class="float-left"> <?= $comment["author"] ?> 发表于 <?= date("Y:m:d H:i:s", $comment["time"]) ?></span>
                        </p>
                        <pre><?= $comment["content"] ?></pre>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

<?php include_once("./foot.php"); ?>