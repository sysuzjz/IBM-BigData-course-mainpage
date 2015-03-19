<?php
    require_once("setting.php");
    $defaultSetting = array(
        "session_enable" => true,
        "session_name" => "",
        "sql_name" => "mysql",
        "sql_address" => "localhost",
        "sql_uname" => "root",
        "sql_password" => "",
        "sql_table" => "",
        "sql_error_log" => true,
        "show_sql_error" => false
    );
    setSettings($setting);
    function setSettings($settings) {
        global $defaultSetting;
        foreach ($settings as $key => $value) {
            if(isset($defaultSetting[$key])) {
                $defaultSetting[$key] = $value;
            }
        }
        var_dump($defaultSetting);
        if($defaultSetting["session_enable"]) {
            session_name($defaultSetting["session_name"]);
            session_start();
        }
        $con = mysql_connect($defaultSetting["sql_address"], $defaultSetting["sql_uname"], $defaultSetting["sql_password"]);
        if(!$con) {
            die("can't connect to the server");
        }
        mysql_select_db($defaultSetting["sql_table"],$con);
    }
    $sqlError = "";
    function getSqlError() {
        return $GLOBALS['sqlError'];
    }
    function setSqlError() {
        $GLOBALS['variable'] = $GLOBALS['defaultSetting']['sql_error_log'] ? mysql_error() : "";
    }

    function showSqlErr($err, $type = "html") {
        switch ($type) {
            case 'html':
                $postfix = "<br />";
                break;
            case 'text':
                $postfix = "\r\n";
                break;
            default:
                $postfix = "<br />";
                break;
        }
        if($err) {
            die($err.$postfix);
        }
    }

	function select($table, $selected = "*", $cond = "", $order = "", $limit = "")  {
        $queryStr = "SELECT $selected FROM $table ";
        if(!empty($cond)) {
            $count = 0;
            $queryStr = $queryStr." WHERE ";
            foreach ($cond as $key => $value) {
                if($count > 0) {
                    $queryStr = $queryStr." AND ";
                }
                $count++;
                $queryStr = $queryStr.$key."="."'".$value."'";
            }
        }
        if(!empty($order)) {
            $queryStr = $queryStr." ORDER BY ".$order;
        }
        if(!empty($limit)) {
            $queryStr = $queryStr." LIMIT ".$limit;
        }
        $queryResult = mysql_query($queryStr);
        $result = array();
        if(!$queryResult) {
            return $result;
        }
        $num = mysql_num_rows($queryResult);
        for($i = 0; $i < $num; $i++) {
            $temp = mysql_fetch_array($queryResult);
            array_push($result, $temp);
        }
        setSqlError();
        return $result;
    }

    function update($table, $data, $cond) {
        $count = 0;
        $queryStr = "UPDATE $table SET ";
        foreach ($data as $key => $value) {
            if($count > 0) {
                $queryStr = $queryStr.", ";
            }
            $count++;
            $queryStr = $queryStr.$key."="."'".$value."'";
        }
        $count = 0;
        $queryStr = $queryStr." WHERE ";
        foreach ($cond as $key => $value) {
            if($count > 0) {
                $queryStr = $queryStr." AND ";
            }
            $count++;
            $queryStr = $queryStr.$key."="."'".$value."'";
        }
        $queryResult = mysql_query($queryStr);
        setSqlError();
        return $queryResult ? 1 : 0;
    }

    function insert($table, $data) {
        $count = 0;
        $queryStr = "INSERT INTO $table (";
        $keyStr = "";
        $valueStr = "";
        foreach ($data as $key => $value) {
            if($count > 0) {
                $keyStr = $keyStr.", ";
                $valueStr = $valueStr.", ";
            }
            $count++;
            $keyStr = $keyStr.$key;
            $valueStr = $valueStr."'".$value."'";
        }
        $queryStr = $queryStr.$keyStr.") value(".$valueStr.")";
        $queryResult = mysql_query($queryStr);
        setSqlError();
        return $queryResult ? 1 : 0;
    }

    function delete($table, $cond) {
        $queryStr = "DELETE FROM $table WHERE ";
        $count = 0;
        foreach ($cond as $key => $value) {
            if($count > 0) {
                $queryStr = $queryStr." AND ";
            }
            $count++;
            $queryStr = $queryStr.$key."="."'".$value."'";
        }
        $queryResult = mysql_query($queryStr);
        setSqlError();
        return $queryResult ? 1 : 0;
    }
?>