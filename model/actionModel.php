<?php
    include_once("../model/model.php");
    class ActionModel {
        public static function getOverview() {
            $result = select("overview");
            return $result[0];
        }
        public static function updateOverview($title, $content, $time) {
            $data = array("title" => $title, "content" => $content, "time" => $time);
            $result = update("overview", $data);
            return $result;
        }

        public static function getInformById($id) {
            $con = array("id" => $id);
            $result = select("inform", "*", $con);
            return $result[0];
        }

        public static function updateInformById($id, $title, $content, $time) {
            $data = array("title" => $title, "content" => $content, "time" => $time);
            $con = array("id" => $id);
            $result = update("inform", $data, $con);
            return $result;
        }

        public static function insertInform($title, $content, $time) {
            $data = array("title" => $title, "content" => $content, "time" => $time);
            $result = insert("inform", $data);
            return $result;
        }
    }
?>