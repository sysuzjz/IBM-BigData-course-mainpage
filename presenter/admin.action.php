<?php
    include_once("../presenter/public.action.php");
    $postParam = $_POST;
    if(isset($postParam["func"]) && function_exists($postParam["func"])) {
        $funcName = $postParam["func"];
        unset($postParam["func"]);
        $result = call_user_func($funcName, $postParam);

        if(isset($result["isRedirect"]) && !$result["isRedirect"]) {
            unset($result["isRedirect"]);
            echo $result;
        } else {
            $redirectTime = isset($result["redirectTime"]) ? $result["redirectTime"] : 3;
            $redirectUrl = isset($result["redirectUrl"]) ? $result["redirectUrl"] : "./";
            if(isset($result["status"]) && $result["status"]) {
                $redirectMsg = isset($result["redirectMsg"]) ? $result["redirectMsg"] : "操作成功";
            } else {
                $redirectMsg = isset($result["redirectMsg"]) ? $result["redirectMsg"] : "操作失败";
            }
            redirectErrorPage($redirectMsg, $redirectTime, $redirectUrl);
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
        return array("status" => !empty($result), "isRedirect" => true, "redirectTime" => 2);
    }

    function logout() {
        $_SESSION = array();
        return array("status" => true, "isRedirect" => true, "redirectMsg" => "退出成功", "redirectTime" => 2);
    }

    function updateOverview($param) {
        global $defaultSetting;
        $time = time() + $defaultSetting["timeOffset"];
        $result = ActionModel::updateOverview($param["title"], $param["content"], $time);
        return array("status" => $result, "isRedirect" => true, "redirectUrl" => "./edit_overview.php");
    }

    function updateInform($param) {
        global $defaultSetting;
        $time = time() + $defaultSetting["timeOffset"];
        if(!isset($param["id"]) || empty($param["id"])) {
            $result = ActionModel::insertInform($param["title"], $param["content"], $time);
        } else {
            $result = ActionModel::updateInformById($param["id"], $param["title"], $param["content"], $time);
        }
        return array("status" => $result, "isRedirect" => true, "redirectUrl" => "./informs.php");
    }

    function uploadFile() {

    }

?>