<?php
require_once '../include.php';

/*
 * 设置时区
 * 获取时间
 * 转化格式
 * 代入参数
 */
date_default_timezone_set('Asia/Shanghai');
$dateTime = new DateTime();
$time = $dateTime->format('Y-m-d H:i:s');

$act = $_POST['act'];

if($act == "refresh"){
    echo '<img alt="" src="getVerify.php?'.$time.'" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;看不清？点我';
}