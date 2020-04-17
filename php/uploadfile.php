<?php
//文件上车后端——七牛
include 'main.php';

if(isset($_FILES['file'])){
  if($_FILES['file']['size'] > 10485760) { //10 MB (size is also in bytes)10485760
    exit("文件大于10M，拒绝保存");  
  } 
} 

include "lib/qin/autoload.php";

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;


$auth = new Auth($accessKey, $secretKey);


$policy = array(
    //'callbackUrl' => 'http://micuer.com/qiniuyun/examples/upload_verify_callback.php',
    'callbackBody' => 'key=$(key)&hash=$(etag)&bucket=$(bucket)&fsize=$(fsize)&name=$(x:name)',
    'callbackBodyType' => 'application/json'
);
$token = $auth->uploadToken($bucket, null, $expires, $policy, true);
// 构建 UploadManager 对象
$uploadMgr = new UploadManager();

// 要上传文件的本地路径
$filePath = $_FILES['file']['tmp_name'];

// 上传到七牛后保存的文件名
//$key = date("dH");
$ufname=$_FILES["file"]["name"];
list($ret, $err) = $uploadMgr->putFile($token, "user/".$ufname, $filePath);
//echo "\n====> putFile result: \n";
if ($err !== null) {
	//echo $err["error"];
    var_dump($err);
} else {
    $_SESSINO["upok"]="1";
    $_SESSINO["uu"]="http://res.kyour.vip/".$ret["key"];
    
    //header("Location:../-upok.html");
    echo $this_name."上传成功，链接:http://res.kyour.vip/".$ret["key"];//var_dump($ret);
    
}





