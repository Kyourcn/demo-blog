<section class="container">
  <div class="content-wrap">
    <div class="content">
      <header class="article-header">
        <h1 class="article-title" id="title" name="title"><?php echo $row["title"]; ?></h1>
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
        </ul>
      </div>
      <div class="title" name="pl" id="pl">
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
              <p><span class="address">管理员</span><span class="time">(2016-01-06)</span><br />
                请自觉遵守相关法律法规，严禁发布违法违规内容！</p>
            </div>
          </li>
          <li class="comment-content"><span class="comment-f">#2</span>
            <div class="comment-avatar"><img class="avatar" src="images/icon/icon.png" alt="" /></div>
            <div class="comment-main">
              <p><span class="address">游客爸爸</span><span class="time">(2016-01-06)</span><br />
                楼上傻逼</p><span class="address">管理员：</span>你找打呢？
            </div>
          </li>
        </ol>
        
        <div class="quotes"><span class="disabled">首页</span><span class="disabled">上一页</span><a class="current">1</a><a href="">2</a><span class="disabled">下一页</span><span class="disabled">尾页</span></div>
      </div>
    </div>
  </div>
 <?php include './php/temp/aside1.php'; ?>
</section>

<script>
 $(document).ready(function() {  
        $(".comment-main").click(function(){
            //|获取当前对象的 data id 属性值  
            //alert($(this).find("p span.address").text());
            location.href = "#pl";
            $("#comment-textarea").text("回复"+$(this).find("p span.address").text());
        });  
    });
</script>