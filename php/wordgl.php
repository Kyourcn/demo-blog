<?php include './main.php';?><?php
	@$wid=$_POST["id"];
	@$uid=$_SESSION["user_uid"];
	@$uvip=$_SESSION["uvip"];
	$sql = "SELECT * FROM word WHERE Id = :wid"; 
	$pdo_stmt = $pdo->prepare($sql);
	$pdo_stmt->bindParam(':wid',$wid);
	$pdo_stmt->execute();
	$row=$pdo_stmt->fetch();
	if($uid==$row["fbr"] or $uvip>100){
		$sqll = "DELETE FROM `word` WHERE `Id` = ".$wid;  
		$pds=$pdo->query($sqll);
		echo "ok";
	}else{
		echo"删除失败，因为您不是本文发布人，无权删除！";//：".$uid.",".$row["fbr"];
	}

?>