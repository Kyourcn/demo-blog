<?php include './main.php';?><?php
if (@$_SESSION["user_ok"]!="1"){
    echo "<script>alert('请先登陆');history.go(-1);</script>";
    exit;
}
	@$title=$_POST['title'];
	@$fbr=$_POST['fbr'];
	@$gjz=$_POST['gjz'];
	@$jie=$_POST['jjo'];
	@$Id=$_POST['Id'];
	@$value=$_POST['value'];
        @$imglogo=$_POST['imglogo'];
	$wid='112';
	if($Id==""){//新增
		$sql = "insert into word(wid,fbr,title,gjz,jie,value,lll,fbsj,imglogo) values (:wid,:fbr,:title,:gjz,:jie,:value,0,CURDATE(),:imglogo)";
		$pdo->query("set names utf8");
		$pdo_stmt = $pdo->prepare($sql);
		$pdo_stmt->bindParam(':wid',$wid);
		$pdo_stmt->bindParam(':fbr',$fbr);
		$pdo_stmt->bindParam(':title',$title);
		$pdo_stmt->bindParam(':gjz',$gjz);
		$pdo_stmt->bindParam(':jie',$jie);
		$pdo_stmt->bindParam(':value',$value);
                $pdo_stmt->bindParam(':imglogo',$imglogo);
		$pdo_stmt->execute();
	
	}else{//修改更新
		$sql = "UPDATE word SET wid=:wid,fbr=:fbr,title=:title,gjz=:gjz,jie=:jie,value=:value,imglogo=:imglogo WHERE Id=:Id";
		//insert into word(wid,fbr,title,gjz,jie,value,imglogo) values (:wid,:fbr,:title,:gjz,:jie,:value,:imglogo)";
		$pdo->query("set names utf8");
		$pdo_stmt = $pdo->prepare($sql);
		$pdo_stmt->bindParam(':wid',$wid);
		$pdo_stmt->bindParam(':fbr',$fbr);
		$pdo_stmt->bindParam(':title',$title);
		$pdo_stmt->bindParam(':gjz',$gjz);
		$pdo_stmt->bindParam(':jie',$jie);
		$pdo_stmt->bindParam(':value',$value);
		$pdo_stmt->bindParam(':Id',$Id);
                $pdo_stmt->bindParam(':imglogo',$imglogo);
		$pdo_stmt->execute();
	}
	header("Location:../-addword.html");

//$count = $db->exec("INSERT INTO word_pl SET wid ='11',bq1='男',time=NOW()");

//echo "<script>alert('已提交！');history.go(-1);</script>";
?>