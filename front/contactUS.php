<?php
require_once '../include.php';

//获取时间
date_default_timezone_set("Asia/Shanghai");
$datetime = new DateTime();
$time = $datetime->format('Y-m-d H:i:s');

$conInfo['account'] = $_POST['account'];
$conInfo['email'] = $_POST['email'];
$conInfo['phone'] = $_POST['phone'];
$conInfo['message'] = $_POST['message'];

//var_dump($conInfo);
$client = connectionToNeo4j();
$parama = $conInfo['account'];
if(checkAccount($client, $parama)){
    //创建节点
    $fedID = createFeedbackNode($client, $conInfo);
    //建立关系
    $arr = $conInfo;
    $arr['fedID'] = $fedID;
    $arr['time'] = $time;
    $arr['version'] = $_SERVER['HTTP_USER_AGENT'];
    $con = jointUserToFeedback($client, $arr);
    if($con){
        alertMes("谢谢您的反馈~这是我们最大的进步~", "index.php");
    }else {
        //alertMes("不可预期错误，反馈成功但创立连接失败", "index.php?#contact");
        echo "反馈成功，但创建(userPeople)-[]->(feedBack)关系失败";
        header("location:index.php");
    }
}else {
    createFeedbackNode($client, $conInfo);
    header("location:index.php");
}
