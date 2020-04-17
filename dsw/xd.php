<?php
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
    
function getSubstr($str, $leftStr, $rightStr)
{
    $left = strpos($str, $leftStr);
    $right = strpos($str, $rightStr,$left);
    if($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}

//代刷网主地址
$mainurl="http://ky.fc81.pw";
//提交订单地址
$tjurl=$mainurl."/user/ajax.php?act=pay";
//支付地址
$zfurl=$mainurl."/user/shop.php?act=submit&orderid=";
//代刷网cookie
$dswcookie="counter=3; mysid=7696451ba0183e49abccd921ec4154b4; user_token=21a1ozrDdIC2y9BQEg8BHuak5GX5UBDv9L2uDD2Zs3Q3wExtZNNNx60EIXTEHuRHc5HRpGcEz8sJ8r0KSZ3Bsi5lGX2zAQ; sec_defend=4f5b04d8f4ea5a76cc4f1ce06dda6caec66366549b4b5d26b6b942022063c3db; PHPSESSID=sbdkf9idkb03k10msbqfpb7795; counter=1";

//" user_token=72e6ni8%2FDg9gBZTBh91ro8x5f6eNZ1Dg5yvZEayDXkPbnUbR4Nhvn%2ByAW6kbo7gEKo%2B%2FLaXHLdolVwvlHEakFDzNNQ; sec_defend=804dca3321cf8f20922db3606edf850bf1d45886e74560e1c776fd0c5105de4c;";
//模拟请求头
$header = array(
     "Content-Type:application/x-www-form-urlencoded;charset=UTF-8",
     "Cookie:".$dswcookie,
     "SocketLog:SocketLog(tabid=121&client_id=ADMIN_ADMIN)",
     'User-Agent:Mozilla/5.0 (Windows NT 6.1; rv:57.0) Gecko/20100101 Firefox/57.0');
//模拟POST请求数据
@$sid=$_POST["sid"];
@$qid=$_POST["qid"];
$data = 'tid='.$sid.'&inputvalue='.$qid.'&num=1';
$ret = curl_post($header, $data,$tjurl);
$dtime=date('y-m-d h:i:s',time());

$json1=json_decode($ret,true);
if($json1['code']==0){//成功0
file_put_contents('loginok.txt','成功:'.urldecode(file_get_contents("php://input")).' 单号：'.$json1['trade_no']." 时间： ".$dtime."\n",FILE_APPEND);
$ret2 = curl_post($header,"",$zfurl.$json1['trade_no']);
$ret3 = getSubstr($ret2,"t'>alert('","');window.location.href");
file_put_contents('logoutok.txt',"支付成功：".$zfurl.$ret3." - ".$dtime."\n",FILE_APPEND);
echo "1";
}else{
file_put_contents('loginon.txt','失败:'.urldecode(file_get_contents("php://input"))."失败代码：".$json1['code'].",含义：".$json1['msg']." 时间： ".$dtime."\n",FILE_APPEND);
file_put_contents('logouton.txt',"提交订单失败 - ".$json1['msg'].$qid." - ".$dtime."\n",FILE_APPEND);
echo "0";
}

/*
if($ret=="0"){
file_put_contents('login.txt','成功:'.urldecode(file_get_contents("php://input"))." - ".$dtime."\n",FILE_APPEND);
file_put_contents('logout.txt',$tjurl." - ".$ret." - ".$dtime."\n",FILE_APPEND);
}else{
file_put_contents('log.txt','失败:'.urldecode(file_get_contents("php://input"))." - ".$dtime."\n",FILE_APPEND);
file_put_contents('logout.txt',$tjurl." - ".$ret." - ".$dtime."\n",FILE_APPEND);
}
*/
?>