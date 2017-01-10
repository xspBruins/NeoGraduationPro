<?php
require_once '../include.php';

//Common data
$act = $_REQUEST['act'];
$client = connectionToNeo4j();

if($act == "fillInfro"){
    //St1 data
    $account = $_POST['Account'];
    $email = $_POST['Email'];
    $arr['account'] = $account;
    $arr['email'] = $email;
    
    $hasUser = verifyAccountByEmail($client, $arr);
    //var_dump($arr);
    if($hasUser){
        header("location:findbackPasswordSt2.php?Account={$account}&Email={$email}");
    }else {
        alertMes("账号或邮箱错误~", "findbackPasswordSt1.php");
    }
}

if($act == "changePassword"){
    //St2 data
    $arr['account'] = $_REQUEST['account'];
    $arr['email'] = $_REQUEST['email'];
    $password = $_POST['newPassword'];
    $arr['password'] = md5($password);
    //var_dump($arr);
    $suc = setNewPassword($client, $arr);
    if($suc){
        $_SESSION['count'] = 0; //重置index页面计数，保证此次返回可以弹出login-alert对话框，同时避免刷新index页面不重复出现
        header("location:../configs/transition.php");
    }
}