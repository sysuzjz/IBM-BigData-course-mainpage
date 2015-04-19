<?php
    include_once("../model/model.php");
    class ActionModel {
        public static function getContent($type) {
            $con = array("type" => $type);
            $result = select("content", "*", $con);
            return !empty($result) ? $result[0] : $result;
        }
        public static function updateContent($type, $content, $time) {
            $data = array("content" => $content, "time" => $time);
            $con = array("type" => $type);
            $result = update("content", $data, $con);
            return $result;
        }

        public static function getInforms() {
            $result = select("inform", "*", "", "time DESC");
            return $result;
        }

        public static function getInformById($id) {
            $con = array("id" => $id);
            $result = select("inform", "*", $con);
            return !empty($result) ? $result[0] : $result;
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

        // public static function uploadFile($name, $path, $editor, $time) {
        //     $data = array("name" => $name, "path" => $path, "editor" => $editor, "time" => $time);
        //     $result = insert("upload", $data);
        //     return $result;
        // }
        // public static function getUploads() {
        //     $result = select("upload", "*", "", "time DESC");
        //     return $result;
        // }

        public static function deleteById($table, $id) {
            $cond = array("id" => $id);
            $result = delete($table, $cond);
            return $result;
        }

        public static function getComments() {
            $result = select("comment");
            return $result;
        }

        public static function insertComment($author, $content, $time) {
            $data = array("author" => $author, "content" => $content, "time" => $time);
            $result = insert("comment", $data);
            return $result;
        }
    }
?>