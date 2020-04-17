<?php
include './php/main.php';
$sql = "SELECT * FROM word WHERE Id = :wid";
@$wid = $_GET["id"];
$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->bindParam(':wid', $wid);
$pdo_stmt->execute();
if ($pdo_stmt->rowCount() < 1) {
    header("location:http://".$this_host."/404.html");
}
$row = $pdo_stmt->fetch();
$this_title = $row["title"];
$this_dsi = $row["jie"];
$lll = $row['lll'] + 1;
$sql = "update word set lll='" . $lll . "' where Id ='" . $row['Id'] . "'";
$pdo->query($sql);
 include './php/temp/head.php';
?>   
        <style>
            /*h2美化*/
            .container h2 {
                margin: 15px 0 15px -20px;
                padding: 0 25px;
                border-left: 5px solid #51aded;
                background-color: #f7f7f7;
                font-size: 18px;
                line-height: 40px;

            }
            /*评论楼层标识*/
            .comment-f {
                top: auto;
            }
        </style>
    </head>

    <body class="user-select single">
        <?php
        include './php/temp/header.php';
        //!-- 内容开始 
        include './php/temp/viewword.php';
        ?>



        <!-- 删除文章对话框 -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">删除该文章？</h4>
                    </div>
                    <div class="modal-body">
                        点击“是”将删除该文章，删除后无法恢复该内容！
                    </div>
                    <div class="modal-footer">
                        <button type="button" onClick="delword();" class="btn btn-primary">是</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'php/temp/footer.php'; ?>
        <?php include 'php/temp/modal.php'; ?>


        <script src="js/bootstrap.min.js"></script> 
        <script src="js/jquery.ias.js"></script> 
        <script src="js/scripts.js"></script> 
        <script src="js/jquery.qqFace.js"></script> 
        <script type="text/javascript">
                    $(function () {
                        $('.emotion').qqFace({
                            id: 'facebox',
                            assign: 'comment-textarea',
                            path: '/images/arclist/'	//表情存放的路径
                        });
                    });
                    function delword() {
                        $.post("php/wordgl.php", {m: "del", id: "<?php echo $row['Id']; ?>"},
                                function (data, status) {
                                    if(data == "ok"){
                                        alert("删除成功!");
                                        window.location.href="http://<?php echo $this_host; ?>";
                                    }else{
                                        alert(data);
                                    }
                                });
                    }
        </script>
    </body>
</html>