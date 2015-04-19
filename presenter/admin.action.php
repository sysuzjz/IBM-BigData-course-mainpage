<?php
    include_once("../presenter/public.action.php");

    function logout() {
        $_SESSION = array();
        return array("status" => true, "isRedirect" => true, "redirectMsg" => "退出成功", "redirectTime" => 2);
    }

    function updateContent($param) {
        $time = time() + TIMEOFFSET;
        $result = ActionModel::updateContent($param["type"], $param["content"], $time);
        return array("status" => $result, "isRedirect" => true, "redirectUrl" => "../view/index.php");
    }

    function updateInform($param) {
        $time = time() + TIMEOFFSET;
        if(!isset($param["id"]) || empty($param["id"])) {
            $result = ActionModel::insertInform($param["title"], $param["content"], $time);
        } else {
            $result = ActionModel::updateInformById($param["id"], $param["title"], $param["content"], $time);
        }
        return array("status" => $result, "isRedirect" => true, "redirectUrl" => "../view/informs.php");
    }

    function upload($param) {
        if(!isset($_FILES["file"])) {
            return array("status" => false, "isRedirect" => true, "redirectMsg" => "文件不能为空", "redirectTime" => 2);
        }
        if($_FILES["file"]["error"]) {
            return array("status" => false, "isRedirect" => true, "redirectMsg" => $_FILES["file"]["error"], "redirectTime" => 2);   
        }
        // $allowType = array();
        $uploadDir = $GLOBALS["DIR"]['UPLOAD'];
        $newName = iconv("utf-8", "gb2312", $_FILES["file"]["name"]);
        $result = move_uploaded_file($_FILES["file"]["tmp_name"], $uploadDir.$newName);
        if($result) {
            $time = time() + TIMEOFFSET;
            $result = ActionModel::uploadFile($_FILES["file"]["name"], $uploadDir.$_FILES["file"]["name"], $_SESSION["uname"], $time);
        }
        return array("status" => $result, "isRedirect" => true, "redirectUrl" => "../view/resources.php", "redirectTime" => 3);
    }

    function deleteInform($param) {
        $id = $param["id"];
        $result = ActionModel::deleteById("inform", $id);
        return array("status" => $result, "isRedirect" => true, "redirectUrl" => "../view/informs.php","redirectTime" => 3);
    }

    function deleteComment($param) {
        $id = $param["id"];
        $result = ActionModel::deleteById("comment", $id);
        return array("status" => $result, "isRedirect" => true, "redirectUrl" => "../view/assessment.php","redirectTime" => 3);
    }

    // function deleteResource($param) {
    //     $id = $param["id"];
    //     $result = ActionModel::deleteById("upload", $id);
    //     return array("status" => $result, "isRedirect" => true, "redirectUrl" => "../view/resources.php","redirectTime" => 3);
    // }

?>