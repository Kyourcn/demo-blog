<section class="container">
  <div class="content-wrap">
    <div class="content">
      <header class="article-header">
        <h1 class="article-title"><a href="article.html"><?php echo $row["title"]; ?></a></h1>
        <div class="article-meta"> <span class="item article-meta-time">
          <time class="time" data-toggle="tooltip" data-placement="bottom" title="时间：<?php echo $row["fbsj"]; ?>"><i class="glyphicon glyphicon-time"></i> <?php echo $row["fbsj"]; ?></time>
          </span> <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="文章发布者"><i class="glyphicon glyphicon-globe"></i> <?php echo $row["fbr"]; ?></span> <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="栏目：普通文章"><i class="glyphicon glyphicon-list"></i> <a href="program" title="">普通文章</a></span> <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="浏览量：<?php echo $row["lll"]; ?>"><i class="glyphicon glyphicon-eye-open"></i> 共<?php echo $row["lll"]; ?>人查看</span> <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="评论：<?php echo $row["pll"]; ?>条"><i class="glyphicon glyphicon-comment"></i> <?php echo $row["pll"]; ?>条评论</span> </div>
      </header>
      <article class="article-content">
	  
	  <?php echo $row["value"]; ?>


        <p class="article-copyright ">本站内容未经允许不得转载！</p>
      </article>
      <div class="article-tags">标签：
	  				<?php
						$gjz=explode("/",$row['gjz']);
						foreach ($gjz as $v) {
							echo "<a href=\"#\" rel=\"tag\">$v</a> ";
						}
					?>

	  </div>
      	<hr/>
        文章管理：<a href="editword.php?id=<?php echo $wid; ?>"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>编辑文章</button></a>
            &nbsp;<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>删除文章</button>
	<hr/>
      <div class="relates">
        <div class="title">
          <h3>相关推荐</h3>
        </div>
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
      <div class="title" id="comment">
        <h3>评论 <small>抢沙发</small></h3>
      </div>
      <!--<div id="respond">
        <div class="comment-signarea">
          <h3 class="text-muted">评论前必须登录！</h3>
          <p> <a href="javascript:;" class="btn btn-primary login" rel="nofollow">立即登录</a> &nbsp; <a href="javascript:;" class="btn btn-default register" rel="nofollow">注册</a> </p>
          <h3 class="text-muted">当前文章禁止评论</h3>
        </div>
      </div>-->
      <div id="respond">
        <form action="" method="post" id="comment-form">
          <div class="comment">
            <div class="comment-title"><img class="avatar" src="images/icon/icon.png" alt="" /></div>
            <div class="comment-box">
              <textarea placeholder="您的评论可以一针见血" name="comment" id="comment-textarea" cols="100%" rows="3" tabindex="1" ></textarea>
              <div class="comment-ctrl"> <span class="emotion"><img src="images/face/5.png" width="20" height="20" alt="" />表情</span>
                <div class="comment-prompt"> <i class="fa fa-spin fa-circle-o-notch"></i> <span class="comment-prompt-text"></span> </div>
                <input type="hidden" value="1" class="articleid" />
                <button type="submit" name="comment-submit" id="comment-submit" tabindex="5" articleid="1">评论</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div id="postcomments">
        <ol class="commentlist">
          <li class="comment-content"><span class="comment-f">#1</span>
            <div class="comment-avatar"><img class="avatar" src="images/icon/icon.png" alt="" /></div>
            <div class="comment-main">
              <p>来自<span class="address">河南郑州</span>的用户<span class="time">(2016-01-06)</span><br />
                这是匿名评论的内容这是匿名评论的内容，这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容这是匿名评论的内容。</p>
            </div>
          </li>
        </ol>
        
        <div class="quotes"><span class="disabled">首页</span><span class="disabled">上一页</span><a class="current">1</a><a href="">2</a><span class="disabled">下一页</span><span class="disabled">尾页</span></div>
      </div>
    </div>
  </div>
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
                <a href="" target="_blank">欢迎访问异清轩博客</a></li>
              <li>
                <time datetime="2016-01-04">01-04</time>
                <a target="_blank" href="">在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</a></li>
              <li>
                <time datetime="2016-01-04">01-04</time>
                <a target="_blank" href="">在这个小工具中最多可以调用五条</a></li>
            </ul>
          </div>
          <div role="tabpanel" class="tab-pane centre" id="centre">
            <h4>需要登录才能进入会员中心</h4>
            <p> <a href="javascript:;" class="btn btn-primary">立即登录</a> <a href="javascript:;" class="btn btn-default">现在注册</a> </p>
          </div>
          <div role="tabpanel" class="tab-pane contact" id="contact">
            <h2>Email:<br />
              <a href="mailto:admin@ylsat.com" data-toggle="tooltip" data-placement="bottom" title="admin@ylsat.com">admin@ylsat.com</a></h2>
          </div>
        </div>
      </div>
      <div class="widget widget_search">
        <form class="navbar-form" action="/Search" method="post">
          <div class="input-group">
            <input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
            <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
        </form>
      </div>
    </div>
    <div class="widget widget_sentence">
      <h3>每日一句</h3>
      <div class="widget-sentence-content">
        <h4>2016年01月05日星期二</h4>
        <p>Do not let what you cannot do interfere with what you can do.<br />
          别让你不能做的事妨碍到你能做的事。（John Wooden）</p>
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
</section>