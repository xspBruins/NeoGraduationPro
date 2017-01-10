<?php

//获取内网IP
$getIp = gethostbyname(gethostname());

echo 'IP:',$getIp;
echo '<br/>';

//通过'TaoBao' AND 'Sina'接口,获取IP位置
$turl = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
$ipLocation = file_get_contents($turl);
echo $ipLocation;
$ipLocation = json_decode($ipLocation,true);
var_dump($ipLocation);
echo '<br/>';
echo $ipLocation['country'].$ipLocation['province'].$ipLocation['city'];
echo '<br/>';
/*
$surl = "http://ip.taobao.com/service/getIpInfo.php?ip=$getIp";
$ipLocation = file_get_contents($surl);
echo $ipLocation;
$ipLocation = json_decode($ipLocation,true);
var_dump($ipLocation);
echo $ipLocation['country'].$ipLocation['province'].$ipLocation['city'];
*/





