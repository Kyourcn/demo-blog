<?php
include './php/main.php';
$this_title = "编辑文章";

            @$wid = $_GET["id"];
            @$uvip = $_SESSION["uvip"];
            $vv1 = "";
            $vv2 = @$_SESSION["user_uid"];
            $vv3 = "";
            $vv4 = "";
            $vv5 = "";
            $vv6 = "/images/excerpt.jpg";
            $isss = "";


            if ($wid != "") {//判断是否为修改：查询原来的内容
                //检查作者
                @$uid = $_SESSION["user_uid"];
                @$uvip = $_SESSION["uvip"];
                $sql = "SELECT * FROM word WHERE Id = :wid";
                $pdo_stmt = $pdo->prepare($sql);
                $pdo_stmt->bindParam(':wid', $wid);
                $pdo_stmt->execute();
                $row = $pdo_stmt->fetch();
                echo $uid . "." . $row["fbr"] . "." . $uid == $row["fbr"] . "<br>";
                if ($uid == $row["fbr"] or $uvip > 100) {//本人
                } else {
                    $_SESSION["test_echo"]="<br><br>不是作者或管理员";
                    header("Location:./b.php?e=1");
                    exit;
                }
                if (!isset($uid))
                    exit("未登录，无权发帖");
                $isss = 1;
                $sql = "SELECT * FROM word WHERE Id = :wid";

                $pdo_stmt = $pdo->prepare($sql);
                $pdo_stmt->bindParam(':wid', $wid);
                $pdo_stmt->execute();
                $row = $pdo_stmt->fetch();
                $vv1 = $row['title'];
                $vv2 = $row['fbr'];
                $vv3 = $row['gjz'];
                $vv4 = $row['jie'];
                $vv5 = $row['value'];
                $vv6 = $row['imglogo'];
            }





$this_res = '<script src="./js/ckeditor/ckeditor.js"></script> ';
include './php/temp/head.php';
?>
    <body class="user-select">
        <?php include './php/temp/header.php'; ?>
        <section class="container">


            <div class="bs-docs-header" id="content" tabindex="-1" style="margin-top:50px">
                <div class="container">
                    <h1>文章投稿！</h1>
                    <p>投稿内容不会直接公开，将会由管理员审核和修改！</p>

                </div>
            </div>
            <div class="container bs-docs-container" style="margin-top:50px">
                <div class="row">
                    <div class="col-md-9" role="main">
                        <form name="neww" method ="post"  action="./php/newword.php">
                            <div class="input-group">
                                <span class="input-group-addon">文章标题:</span> 
                                <input id="weibo" name="title" class="form-control validate[custom[url]]" placeholder="文章中心，不超过30字" type="text" value="<?php echo $vv1; ?>" />
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">作者ID:</span> 
                                <input id="weibo" name="fbr" class="form-control validate[custom[url]]" readonly="readonly" placeholder="发布人凭证" type="text" value="<?php echo $vv2; ?>" />
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">关键字:</span> 
                                <input id="weibo" name="gjz" class="form-control validate[custom[url]]" placeholder="多个关键字以/分开" type="text" value="<?php echo $vv3; ?>" />
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Logo地址:</span> 
                                <input id="weibo" name="imglogo" class="form-control validate[custom[url]]" placeholder="图片URL地址" type="text" value="<?php echo $vv6; ?>" />
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">简介:</span> 
                                <textarea id="weibo" name="jjo" class="form-control validate[custom[url]]" style="height:100px;" placeholder="文章简介文本"   ><?php echo $vv4; ?></textarea>
                            </div><br>

                            <?php if ($isss == 1) { ?>

                                <input id="Id" name="Id" style="display:none;" class="form-control validate[custom[url]]" placeholder="勿动" type="text" value="<?php echo $row['Id']; ?>" />

                            <?php } ?>
                            文章内容
                            <textarea  cols="90" rows="10" id="conn1" name="value"><?php echo $vv5; ?></textarea><br>
                            图片居中：<</>img class="img-responsive"<br>
                            <button type="susmit" class="btn btn-primary">提交</button>
                        </form>
                    </div>
                </div>


<h1 class="article-title">附件上传工具</h1>
<link href="./css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>
<script src="./js/fileinput.min.js" type="text/javascript"></script>
<form method="post" action="-uploadfile.html" enctype="multipart/form-data">
    <input name="file" type="file" class="file" data-show-preview="false"/>
    <button type="submit" class="btn btn-primary">上传</button>
    <button type="reset" class="btn btn-default">清除</button>
</form>
<br><br>






            </div>
            <script type="text/javascript">
                CKEDITOR.replace("conn1");
            </script>

            <script src="./js/jquery.inputbox.js" type="text/javascript"></script>
            <script src="./js/jquery.ganged.js" type="text/javascript"></script>

        </section>


        <?php
        include './php/temp/footer.php';
        include './php/temp/modal.php'; ?>

        <script src="js/bootstrap.min.js"></script> 
    </body>
</html>