<?php
//七牛API入口
function classLoader($class)
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . '/src/' . $path . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('classLoader');

require_once  __DIR__ . '/src/Qiniu/functions.php';

//配置七牛密钥
$bucket = 'kyour';
$accessKey = 'e_XPP0y5X_K-IUa1YL684l_mrX6hejff7PAsO-7K';
$secretKey = 'zK6Kpf0OEdpy8nyp5BcXsz6XxEZ_eEynBOcCb7MY';

$expires = 6000;