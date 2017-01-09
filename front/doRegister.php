<?php
require_once '../include.php';

$add['acc'] = $_POST['account'];
$add['pass'] = md5($_POST['pass']);

$add['qq'] = $_POST['qq'];
$add['email'] = $_POST['email'];
$add['phone'] = $_POST['phone'];

$add['uname'] = $_POST['uname'];
$add['tag'] = $_POST['tag'];
$add['address'] = $_POST['address'];

$client = connectionToNeo4j();
//已有账号返回
$HAA = checkAccount($client, $add['acc']);
if($HAA){
    alertMes("已有该账号~", "register.php");
}else{
    // 补充填充
    if($add['uname'] == ""){
        $add['uname'] = $add['acc'];
    }
    if($add['email'] == "" && $add['qq'] != ""){
        $add['email'] = $add['qq']."@qq.com";
    }
    if($add['tag'] == ""){
        $add['tag'] = "这家伙很懒，什么也没有留下..";
    }
    if($add['address'] == ""){
        $surl = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
        $ipLan = file_get_contents($surl);
        $ipLan = json_decode($ipLan,true);
        $add['address'] = $ipLan['country'].'-'.$ipLan['province'].'省'.$ipLan['city'].'市';
    }
    
    //var_dump($add);
    addUser($client, $add);
    $_SESSION['count'] = 0;
    alertMes("registed~", "index.php?ORC=open");
    
}


