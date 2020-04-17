<header class="header">
  <nav class="navbar navbar-default" id="navbar">
    <div class="container">
      <div class="header-topbar hidden-xs link-border">
        <ul class="site-nav topmenu">
          <li><a href="tags.html">标签云</a></li>
          <li><a href="readers.html" rel="nofollow">读者墙</a></li>
          <li><a href="links.html" rel="nofollow">友情链接</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" rel="nofollow">关注本站 <span class="caret"></span></a>
            <ul class="dropdown-menu header-topbar-dropdown-menu">
              <li><a data-toggle="modal" data-target="#WeChat" rel="nofollow"><i class="fa fa-weixin"></i> 微信</a></li>
              <li><a href="http://weibo.com/kyour" rel="nofollow"><i class="fa fa-weibo"></i> 微博</a></li>
              <li><a data-toggle="modal" data-target="#areDeveloping" rel="nofollow"><i class="fa fa-rss"></i> RSS</a></li>
            </ul>
          </li>
        </ul>
        
		<?php
		if (@$_SESSION["user_ok"]!="1"){
		
		
			echo '<a data-toggle="modal" data-target="#loginModal" class="login" rel="nofollow">Hi,请登录</a>&nbsp;&nbsp;<a href="-regist.html" class="register" rel="nofollow">我要注册</a>&nbsp;&nbsp;<a href="-userzh.html" rel="nofollow">找回密码</a>';
		}else{
			echo'&nbsp;&nbsp;<a href="user.php" class="login" rel="nofollow"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Hi,'.$_SESSION["user_name"] .'</a>&nbsp;&nbsp;<a href="php/users.php?n=out" rel="nofollow">注销</a>';
		}
		?>
		 </div>
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <h1 class="logo hvr-bounce-in"><a href="./" title=""><img src="images/logo.png" alt=""></a></h1>
      </div>
      <div class="collapse navbar-collapse" id="header-navbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden-index active"><a data-cont="首页" href="./">首页</a></li>
          <li><a href="_class.html">分类浏览</a></li>
          <li><a href="http://ds.kyour.vip" href2="ds.php">业务代刷</a></li>
          <li><a href="_editword.html">文章投稿</a></li>
          <li><a href="-about.html">关于本站</a></li>
		  <?php
if (@$_SESSION["user_ok"]!="1"){
echo '<li class="visible-xs" ><a data-toggle="modal" data-target="#loginModal" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>登录/注册</a></li>';
}else{
echo '<li class="visible-xs" ><a href="user.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$_SESSION["user_name"].'</a></li>';
echo '<li class="visible-xs" ><a href="php/users.php?n=out"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>退出登录</a></li>';
}
?>
        </ul>
        <form class="navbar-form visible-xs" action="/Search" method="post">
          <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
            <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
        </form>
      </div>
    </div>
  </nav>
</header>