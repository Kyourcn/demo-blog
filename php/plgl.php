<?php
include 'main.php';
//INSERT INTO `blog`.`word_pl`(`wid`, `uid`, `atuid`, `plid`, `wdate`, `value`) VALUES ('wid', 'uid', '666', 0, '2018-04-07 18:55:50', 'hello word')
if($GET["n"]=="add"){
    $wid=$_GET["wid"];
    $uid=$_SESSINO[""];
    
    
    $result=$pdo->query("INSERT INTO `word_pl`(`wid`, `uid`, `atuid`, `plid`, `wdate`, `value`) VALUES ('wid', 'uid', '666', 0, '2018-04-07 18:55:50', 'hello word')");
    if(!is_object($result)){
        exit("error");//执行错误
    }
    echo "ok";
}