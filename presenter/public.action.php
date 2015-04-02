<?php
    include_once("../model/public.php");
    include_once("../model/actionModel.php");
    function isAdmin() {
        return true;
    }

    function isTeacher($id = 0) {
        return true;
    }

    function getOverview() {
        return ActionModel::getOverview();
    }

    function getInformById($id) {
        $inform = ActionModel::getInformById($id);
        return $inform;
    }
    
    function redirectErrorPage($errorMsg, $redirectTime) {
        setcookie("errorMsg", $errorMsg);
        setcookie("redirectTime", $redirectTime);
        header("Location: ../view/error.php");
    }
?>