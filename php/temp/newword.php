<?php include './main.php';?><?php
	@$title=$_POST['title'];
	@$fbr=$_POST['fbr'];
	@$gjz=$_POST['gjz'];
	@$jie=$_POST['jjo'];
	@$Id=$_POST['Id'];
	@$value=$_POST['value'];
	$wid='112';

	$pdo = newpdo();
	if($Id==""){
		$sql = "insert into word(wid,fbr,title,gjz,jie,value,lll) values (:wid,:fbr,:title,:gjz,:jie,:value,0)";
		$pdo->query("set names utf8");
		$pdo_stmt = $pdo->prepare($sql);
		$pdo_stmt->bindParam(':wid',$wid);
		$pdo_stmt->bindParam(':fbr',$fbr);
		$pdo_stmt->bindParam(':title',$title);
		$pdo_stmt->bindParam(':gjz',$gjz);
		$pdo_stmt->bindParam(':jie',$jie);
		$pdo_stmt->bindParam(':value',$value);
		$pdo_stmt->execute();
	
	}else{
		$sql = "UPDATE word SET wid=:wid,fbr=:fbr,title=:title,gjz=:gjz,jie=:jie,value=:value WHERE Id=:Id";
		//insert into word(wid,fbr,title,gjz,jie,value,lll) values (:wid,:fbr,:title,:gjz,:jie,:value,0)";
		$pdo->query("set names utf8");
		$pdo_stmt = $pdo->prepare($sql);
		$pdo_stmt->bindParam(':wid',$wid);
		$pdo_stmt->bindParam(':fbr',$fbr);
		$pdo_stmt->bindParam(':title',$title);
		$pdo_stmt->bindParam(':gjz',$gjz);
		$pdo_stmt->bindParam(':jie',$jie);
		$pdo_stmt->bindParam(':value',$value);
		$pdo_stmt->bindParam(':Id',$Id);
		$pdo_stmt->execute();
	}
	header("Location:../-addword.html");

//$count = $db->exec("INSERT INTO word_pl SET wid ='11',bq1='男',time=NOW()");

//echo "<script>alert('已提交！');history.go(-1);</script>";
?>