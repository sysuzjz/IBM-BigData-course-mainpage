<?php
    $setting = array(
        "session_enable" => true,       // 是否开启session   
        "session_name" => "",           // session name 设置, session_enable为false时此项无效
        "sql_name" => "mysql",          // 使用数据库名，暂时只支持mysql
        "sql_address" => "localhost",   // 数据库地址，值为IP或localhost(127.0.0.1)
        "sql_uname" => "root",          // 数据库用户名
        "sql_password" => "",           // 数据库密码
        "sql_table" => "",              // 数据库表
        "sql_error_log" => true,        // 是否开启数据库错误调试。若选是，则可通过getSqlErr()来获取最新的数据库操作错误
        "show_sql_error" => false       // 是否开启数据库错误输出。注意，若选是，则遇错将中断
    );
?>