<?php
include './php/main.php';
include './php/temp/head.php';
?>
    <body class="user-select">
        <?php include './php/temp/header.php'; ?>
        <section class="container">
            <div class="content-wrap">
                <div class="content">
                    <!--div class="jumbotron">
                      <h1>欢迎访问科佑儿娱乐网.</h1>
                      <p>在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</p>
                    </div-->
                    <div id="focusslide" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#focusslide" data-slide-to="0" class="active"></li>
                            <li data-target="#focusslide" data-slide-to="1"></li>
                            <li data-target="#focusslide" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active"> <a href="#" target="_blank"><img src="images/banner/banner_01.jpg" alt="" class="img-responsive"></a> 
                                <!--<div class="carousel-caption"> </div>--> 
                            </div>
                            <div class="item"> <a href="#" target="_blank"><img src="images/banner/banner_02.jpg" alt="" class="img-responsive"></a> 
                                <!--<div class="carousel-caption"> </div>--> 
                            </div>
                            <div class="item"> <a href="https://qr.alipay.com/c1x04124embf9njxjbhzpd5" target="_blank"><img src="images/banner/banner_03.jpg" alt="" class="img-responsive"></a> 
                                <!--<div class="carousel-caption"> </div>--> 
                            </div>
                        </div>
                        <a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">上一个</span> </a> <a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">下一个</span> </a> 
                    </div>
                    <article class="excerpt-minic excerpt-minic-index">
                        <h2><span class="red">【公告】</span><a href="" title="">网站建设维护公告</a></h2>
                        <p class="note">本站目前处于维护建设期间，本站程序由个人制作方便以后兼容性，如有建议请联系站长Q：1270701414！</p>
                    </article>




                    <form class="navbar-form visible-xs" action="/class.php" method="get">
                        <div class="input-group">
                            <input type="text" name="so" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-search"  type="submit">搜索</button>
                            </span> </div>
                    </form>




                    <div class="title">
                        <h3>最新发布</h3>
                        <div class="more"><a href="">PHP</a><a href="">JavaScript</a><a href="">EmpireCMS</a><a href="">Apache</a><a href="">MySQL</a></div>
                    </div>



                    <?php
                    $perNumber = 7; // 每页显示的记录数    
                    @$page = $_GET ['page']; // 获得当前的页面值    
                    $count = $pdo->query("select * from word"); // 获得记录总数    
                    $totalNumber = $count->rowCount();
                    $totalPage = ceil($totalNumber / $perNumber); // 计算出总页数
                    if (!isset($page)) {
                        $page = 1;
                    } // 如果没有值,则赋值1    
                    $startCount = ($page - 1) * $perNumber; // 分页开始,根据此方法计算出开始的记录    
                    // 根据前面的计算出开始的记录和记录数    
                    $sqq = "select * from word order by Id desc limit :na,:nb";
                    $pdo_stmt = $pdo->prepare($sqq);
                    $pdo_stmt->bindValue(':na', $startCount, PDO::PARAM_INT); //bindParam(':na',$startCount);
                    $pdo_stmt->bindValue(':nb', $perNumber, PDO::PARAM_INT); //bindParam(':nb',$perNumber);
                    $pdo_stmt->execute();
                    if ($pdo_stmt->rowCount() < 1) {
                        ?>


                        <div class="bs-callout bs-callout-danger">
                            <h4>没有啦！</h4>
                            <p>没有找到相关文章！欢迎投稿！</p>
                        </div>
                        <?php
                    } else {
                        while ($row = $pdo_stmt->fetch()) {
                            ?>

                            <article class="excerpt excerpt-1"><a class="focus" href="./word-<?php echo $row['Id']; ?>.html" title=""><img class="thumb" data-original="<?php echo $row['imglogo']; ?>" src="images/excerpt.jpg" alt=""></a>
                                <header><a class="cat">普通文章<i></i></a>
                                    <h2><a href="./word-<?php echo $row['Id']; ?>.html" title=""><?php echo $row['title']; ?></a></h2>
                                </header>
                                <p class="meta">
                                    <time class="time"><i class="glyphicon glyphicon-time"></i><?php echo $row['fbsj']; ?></time>
                                    <span class="views"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $row['lll']; ?>人围观</span> <a class="comment" href="./word-<?php echo $row['Id']; ?>.html#comment"><i class="glyphicon glyphicon-comment"></i> 0个不明物体</a></p>
                                <p class="note"><?php echo $row['jie']; ?></p>
                                <?php
                                $gjz = explode("/", $row['gjz']);
                                foreach ($gjz as $v) {
                                    echo "<span class=\"badge\">$v</span> ";
                                }
                                ?>
                                </p>
                            </article>


                            <?php
                        }
                    }
                    if ($totalPage > 1) {
                        ?>

                        <div class="quotes" style="margin-top:15px">   
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
                                for ($i = $start; $i <= $end; $i++) {//输出分页条，请自行添加链接样式
                                    if ($i == $page)
                                        echo "<a class=\"current\" href=\"index.php?page=$i\">$i</a>";
                                    else
                                        echo "<a href=\"index.php?page=$i\">$i</a>";
                                }
                            }
                            if ($page != 1) { //页数不等于1
                                ?>    
                                <a href="index.php">«首页</a>
                                <?php
                            }
                            pagebar($totalPage, $page, 7); //7
                            if ($page < $totalPage) { //如果page小于总页数,显示下一页链接
                                ?>
                                <a href="index.php?page=<?php echo $totalPage; ?>">尾页»</a>
                                <?php
                            }
                            ?>
                        </div>
                    <?php } ?>

                    <!--div class="quotes" style="margin-top:15px">
                            <span class="disabled">首页</span><span class="disabled">上一页</span><span class="current">1</span><a href="">2</a><a href="">下一页</a><a href="">尾页</a>
                    </div-->
                </div>
            </div>
            <?php include './php/temp/aside1.php'; ?>
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
<?php if (@$_SESSION["user_ok"]=="1"){ ?>
                        <h4><?php echo $_SESSION["user_name"]; ?></h4>
                        <p> <a href="user.php" class="btn btn-primary">个人中心</a> <a href="php/users.php?n=out" class="btn btn-default">退出登录</a> </p>
<?php }else{ ?>    
                        
                        <h4>需要登录才能进入会员中心</h4>
                        <p> <a data-toggle="modal" data-target="#loginModal" class="btn btn-primary">立即登录</a> <a href="javascript:;" class="btn btn-default">现在注册</a> </p>
<?php } ?>
                    </div>
                    <div role="tabpanel" class="tab-pane contact" id="contact1">
                        <h2>Email:<br />
                            <a href="mailto:kyour@vip.qq.com" data-toggle="tooltip" data-placement="bottom" title="邮箱地址">kyour@vip.qq.com</a></h2>
                    </div>
                </div>
            </div>

        </div>




        <?php include './php/temp/footer.php'; ?>
        <?php include './php/temp/modal.php'; ?>


        <script src="js/bootstrap.min.js"></script> 
        <script src="js/jquery.ias.js"></script> 
        <script src="js/scripts.js"></script>
    </body>
</html>