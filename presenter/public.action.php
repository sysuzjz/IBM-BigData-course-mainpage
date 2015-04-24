<?php
    include_once("../model/public.php");
    include_once("../model/actionModel.php");
    $postParam = $_POST;
    if(isset($postParam["func"])) {
        if(!function_exists($postParam["func"])) {
            redirectErrorPage("请求错误", 5);
            die();
        }
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
    }

    function safeMsg($msg) {
        return htmlspecialchars($msg);
    }

    function isLogin() {
        return isset($_SESSION["uname"]) && !empty($_SESSION["uname"]);
    }
    function isAdmin() {
        return true;
    }
    function isTeacher($id = 0) {
        return isset($_SESSION["level"]) && $_SESSION["level"] == 1;
    }

    function getContent($type) {
        return ActionModel::getContent($type);
    }

    function getInforms($type) {
        $informs = ActionModel::getInforms($type);
        return $informs;
    }

    function getInformById($id) {
        $inform = ActionModel::getInformById($id);
        return $inform;
    }

    // function getResources() {
    //     $resources = ActionModel::getUploads();
    //     return $resources;
    // }

    function getComments() {
        $comments = ActionModel::getComments();
        return $comments;
    }

    function login($param) {
        $con = array("uname" => $param["uname"], "password" => md5($param["password"]));
        $result = select("teacher", "uname", $con, "", 1);
        if(!empty($result)) {
            $_SESSION["uname"] = $param["uname"];
            $_SESSION["level"] = 1;
            if(isset($param["autoLogin"]) && !empty($param["autoLogin"])) {
                setcookie(session_name(), session_id(), time() + TIMEOFFSET + SESSION_LIFETIME, PATH, DOMAIN);
            }
        }
        return array("status" => !empty($result), "isRedirect" => true, "redirectTime" => 2);
    }

    function getPV() {
        $cond = array();
        return ActionModel::getPageview($cond);
    }

    function updatePV() {
        $time = time() + TIMEOFFSET;
        $year = date("Y", $time);
        $month = date("m", $time);
        ActionModel::updatePageview($year, $month);
    }

    // function getRemoteIP() {
    //     return getenv("HTTP_X_FORWARDED_FOR") ? getenv("HTTP_X_FORWARDED_FOR") : $_SERVER["REMOTE_ADDR"];
    // }

    function redirectErrorPage($errorMsg, $redirectTime, $redirectUrl = "./") {
        setcookie("errorMsg", $errorMsg, time() + 60, "/");
        setcookie("redirectTime", $redirectTime, time() + 60, "/");
        setcookie("redirectUrl", $redirectUrl, time() + 60, "/");
        header("Location: ../view/error.php");
    }
?>