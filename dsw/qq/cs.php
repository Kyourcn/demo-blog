<?php
header("Content-type: text/html; charset=utf-8");



$url = "http://api.bpyfz.top/index.php?m=member&a=login";
$oCurl = curl_init();
// 设置请求头, 有时候需要,有时候不用,看请求网址是否有对应的要求
$header[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2
Accept-Encoding:  deflate
Content-Type: application/x-www-form-urlencoded
Connection: keep-alive
Upgrade-Insecure-Requests: 1
Pragma: no-cache
Cache-Control: no-cache';
$user_agent = "Mozilla/5.0 (Windows NT 6.1; rv:58.0) Gecko/20100101 Firefox/58.0";
curl_setopt($oCurl, CURLOPT_URL, $url);
curl_setopt($oCurl, CURLOPT_HTTPHEADER,$header);
// 返回 response_header, 该选项非常重要,如果不为 true, 只会获得响应的正文
curl_setopt($oCurl, CURLOPT_HEADER, true);
// 是否不需要响应的正文,为了节省带宽及时间,在只需要响应头的情况下可以不要正文
//curl_setopt($oCurl, CURLOPT_NOBODY, true);
// 使用上面定义的 ua
curl_setopt($oCurl, CURLOPT_USERAGENT,$user_agent);
curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
$sContent = curl_exec($oCurl);
// 获得响应结果里的：头大小
$headerSize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);
// 根据头大小去获取头信息内容
$header = substr($sContent, 0, $headerSize);

preg_match('/Set-Cookie:(.*);/iU', $header, $matches); 
$cookie = $matches[1]; 


    echo $cookie.'<br><br>'.$header;
curl_close($oCurl);




/*
POST /user/login.php HTTP/1.1
Host: key.bpyfz.top
User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:58.0) Gecko/20100101 Firefox/58.0
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,**;q=0.8
Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2
Accept-Encoding: gzip, deflate
Referer: http://key.bpyfz.top/user/login.php
Content-Type: application/x-www-form-urlencoded
Content-Length: 23
Cookie: mysid=f05ebb6251c6e4160c18b89e42558b44; sec_defend=42edbda720835675d6bf95d46f54bfc5c1cc56326198d0e234e4691f613edd3e; PHPSESSID=8idee1jc6p21h8r7hgc0t1ckn7
Connection: keep-alive
Upgrade-Insecure-Requests: 1
Pragma: no-cache
Cache-Control: no-cache
*/