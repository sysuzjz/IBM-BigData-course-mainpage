<?php
    require_once("setting.php");
    $defaultSetting = array(
        "session_enable" => true,
        "session_name" => "",
        "sql_name" => "mysql",
        "sql_address" => "localhost",
        "sql_uname" => "root",
        "sql_password" => "",
        "sql_db" => "",
        "sql_error_log" => true,
        "show_sql_error" => false,
        "timeOffset" => 3600 * 8
    );
    setSettings($setting);
    function setSettings($settings) {
        global $defaultSetting;
        foreach ($settings as $key => $value) {
            if(isset($defaultSetting[$key])) {
                $defaultSetting[$key] = $value;
            }
        }
        if($defaultSetting["session_enable"]) {
            session_name($defaultSetting["session_name"]);
            session_start();
        }
        $con = mysql_connect($defaultSetting["sql_address"], $defaultSetting["sql_uname"], $defaultSetting["sql_password"]);
        if(!$con) {
            die("can't connect to the server");
        }
        mysql_select_db($defaultSetting["sql_db"],$con);
    }
    
?>