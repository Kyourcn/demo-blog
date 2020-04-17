<?php
function curl_post($cookie,$data,$url)
    {
     $header = array(
     "Content-Type:application/x-www-form-urlencoded;charset=UTF-8",
     "Cookie:".$cookie,
     "SocketLog:SocketLog(tabid=121&client_id=ADMIN_ADMIN)",
     'User-Agent:Mozilla/5.0 (Windows NT 6.1; rv:57.0) Gecko/20100101 Firefox/57.0'); 
     $ch = curl_init();
     $res= curl_setopt ($ch, CURLOPT_URL,$url);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
     curl_setopt ($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
     curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
     $result = curl_exec ($ch);
     curl_close($ch);
     if ($result == NULL) {
      return 0;
     }
     return $result;
    }


function getCookie($url){
$header = array(
     "Content-Type:application/x-www-form-urlencoded;charset=UTF-8", "SocketLog:SocketLog(tabid=121&client_id=ADMIN_ADMIN)",
     'User-Agent:Mozilla/5.0 (Windows NT 6.1; rv:57.0) Gecko/20100101 Firefox/57.0');
$oCurl = curl_init();
curl_setopt($oCurl, CURLOPT_URL, $url);
curl_setopt($oCurl, CURLOPT_HTTPHEADER,$header);
// 返回 response_header, 该选项非常重要,如果不为 true, 只会获得响应的正文
curl_setopt($oCurl, CURLOPT_HEADER, true);
// 是否不需要响应的正文,为了节省带宽及时间,在只需要响应头的情况下可以不要正文
//curl_setopt($oCurl, CURLOPT_NOBODY, true);
// 使用上面定义的 ua
curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
$sContent = curl_exec($oCurl);
// 获得响应结果里的：头大小
$headerSize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);
// 根据头大小去获取头信息内容
$header = substr($sContent, 0, $headerSize);

preg_match("/set\-cookie:([^\r\n]*)/i", $header, $matches);// "/^开.*结$/"
$cookie = $matches[1]; 
curl_close($oCurl);
$o=explode("path=",$cookie);
return $o[0];
}

function getSubstr($str, $leftStr, $rightStr)
{
    $left = strpos($str, $leftStr);
    $right = strpos($str, $rightStr,$left);
    if($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}

//vip站账号
$vipzh="kyour";
$vipmm="li15181191048";

//取VIP站 SESSION-Cookie
$vipzurl="http://api.bpyfz.top/index.php?m=member&a=login";
$vipzcoo=getCookie($vipzurl);
$vipzcoo=$vipzcoo."rememberme=".$vipzh;
$logins = curl_post($vipzcoo, "","http://api.bpyfz.top/index.php?m=member&a=login_save&username=kyour&password=li15181191048&rememberme=1");
echo $logins."---".$vipzcoo;

//模拟POST请求数据
@$qid=$_POST["qid"];
@$cycle=$_POST["cycle"];
@$number=$_POST["num"];
$data = '';
$dtime=date('y-m-d h:i:s',time());
//提交订单地址 0余额不足 1下单成功 3身份失效
$tjurl="http://api.bpyfz.top/index.php?m=task&a=add_task&number=".$number."&cycle=".$cycle."&name=".$qid."&money=999.00&classify_id=344";
$ret = curl_post($vipzcoo, $data,$tjurl);
echo "<br>".$tjurl."<br>".$ret;
if($ret=="1"){//成功1 余额不足0
file_put_contents('login.txt','成功:'.urldecode(file_get_contents("php://input"))." - ".$dtime."\n",FILE_APPEND);
file_put_contents('logout.txt',$tjurl." - ".$ret." - ".$dtime."\n",FILE_APPEND);
}else{
file_put_contents('login.txt','失败:'.urldecode(file_get_contents("php://input"))." - ".$dtime."\n",FILE_APPEND);
file_put_contents('logout.txt',"订单提交失败：".$tjurl." - ".$ret." - ".$dtime."\n",FILE_APPEND);
}

?>