<<<<<<< Updated upstream
﻿<?php
require_once '../include.php';

$arr['login'] = $_POST['account'];
$arr['pword'] = md5($_POST['pword']);
$arr['verify'] = $_POST['verify'];
$client = connectionToNeo4j();

if($_SESSION['verify'] == $arr['verify']){
    //判断登录填入为name OR account OR phone
    if(judgeAcc($client, $arr['login'])){
        $byAcc['account'] = $arr['login'];
        $byAcc['pword'] = $arr['pword'];
        $login_acc = queryUserbyAccount($client, $byAcc);
        if($login_acc){
            $login_user = $login_acc;
        }
    }
    
    if(judgeName($client, $arr['login'])){
        $byName['name'] = $arr['login'];
        $byName['pword'] = $arr['pword'];
        $login_name = queryUserbyName($client, $byName);
        if($login_name){
            $login_user = $login_name;
        }
    }
    
    if(judgePhone($client, $arr['login'])){
        $byPhone['phone'] = $arr['login'];
        $byPhone['pword'] = $arr['pword'];
        $login_phone = queryUserbyPhone($client, $byPhone);
        if($login_phone){
            $login_user = $login_phone;
        }
    }
    
    $_SESSION['user'] = $login_user;
    
    if($login_user){
        echo "<script>window.location='index.php';</script>";
    }
    else{
        $_SESSION['count'] = 0;
        var_dump($arr);
        alertMes("用户名或密码错误~", "index.php?ORC=open");
    } 
}else {
    $_SESSION['count'] = 0;
    alertMes("验证码错误~", "index.php?ORC=open");
}
=======
﻿<?php
require_once '../include.php';

$arr['login'] = $_POST['account'];
$arr['pword'] = md5($_POST['pword']);
$arr['verify'] = $_POST['verify'];
$client = connectionToNeo4j();

if($_SESSION['verify'] == $arr['verify']){
    //判断登录填入为name OR account OR phone
    if(judgeAcc($client, $arr['login'])){
        $byAcc['account'] = $arr['login'];
        $byAcc['pword'] = $arr['pword'];
        $login_acc = queryUserbyAccount($client, $byAcc);
        if($login_acc){
            $login_user = $login_acc;
        }
    }
    
    if(judgeName($client, $arr['login'])){
        $byName['name'] = $arr['login'];
        $byName['pword'] = $arr['pword'];
        $login_name = queryUserbyName($client, $byName);
        if($login_name){
            $login_user = $login_name;
        }
    }
    
    if(judgePhone($client, $arr['login'])){
        $byPhone['phone'] = $arr['login'];
        $byPhone['pword'] = $arr['pword'];
        $login_phone = queryUserbyPhone($client, $byPhone);
        if($login_phone){
            $login_user = $login_phone;
        }
    }
    
    $_SESSION['user'] = $login_user;
    
    if($login_user){
        echo "<script>window.location='index.php';</script>";
    }
    else{
        $_SESSION['count'] = 0;
        var_dump($arr);
        alertMes("用户名或密码错误~", "index.php?ORC=open");
    } 
}else {
    $_SESSION['count'] = 0;
    alertMes("验证码错误~", "index.php?ORC=open");
}
>>>>>>> Stashed changes
