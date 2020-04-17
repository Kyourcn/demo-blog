<?php //七牛云上传
  require '../qiniu/autoload.php';
  use Qiniu\Auth;
  use Qiniu\Storage\UploadManager;
  $accessKey = 'K_v8raoRlVRrEvrva4jgCa1MyFUNqzIy3Fmi3Gfc';
  $secretKey = 'rmlLN0Lx-nMhFCf4PxMFw2eVis_pXI9-Ww5iBJLK';

$auth = new Auth($accessKey, $secretKey);
$bucket = 'diaozt';
$token = $auth->uploadToken($bucket);

$uploadMgr = new UploadManager();
//print_r($_FILES['file']['tmp_name']);exit;
$filePath = $_FILES['file']['tmp_name'];//'./php-logo.png';
$key = $_FILES['file']['name'];
list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
echo "结果：";
if ($err !== null) {
    var_dump($err);
} else {
    var_dump($ret);
}





	?>