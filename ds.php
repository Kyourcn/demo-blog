<?php
include './php/main.php';
?><!doctype html>
<html lang="zh-CN">
<?php
include './php/temp/head.php';
?>

<body class="user-select">
<?php include './php/temp/header.php'; ?>
<section class="container">


    
<div class="panel panel-info">
<div class="list-group-item reed" style="background:#64b2ca;"><h3 class="panel-title"><font color="#fff"><i class="fa fa-volume-up"></i>&nbsp;&nbsp;<b>站点公告</b></font></h3></div>
<div class="list-group-item reed"><span class="btn btn-danger btn-xs">1</span> 【通知】本平台所有业务下单秒刷，全天24小时软件处理订单，订单异常请联系客服解决
</div>
<div class="list-group-item reed"><span class="btn btn-success btn-xs">2</span>搭建分站仅需10元，可以赚钱，包回本，买东西还能够享受代理价
</div>
<div class="list-group-item reed"><span class="btn btn-danger btn-xs">3</span>欢迎大家加蚂蚁代刷售后群交流-<a href="https://jq.qq.com/?_wv=1027&amp;k=59QsOwU" target="_blank">点击加群</a>
</div>
<div class="btn-group btn-group-justified">
<a target="_blank" class="btn btn-info" href="/user/reg.php"><i class="fa fa-qq"></i> 搭建分站</a>
<a target="_blank" class="btn btn-warning" href="http://wpa.qq.com/msgrd?v=3&amp;uin=599902881&amp;site=qq&amp;menu=yes"><i class="fa fa-users"></i> 联系客服</a>
</div></div>






<div class="tab-content">
	<div id="demo-tabs-box-1" class="tab-pane fade active in">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><font color="#fff"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;<b>自助下单</b></font><span class="pull-right"><a data-toggle="tab" href="#demo-tabs-box-2" aria-expanded="true" class="btn btn-warning btn-rounded"><i class="fa fa-warning"></i> 注意</a></span></h3>
			</div>
	<ul id="nav-tabs" class="nav nav-tabs">
		<li class="active"><a href="#onlinebuy" data-toggle="tab"><i class="fa fa-shopping-cart"></i> 下单</a></li><li><a href="#cardbuy" data-toggle="tab" style="display:none;"><i class="fa fa-credit-card"></i> 卡密</a></li><li><a href="#query" data-toggle="tab"><i class="fa fa-search"></i> 查单</a></li>
	</ul>
	<div class="modal-body">
		<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade in active" id="onlinebuy">
                <center>
<font size="2" <font="" color="red">寒假冲销量，商品全部降价，如果有同行比我们便宜，联系站长降价！宁愿亏死自己，也要饿死同行！！！</font>
			<div class="form-group" id="display_selectclass">
				<div class="input-group"><div class="input-group-addon">选择分类</div>
				<select name="tid" id="cid" class="form-control">
                                    <?php
                                    $jsonfz = '[{"id":"11","n":"球球记秒观战【独家推荐】"},{"id":"12","n":"球球普通算观战"},{"id":"11","n":"球球高结算观战"},{"id":"11","n":"球球代点留言赞"}]';
                                    $de_json = json_decode($jsonfz,TRUE);
                                    $count_json = count($de_json);
                                    for ($i = 0; $i < $count_json; $i++)
                                        {
                                            echo '<option value="'.$de_json[$i]['id'].'">'.$de_json[$i]['n'].'</option>';
                                        }
                                    //<option value="0">请选择分类</option><option value="75">2018年－祝您快乐</option><option value="21">名片赞专区(全网最低)</option>
                                    ?>
                                </select>
				<div class="input-group-addon"><span class="glyphicon glyphicon-search onclick" title="搜索商品" id="showSearchBar"></span></div>
			</div></div>
			<div class="form-group" id="display_searchBar" style="display:none;">
				<div class="input-group"><div class="input-group-addon"><span class="glyphicon glyphicon-remove onclick" title="关闭" id="closeSearchBar"></span></div>
				<input type="text" id="searchkw" class="form-control" placeholder="搜索商品">
				<div class="input-group-addon"><span class="glyphicon glyphicon-search onclick" title="搜索" id="doSearch"></span></div>
			</div></div>
			<div class="form-group">
				<div class="input-group"><div class="input-group-addon">选择商品</div>
				<select name="tid" id="tid" class="form-control" onchange="getPoint();"><option value="0">请选择商品</option></select>
			</div></div>
			<div class="form-group">
				<div class="input-group"><div class="input-group-addon">商品价格</div>
				<input type="text" name="need" id="need" class="form-control" disabled="">
			</div></div>
			<div class="form-group" id="display_left" style="display:none;">
				<div class="input-group"><div class="input-group-addon">库存数量</div>
				<input type="text" name="leftcount" id="leftcount" class="form-control" disabled="">
			</div></div>
			<div class="form-group" id="display_num" style="display:none;">
				<div class="input-group"><div class="input-group-addon">数量</div>
				<div class="input-group-addon"><input id="num_min" type="button" value="-"></div>
				<div class="input-group-addon"><input id="num" name="num" class="form-control" type="number" min="1" value="1"></div>
				<div class="input-group-addon"><input id="num_add" type="button" value="+"></div>
			</div></div>
			<div class="form-group">
				<div class="input-group"><div class="input-group-addon" id="inputname">下单ＱＱ</div>
				<input type="text" name="inputvalue" id="inputvalue" value="" class="form-control" required="">
			</div></div>
			<div id="inputsname" style="display: none;"></div>
			<div id="alert_frame" class="alert alert-warning" style="display:none;"></div>
			<div id="pay_frame" class="form-group text-center" style="display:none;">
			<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">订单号</div>
				<input class="form-control" name="orderid" id="orderid" value="" disabled="">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
				<div class="input-group-addon">共需支付</div>
				<input class="form-control" name="needs" id="needs" value="" disabled="">
				</div>
			</div>
			<div class="alert alert-success">订单保存成功，请点击以下链接支付！</div>
<button type="submit" class="btn btn-default" id="buy_alipay"><img src="assets/icon/alipay.ico" class="logo">支付宝</button>&nbsp;<button type="submit" class="btn btn-default" id="buy_qqpay"><img src="assets/icon/qqpay.ico" class="logo">QQ钱包</button>&nbsp;<button type="submit" class="btn btn-default" id="buy_wxpay"><img src="assets/icon/wechat.ico" class="logo">微信支付</button>&nbsp;<button type="submit" class="btn btn-default" id="buy_tenpay"><img src="assets/icon/tenpay.ico" class="logo">财付通</button>&nbsp;			</div>
			<input type="submit" id="submit_buy" class="btn btn-primary btn-block" value="立即购买">
		</center></div>
		<div class="tab-pane fade in" id="cardbuy">
						<div class="form-group">
				<div class="input-group"><div class="input-group-addon">输入卡密</div>
				<input type="text" name="km" id="km" value="" class="form-control" required="">
			</div></div>
			<input type="submit" id="submit_checkkm" class="btn btn-primary btn-block" value="检查卡密">
			<div id="km_show_frame" style="display:none;">
			<div class="form-group">
				<div class="input-group"><div class="input-group-addon">商品名称</div>
				<input type="text" name="name" id="km_name" value="" class="form-control" disabled="">
			</div></div>
			<div class="form-group">
				<div class="input-group"><div class="input-group-addon" id="km_inputname">下单ＱＱ</div>
				<input type="text" name="inputvalue" id="km_inputvalue" value="" class="form-control" required="">
			</div></div>
			<div id="km_inputsname"></div>
			<div id="km_alert_frame" class="alert alert-warning" style="display:none;"></div>
			<input type="submit" id="submit_card" class="btn btn-primary btn-block" value="立即购买">
			<div id="result1" class="form-group text-center" style="display:none;">
			</div>
			</div>
		</div>
		<div class="tab-pane fade in" id="query">
			<div class="alert alert-info" style="display:none;"></div>
			<div class="form-group">
				<div class="input-group"><div class="input-group-addon">查询内容</div>
				<input type="text" name="qq" id="qq3" value="" class="form-control" placeholder="请输入下单账号（留空则根据浏览器缓存查询）" required="">
			</div></div>
			<input type="submit" id="submit_query" class="btn btn-primary btn-block" value="立即查询">
			<div id="result2" class="form-group" style="display:none;">
				<table class="table table-striped">
				<thead><tr><th>下单账号</th><th>商品名称</th><th>数量</th><th class="hidden-xs">购买时间</th><th>状态</th><th>操作</th></tr></thead>
				<tbody id="list">
				</tbody>
				</table>
			</div>
		</div>
		<div class="tab-pane fade in" id="lqq">
			<div class="form-group">
				<div class="input-group"><div class="input-group-addon">请输入QQ</div>
				<input type="text" name="qq" id="qq4" value="" class="form-control" required="">
			</div></div>
			<input type="submit" id="submit_lqq" class="btn btn-primary btn-block" value="立即提交">
			<div id="result3" class="form-group text-center" style="display:none;"></div>
		</div>
		<div class="tab-pane fade in" id="chat">
					</div>
		</div>
	</div>
</div>
</div>
	<div id="demo-tabs-box-2" class="tab-pane fade">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><font color="#fff"><i class="fa fa-warning"></i>&nbsp;&nbsp;<b>注意事项</b></font><span class="pull-right"><a data-toggle="tab" href="#demo-tabs-box-1" aria-expanded="false" class="btn btn-warning btn-rounded"><i class="fa fa-shopping-cart"></i> 下单</a>
				</span></h3>
			</div>
			<div class="panel-body">
				<!--注意事项-->
				<div id="demo-acc-faq" class="panel-group accordion">
                                    <div class="panel panel-trans pad-top"><a href="#demo-acc-faq1" class="text-semibold text-lg text-main" data-toggle="collapse" data-parent="#demo-acc-faq">为什么下单很久了都没有开始刷呢？</a><div id="demo-acc-faq1" class="mar-ver collapse in">由于本站采用全自动订单处理，难免会出现漏单，部分单子处理时间可能会稍长一点，不过都会完成，最终解释权归本站所有。超过24小时没处理请联系客服！</div></div><div class="panel panel-trans pad-top"><a href="#demo-acc-faq2" class="text-semibold text-lg text-main" data-toggle="collapse" data-parent="#demo-acc-faq">空间人气下单方法讲解</a><div id="demo-acc-faq2" class="mar-ver collapse">1.下单前：空间必须是所有人可访问,必须自带1~4条原创说说!<br>2.代刷期间，禁止关闭访问权限，或者删除说说，删除说说的一律由自行负责，不给予补偿。</div></div>
                                </div>                </div>
		</div>
	</div>
</div>
                    
                    

                    
                    
<div class="panel panel-info">
<div class="list-group-item reed" style="background:#64b2ca;"><h3 class="panel-title"><font color="#fff"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;<b>运行日志</b></font></h3></div>
<table class="table table-bordered">
<tbody>
<tr>
	<td align="center"><font color="#808080"><b>平台已经运营</b><br><i class="fa fa-hourglass-2 fa-2x"></i><br>242天</font></td>
	<td align="center"><font color="#808080"><b>业务订单总数</b><br><span class="fa fa-shopping-cart fa-2x"></span><br>96098条</font></td>
</tr>
<tr height="50">
         <td align="center"><font color="#808080"><b>已处理的订单</b><br><i class="fa fa-check-square-o fa-2x"></i><br>96098条</font></td>
	<td align="center"><font color="#808080"><b>您共访问本站</b><br><i class="fa fa-internet-explorer fa-2x"></i><br><span id="counter">1</span>次</font></td>
</tr></tbody><tbody>
</tbody></table>
</div>
                    

    

    
    
    
    
    
</section>


<?php include './php/temp/footer.php'; ?>
<?php include './php/temp/modal.php'; ?>

<script src="js/bootstrap.min.js"></script> 
<script src="js/scripts.js"></script>
<script src="http://www.cy198.cn/assets/js/main.js?ver=1047">
</body>
</html>