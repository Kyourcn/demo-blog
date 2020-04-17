<?php include './main.php';  //用户管理接口
//注册用户
    @$nn=$_GET['n'];
	@$uid=$_POST['uid'];
	@$name=$_POST['name'];//post获取表单里的name
	@$pass=$_POST['password'];//post获取表单里的password
	@$qq=$_POST['qq'];

if($nn == 'regist'){
        require_once "Smtp.class.php";
	$sqll = "select uid from user where uid=:uid";
	$pdo_stmt = $pdo->prepare($sqll);
	$pdo_stmt->bindParam(':uid',$uid);
	$pdo_stmt->execute();
	$num2=$pdo_stmt->fetch();
	$str = "";
	$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
	$max = strlen($strPol)-1;
        for($i=0;$i<8;$i++){
                $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        if($num2)       //如果已经存在该用户
        {
                echo "<script>alert('用户名已存在'); history.go(-1);</script>";
        }else{
	try{
	$txurl="http://q1.qlogo.cn/g?b=qq&nk={$qq}&s=140";
	$sqll="insert into user(uid,pass,name,qq,zcsj,zt,txurl) values (:uid,:pass,:name,:qq,'".date("Y.m.d")."','10','".$txurl."')";//向数据库插入表单传来的值的sql
	$pdo_stmt = $pdo->prepare($sqll);
	$pdo_stmt->bindParam(':uid',$uid);
	$pdo_stmt->bindParam(':pass',$pass);
	$pdo_stmt->bindParam(':name',$name);
	$pdo_stmt->bindParam(':qq',$qq);
	$pdo_stmt->execute();
	$reslut=$pdo_stmt->fetch();
	/*
	$sqll="insert into user_jine(uid,yue,zje,xfe,xfs,jks) values (:uid,'0','0','0','0','0')";//向数据库插入表单传来的值的sql
	$pdo = newpdo();
	$pdo_stmt = $pdo->prepare($sqll);
	$pdo_stmt->bindParam(':uid',$uid);
	$pdo_stmt->execute();
	*/
	} catch(PDOException $e) {
	
		die('数据添加失败: ' . $e."<br>".$sqll);//如果sql执行失败输出错误

	}
	/*
	$smtpemailto = $qq."@qq.com";//发送给谁
	$mailtitle = "科佑儿娱乐网用户注册验证";//邮件主题
	$mailcontent = "恭喜你注册本站用户账号成功！请点击这个链接完成注册验证：<a href='http://diaozt.cn/bl.php?n=wczc&m=".$str."'>http://diaozt.cn/bl.php?n=wczc&m=".$str."</a><br>此帐号在科佑儿网络所有网站通用。";//邮件内容
	*/
        echo '<script>alert("注册成功！即将返回登录。");window.location.href="../";</script>';
/*
	$state =$smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
		//$state = $smtp->sendmail($qq."@qq.com", $smtpusermail, "科佑儿娱乐网用户注册验证", "恭喜你注册本站用户账号成功！请点击这个链接完成注册验证：<a href='http://diaozt.cn/bl.php?n=wczc&m=".$str."'>http://diaozt.cn/bl.php?n=wczc&m=".$str."</a><br>此帐号在科佑儿网络所有网站通用。", $mailtype);
		if($state==""){
			echo "发送验证邮件失败请联系管理员修复";
		}else{
                    newpdo()->query("update user set yzm='".$str."' where uid ='".$uid."'");
			echo "zcok".$mailcontent;
		}
 * 
 */
	
}
}else if($nn == 'out'){//退出登陆
    unset($_SESSION['user_name']);
    unset($_SESSION['user_txurl']);
    unset($_SESSION['user_ok']);
    unset($_SESSION['user_uid']);
    unset($_SESSION['user_name']);
    echo"<script>history.go(-1)</script>";
}else if($nn == "login"){

    if(strlen($uid) < 3 or empty($pass)){
        echo "<script>alert('账号密码长度过短！');history.go(-1);</script>"; 
    }
    $sql = "select uid from user where uid=:uid";  
	$pdo_stmt = $pdo->prepare($sql);
	$pdo_stmt->bindParam(':uid',$uid);
	$pdo_stmt->execute();
	$num2=$pdo_stmt->fetch();
  
	if($num2){       //存在该用户
	    newpdo()->query("update user set dlsj='".date("Y.m.d")."' where uid ='".$uid."'");
		$sql = "select * from user where uid =:uid and pass =:pass";
		$pdo_stmt = $pdo->prepare($sql);
		$pdo_stmt->bindParam(':uid',$uid);
		$pdo_stmt->bindParam(':pass',$pass);
		$pdo_stmt->execute();
		$num=$pdo_stmt->fetch();
	if($num){//密码正确
    	if($num['zt']>9){
    		$_SESSION["user_name"]= $num["name"];
                if($num["txurl"]=="NULL"){
                    $_SESSION["user_txurl"]="http://".$this_host."/images/icon/icon.png";
                }else{
                    $_SESSION["user_txurl"]= $num["txurl"];
                }
    		$_SESSION["user_ok"]="1";
    		$_SESSION["user_uid"]=$uid;
    		if(@$_SESSION["dlqym"]!=null){//登陆前跳转
    			header("Location:".$_SESSION["dlqym"]);
    		}else{
    			header("Location:../");
    		}
    		mysql_free_result($result);
    	}else{
    		echo "<script>alert('请到注册邮箱完成验证，验证邮箱后即可登录！');history.go(-1);</script>";
    	}
	} else {  
		echo "<script>alert('密码不正确！');history.go(-1);</script>";  
	}  
	}else{
		echo "<script>alert('这个账号并没有注册！".$uid."');history.go(-1);</script>"; 
	}
}
