<?php
$uurl="http://qqkey.bpyfz.top/ajax.php?act=gettool&cid=17";
$ww=file_get_contents($uurl);
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
echo var_dump(json_decode($ww, true));
//var_dump(json_decode($json, true));

?>