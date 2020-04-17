<?php
include './php/main.php';
if($_SESSION["user_ok"]!="1"){
    header("Location:./");
    exit;
}
?><!doctype html>
<html lang="zh-CN">
<?php
include './php/temp/head.php';
?>
<body class="user-select">
<?php include './php/temp/header.php'; ?>

<style>
.my-profile .margin-bottom-30{margin-bottom:30px!important}
.my-profile .profile-bg{background:url(../imgs/iceland.jpg);height:150px;background-size:cover}
.panel-body{padding:15px}
.text-center{text-align:center}
.my-profile .margin-bottom-15{margin-bottom:15px!important}
.panel-title{margin-top:0;font-size:16px}
.my-profile .margin-bottom-30{margin-bottom:30px!important}
.my-profile .relative-user{list-style:none;padding:0}
.my-profile .relative-user li{display:inline-block;padding:0 10px;border-right:1px solid #d9d9d9}
.my-profile .avatar-wrapper{position:relative;width:150px;height:75px;margin:0 auto;top:-85px}
.my-profile .avatar-wrapper>div{display:block;position:absolute;top:0;left:0}
.my-profile .avatar-wrapper .avatar{max-width:140px;border-radius:100%;box-shadow:0 1px 1px rgba(0,0,0,.1)}
a,a:focus,a:hover{color:#5f5f5f}
.panel-primary{border-color:rgba(214,216,217,.99)}
.my-profile .relative-user li:last-child{border:none}
.panel,.snackbar{box-shadow:0 1px 6px 0 rgba(0,0,0,.12),0 1px 6px 0 rgba(0,0,0,.12)}
.panel-primary>.panel-heading{background-color:#202020}
.my-profile .nav-tabs{border:none}
.btn-group,.btn-group-vertical{position:relative;border-radius:2px;margin:10px 1px;box-shadow:0 1px 6px 0 rgba(0,0,0,.12),0 1px 6px 0 rgba(0,0,0,.12)}
.my-profile .btn-primary.active:not(.btn-link):not(.btn-flat){background-color:#00b5a4!important}
.nav-tabs>li>a,.nav-tabs>li>a:focus,.nav-tabs>li>a:hover{background-color:transparent!important;border:0!important;color:#FFF!important;font-weight:500}
.my-profile .nav-tabs>li>a{padding:8px 30px}
.my-profile .no-padding{padding-right:0!important;padding-left:0!important}
.my-profile .no-padding,.my-profile .profile-headding{padding-top:0!important;padding-bottom:0!important}
.btn.btn-flat{background:0 0;box-shadow:none;font-weight:500}
.btn-primary.btn-flat:not(.btn-link){color:#5f5f5f}
.list-group .list-group-item{background-color:transparent;overflow:hidden;border:0;border-radius:0;padding:0 16px}

body{color:#777}
</style>
    <div class="container my-profile" style="margin-top:65px">
      <div class="row">
        <div class="col-md-3">
          <div class="panel panel-primary margin-bottom-30" >
            <div class="panel-heading profile-bg" style="background-image:url('images/ubj.jpg')"></div>
            <div class="panel-body text-center">
              <form role="form" id="change-avatar-form">
                <div class="avatar-wrapper">
                  <div class="avatar-container">
                    <img src="<?php  echo $_SESSION["user_txurl"] ?>" class="avatar" />
                  </div>
                </div>
              </form>
              <h5 class="panel-title margin-bottom-15 gb-fullname"><?php  echo @$_SESSION["user_name"] ?></h5>
              <p class="margin-bottom-30 gb-selfintro">70701414</p>
              <ul class="relative-user">
                <li>
                  <a href="http://www.gbtags.com/gb/mytagsbyfan.htm">余额
                  <h5 class="followers">0.00元</h5></a>
                </li>
                <li>
                  <a href="http://www.gbtags.com/gb/followtagbyta.htm">消费
                  <h5 class="fans">0.00元</h5></a>
                </li>
              </ul>
            </div>
          </div>
          <!--左侧栏中部-->
          <div class="panel panel-primary margin-bottom-30">
            <div class="panel-body">
              <h5>我的仓库</h5>
              <div class="list-group achievement">
              <a href="/gb/listcodereplay.htm?uid=38460" class="btn">
                <div class="list-group-item">
                  <span class="glyphicon glyphicon-save"></span>充值余额
                </div>
              </a> 
              <a href="/gb/mypost/38460.htm" class="btn">
                <div class="list-group-item">
                  <span class="glyphicon glyphicon-star"></span>我的收藏
                </div>
              </a>
			  </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
		
		
		
		
          <div class="panel panel-primary margin-bottom-30">
            <div class="panel-heading text-center">
              <h4>消费记录</h4>
            </div>
			
			
			
			
            <div class="tab-content">
              <div class="panel-body tab-pane active" id="my-learned">
                <div class="list-group" id="my-trends">
				  
				  
				  
				  
				  
用户中心正在建设中，预计9896532个小时完工！
				
				
				
				
				
				
				
				
              </div>
			  
			  
			  
            </div>
          </div>
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