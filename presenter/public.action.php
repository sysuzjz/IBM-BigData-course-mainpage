<?php
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
?>