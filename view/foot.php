        
            </div>
        </div>
        <div id="footer">
            <?php 
                updatePV();
                $PV = getPV();
            ?>
            <p class="float-right">网站访问量：<?=$PV?></p>
            <p class="align-center">Copyright &copy; 2015 - 2025 IBM</p>
        </div>
    </body>
    <script type="text/javascript" src="../lib/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="../lib/ueditor/ueditor.all.min.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        if(document.getElementById("container")) {
            var editor = UE.getEditor('container', {
                "autoHeightEnabled": true
            });
        }
    </script>
    <script type="text/javascript"></script>
    <script type="text/javascript" src="<?=$DIR['JS']?>public.js"></script>
    <script type="text/javascript" src="<?=$DIR['JS']?>head.js"></script>
    <script type="text/javascript" src="<?=$DIR['JS']?>body.all.js"></script>
</html>