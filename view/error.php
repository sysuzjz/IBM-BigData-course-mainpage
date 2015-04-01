<?php
    $errorMsg = $_COOKIE["errorMsg"];
    $redirectTime = $_COOKIE["redirectTime"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $errorMsg ?></title>
</head>
<body>
    <h1><?= $errorMsg ?></h1>
    <h2>页面将在<span id="redirectTime"><?= $redirectTime ?></span>秒后跳转回<a href="./">首页</a></h2>
</body>
<script type="text/javascript">
    var timeNode = document.getElementById("redirectTime"),
        time = parseInt(timeNode.innerText);
    for(var i = 1; i <= time; i++) {
        (function(i) {
            setTimeout(function() {
                timeNode.innerText = (time - i);
                if(i == time) {
                    window.location.href = "./";
                }
            }, i * 1000);
        })(i)
    }

</script>
</html>