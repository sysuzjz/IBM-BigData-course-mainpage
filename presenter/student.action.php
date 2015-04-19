<?php 
    include_once("../presenter/public.action.php");
    function submitComment($param) {
        var_dump($param);
        $author = isLogin() ? $_SESSION["uname"] : "匿名";
        $time = time() + TIMEOFFSET;
        $content = isset($param["content"]) ? safeMsg($param["content"]) : "内容非法";
        $result = ActionModel::insertComment($author, $content, $time);
        return array("status" => $result, "isRedirect" => true, "redirectUrl" => "../view/assessment.php", "redirectTime" => 2);
    }
?>