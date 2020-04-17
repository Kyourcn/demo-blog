insert into `shua_pay` (`trade_no`,			  `type`,`tid`,`zid`,`input`,`num`,`name`,`money`,`ip`,`userid`,`addtime`,`status`) values (
						'20180228223007276RMB','rmb','1','2','6666','1','0.1','0.1','117.177.196.9','dac8eb0240ff804d16820fa29ab1c187','2018-02-28 22:30:07','0')
						
$DB->query("update `shua_pay` set `status` ='1',`endtime` ='$date' where `trade_no`='{$orderid}'");
$DB->query("update `shua_site` set `rmb`=`rmb`-{$srow['money']} where `zid`='{$userrow['zid']}'");