<!-- 侧边栏 -->

            <aside class="sidebar">
                <div class="fixed">

                    <div class="widget widget-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">网站公告</a></li>
                            <li role="presentation"><a href="#centre" aria-controls="centre" role="tab" data-toggle="tab">会员中心</a></li>
                            <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">联系站长</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane notice active" id="notice">
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
                            <div role="tabpanel" class="tab-pane centre" id="centre">
<?php if (@$_SESSION["user_ok"]=="1"){ ?>
                        <h4><?php echo $_SESSION["user_name"]; ?></h4>
                        <p> <a href="user.php" class="btn btn-primary">个人中心</a> <a href="php/users.php?n=out" class="btn btn-default">退出登录</a> </p>
<?php }else{ ?>    
                        
                        <h4>需要登录才能进入会员中心</h4>
                        <p> <a data-toggle="modal" data-target="#loginModal" class="btn btn-primary">立即登录</a> <a href="javascript:;" class="btn btn-default">现在注册</a> </p>
<?php } ?>
                            </div>
                            <div role="tabpanel" class="tab-pane contact" id="contact">
                                <h2>Email:<br />
                                    <a href="mailto:kyour@vip.qq.com" data-toggle="tooltip" data-placement="bottom" title="邮箱地址">kyour@vip.qq.com</a></h2>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget_search">
                        <form class="navbar-form" action="/class.php" method="get">
                            <div class="input-group">
                                <input type="text" name="so" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-search" type="submit">搜索</button>
                                </span> </div>
                        </form>
                    </div>
                </div>
                <div class="widget widget_sentence">
                    <?php
                    $date = date("Ymd");
                    $content = file_get_contents('http://open.iciba.com/dsapi/?date=' . $nowyear);
                    $arr = json_decode($content, true);
                    ?>


                    <h3>每日一句</h3>
                    <div class="widget-sentence-content">
                        <h4><?php echo $arr["note"]; ?></h4>
                        <?php echo $arr["content"]; ?>
                    </div>
                </div>
                <div class="widget widget_hot">
                    <h3>热门文章</h3>
                    <ul>
                        <li><a href=""><span class="thumbnail"><img class="thumb" data-original="images/excerpt.jpg" src="images/excerpt.jpg" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>
                        <li><a href=""><span class="thumbnail"><img class="thumb" data-original="images/excerpt.jpg" src="images/excerpt.jpg" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>
                        <li><a href=""><span class="thumbnail"><img class="thumb" data-original="images/excerpt.jpg" src="images/excerpt.jpg" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>
                        <li><a href=""><span class="thumbnail"><img class="thumb" data-original="images/excerpt.jpg" src="images/excerpt.jpg" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>
                        <li><a href=""><span class="thumbnail"><img class="thumb" data-original="images/excerpt.jpg" src="images/excerpt.jpg" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>
                    </ul>
                </div>
            </aside>
