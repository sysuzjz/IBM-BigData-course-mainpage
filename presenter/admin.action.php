<?php
    include_once("../presenter/public.action.php");
    $postParam = $_POST;
    if(isset($postParam["func"]) && function_exists($postParam["func"])) {
        $funcName = $postParam["func"];
        unset($postParam["func"]);
        $result = call_user_func($funcName, $postParam);
        if(!$result) {
            redirectErrorPage("操作失败", 5);
        } else {
            
        }
    }
    function updateInform($param) {
        $time = time() + $defaultSetting["timeOffset"];
        if(isset($param["id"]) && !empty($param["id"])) {
            return ActionModel::insertInform($param["title"], $param["content"], $time);
        } else {
            return ActionModel::updateInformById($param["id"], $param["title"], $param["content"], $time);
        }
    }
    function updateOverview($param) {
        $time = time() + $defaultSetting["timeOffset"];
        return ActionModel::updateOverview($param["title"], $param["content"], $time);
    }

?>