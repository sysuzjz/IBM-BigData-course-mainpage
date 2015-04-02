<?php
    $errorMsg = isset($_COOKIE["errorMsg"]) ?  $_COOKIE["errorMsg"] : "未知错误";
    $redirectTime = isset($_COOKIE["redirectTime"]) ? $_COOKIE["redirectTime"] : "5";
    $redirectUrl = isset($_COOKIE["redirectUrl"]) ? $_COOKIE["redirectUrl"] : "./";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $errorMsg ?></title>
</head>
<body>
    <h1><?= $errorMsg ?></h1>
    <h2>页面将在<span id="redirectTime"><?= $redirectTime ?></span>秒后跳转回<a href="<?=$redirectUrl?>">首页</a></h2>
</body>
<script type="text/javascript">
    var timeNode = document.getElementById("redirectTime"),
        time = parseInt(timeNode.innerText);
    for(var i = 1; i <= time; i++) {
        (function(i) {
            setTimeout(function() {
                timeNode.innerText = (time - i);
                if(i == time) {
                    window.location.href = "<?= $redirectUrl ?>";
                }
            }, i * 1000);
        })(i)
    }

</script>
</html>