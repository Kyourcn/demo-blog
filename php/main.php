<?php 
session_set_cookie_params(12*3600);
session_start();
date_default_timezone_set("PRC");
header('Content-type: text/html; charset=utf-8');
function  newpdo(){
	$dsn = 'mysql:host=localhost;dbname=blog';
	$pdo = new PDO($dsn, 'blog', 'li15181191048');
	$pdo->query("SET NAMES utf8");
	return $pdo;
}
$pdo = newpdo();
$this_res='';
$this_name='科佑儿娱乐网';
$this_title='科佑儿娱乐网 | 娱乐新概念';
$this_dsi='科佑儿娱乐网，主要分享程序源码,站长工具,网络技术,免费空间,模板插件,网赚项目,各类资源,各类教程,QQ资源,手机应用,致力创造一个高质量分享平台.';
$this_host=$_SERVER['SERVER_NAME'];//"blog.kyour.vip";
