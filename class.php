<?php
include './php/main.php';
include './php/temp/head.php';
?>
    <body class="user-select">
        <?php include './php/temp/header.php'; ?>
        <section class="container">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">分类</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                          <!--li class="active"><a href="#">文章 <span class="sr-only">(current)</span></a></li-->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">文章 <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="class.php?a=wz">全部</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="class.php?a=wz&b=1">知识点</a></li>
                                    <li><a href="class.php?a=wz&b=2">教学</a></li>
                                    <li><a href="class.php?a=wz&b=3">娱乐精选</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">软件 <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="class.php?a=app">全部</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="class.php?a=app&b=1">电脑软件</a></li>
                                    <li><a href="class.php?a=app&b=2">手机软件</a></li>
                                    <li><a href="class.php?a=app&b=3">其他</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">文件 <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="class.php?a=file">全部</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="class.php?a=file&b=1">影音</a></li>
                                    <li><a href="class.php?a=file&b=2">实用</a></li>
                                    <li><a href="class.php?a=file&b=3">其他</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left"  method ="get"  action="class.php">
                            <div class="form-group">
                                <input type="text" name="so" class="form-control" placeholder="Search" />
                            </div>
                            <button type="submit" class="btn btn-default">搜</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">业务类 <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">游戏</a></li>
                                    <li><a href="#">生活</a></li>
                                    <li><a href="#">代购</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">其他</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>



            <div class="thumbnail"><!--文章列表-->

                <div style="height: 30px;"></div>
                <div class="container-fluid">
                    <div class="col-md-9">
                        <div class="list-group">


                            <?php
                            $sqqql = "";

                            @$g_so = $_GET["so"];
                            @$g_a = $_GET["a"];
                            @$g_b = $_GET["b"];
                            @$page = $_GET ['page']; // 获得当前的页面值  
                            $i_so = $ia = $ib = false;
                            if (!empty($g_so)) {
                                $sqqql = " from word where title like :so";
                                $g_so = '%' . $g_so . '%';
                                $i_so = true;
                            } else {
                                $fl = ""; //分类查看
                                if (!empty($g_a)) {
                                    $sqqql = " from word where fl=:fa";
                                    $ia = true;
                                    if (!empty($g_b)) {
                                        $sqqql .= " and zfl=:fb";
                                        $ib = true;
                                    }
                                }
                            }
                            if ($sqqql == "") {
                                $sqqql = " from word";
                            }

                            $perNumber = 5; // 每页显示的记录数   
                            $pdo = newpdo();
                            $pdo_stmt = $pdo->prepare("select wid" . $sqqql);
                            //$count = mysql_query ( "select wid".$sqqql); // 获得记录总数    
                            if ($i_so) {
                                $pdo_stmt->bindParam(':so', $g_so);
                            }
                            if ($ia) {
                                $pdo_stmt->bindParam(':fa', $g_a);
                            }
                            if ($ib) {
                                $pdo_stmt->bindParam(':fb', $g_b);
                            }
                            $pdo_stmt->execute();
                            //$rs = mysql_num_rows ( $count );    
                            $totalNumber = $pdo_stmt->rowCount();
                            $totalPage = ceil($totalNumber / $perNumber); // 计算出总页数    
                            if (!isset($page)) {
                                $page = 1;
                            } // 如果没有值,则赋值1    
                            $startCount = ($page - 1) * $perNumber; // 分页开始,根据此方法计算出开始的记录    
                            // 根据前面的计算出开始的记录和记录数    
                            $sqq = "select *" . $sqqql . " limit :pa,:pb";
                            $pdo_stmt = $pdo->prepare($sqq);
                            $pdo_stmt->bindValue(':pa', $startCount, PDO::PARAM_INT); //bindParam(':na',$startCount);
                            $pdo_stmt->bindValue(':pb', $perNumber, PDO::PARAM_INT); //bindParam(':nb',$perNumber);
                            if ($i_so) {
                                $pdo_stmt->bindParam(':so', $g_so);
                            }
                            if ($ia) {
                                $pdo_stmt->bindParam(':fa', $g_a);
                            }
                            if ($ib) {
                                $pdo_stmt->bindParam(':fb', $g_b);
                            }
                            $pdo_stmt->execute();

                            //$res=mysql_query($sqq);    
                            //$num=mysql_num_rows($res);    
                            if ($pdo_stmt->rowCount() < 1) {
                                ?>
                                <div class="bs-callout bs-callout-danger">
                                    <h4>没有啦！</h4>
                                    <p>没有找到相关文章！</p>
                                </div>
                                <?php
                            } else {
                                while ($row = $pdo_stmt->fetch()) {
                                    ?>

                                    <div class="list-group-item" style="border: 0;">
                                        <a href="view.php?id=<?php echo $row['Id']; ?>" style="color: #0F0F0F;"><h4><?php echo $row['title']; ?></h4></a>
                                        <p class="text-muted">
                                            <small>发布时间:<?php echo $row['fbsj']; ?></small>   
                                            <small class="pull-right">
                                                点击量:<span class="badge"><?php echo $row['lll']; ?></span>
                                            </small>
                                        </p>
                                        <p class="text-muted">
                                            <?php echo $row['jie']; ?>
                                        </p>
                                        <p>

                                            <?php
                                            $gjz = explode("/", $row['gjz']);
                                            foreach ($gjz as $v) {
                                                echo "<span class=\"badge\">$v</span> ";
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div style="border: 1px dashed #ddd;"></div>


                                    <?php
                                }
                            }
                            if ($totalPage > 1) {
                                ?>    

                                <ul class="pagination">    
                                    <?php

                                    function pagebar($count, $page, $num) {
                                        $num = min($count, $num); //处理显示的页码数大于总页数的情况
                                        if ($page > $count || $page < 1)
                                            return; //处理非法页号的情况
                                        $end = $page + floor($num / 2) <= $count ? $page + floor($num / 2) : $count; //计算结束页号
                                        $start = $end - $num + 1; //计算开始页号
                                        if ($start < 1) { //处理开始页号小于1的情况
                                            $end -= $start - 1;
                                            $start = 1;
                                        }
                                        for ($i = $start; $i <= $end; $i++) { //输出分页条，请自行添加链接样式
                                            if ($i == $page)
                                                echo "<li class=\"active\"><a href=\"class.php?page=$i\">$i</a></li>";
                                            else
                                                echo "<li><a href=\"class.php?page=$i\">$i</a></li>";
                                        }
                                    }

                                    if ($page != 1) { //页数不等于1    
                                        ?>    
                                        <li><a href="class.php?page=1">«</a></li>    
                                        <?php
                                    }


                                    pagebar($totalPage, $page, 7);


                                    if ($page < $totalPage) { //如果page小于总页数,显示下一页链接    
                                        ?>    
                                        <li><a href="class.php?page=<?php echo $totalPage; ?>">»</a></li>    
                                        <?php
                                    }
                                    ?>    
                                </ul>  
                            <?php } ?>



                        </div>
                    </div>
                </div>
            </div>





        </section>

        <hr>
        <div class="container visible-xs visible-sm">
            <div class="widget widget_sentence">
                <h3>热门文章</h3>
                <div class="widget-sentence-content relates">

                    <ul>
                        <li><a href="article.html">php如何判断一个日期的格式是否正确</a></li>
                        <li><a href="article.html">php如何判断一个日期的格式是否正确</a></li>
                        <li><a href="article.html">php如何判断一个日期的格式是否正确</a></li>
                        <li><a href="article.html">php如何判断一个日期的格式是否正确</a></li>
                        <li><a href="article.html">php如何判断一个日期的格式是否正确</a></li>
                        <li><a href="article.html">php如何判断一个日期的格式是否正确</a></li>
                        <li><a href="article.html">php如何判断一个日期的格式是否正确</a></li>
                        <li><a href="article.html">php如何判断一个日期的格式是否正确</a></li>
                    </ul>
                </div>
            </div>

            <div class="widget widget-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#notice1" aria-controls="notice" role="tab" data-toggle="tab">网站公告</a></li>
                    <li role="presentation"><a href="#centre1" aria-controls="centre" role="tab" data-toggle="tab">会员中心</a></li>
                    <li role="presentation"><a href="#contact1" aria-controls="contact" role="tab" data-toggle="tab">联系站长</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane notice active" id="notice1">
                        <ul>
                            <li>
                                <time datetime="2016-01-04">01-04</time>
                                <a href="" target="_blank">欢迎访问科佑儿博客</a></li>
                            <li>
                                <time datetime="2016-01-04">01-04</time>
                                <a target="_blank" href="">在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</a></li>
                            <li>
                                <time datetime="2016-01-04">01-04</time>
                                <a target="_blank" href="">在这个小工具中最多可以调用五条</a></li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane centre" id="centre1">
                        <h4>需要登录才能进入会员中心</h4>
                        <p> <a data-toggle="modal" data-target="#loginModal" class="btn btn-primary">立即登录</a> <a href="javascript:;" class="btn btn-default">现在注册</a> </p>
                    </div>
                    <div role="tabpanel" class="tab-pane contact" id="contact1">
                        <h2>Email:<br />
                            <a href="mailto:admin@ylsat.com" data-toggle="tooltip" data-placement="bottom" title="admin@ylsat.com">kyour@vip.qq.com</a></h2>
                    </div>
                </div>
            </div>
        </div>

        <?php include './php/temp/footer.php'; ?>
        <?php include './php/temp/modal.php'; ?>
        <script src="js/bootstrap.min.js"></script> 
        <script src="js/scripts.js"></script>
    </body>
</html>