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
            redirectErrorPage("操作成功", 5);
        }
    } else {
        redirectErrorPage("函数名错误", 5);
    }
    function login($param) {
        $con = array("uname" => $param["uname"], "password" => md5($param["password"]));
        $result = select("teacher", "uname", $con, "", 1);
        if(!empty($result)) {
            $_SESSION["uname"] = $param["uname"];
            $_SESSION["level"] = 1;
        }
        return !empty($result);
    }

    function updateOverview($param) {
        global $defaultSetting;
        $time = time() + $defaultSetting["timeOffset"];
        return ActionModel::updateOverview($param["title"], $param["content"], $time);
    }

    function updateInform($param) {
        global $defaultSetting;
        $time = time() + $defaultSetting["timeOffset"];
        if(!isset($param["id"]) || empty($param["id"])) {
            return ActionModel::insertInform($param["title"], $param["content"], $time);
        } else {
            return ActionModel::updateInformById($param["id"], $param["title"], $param["content"], $time);
        }
    }

?>