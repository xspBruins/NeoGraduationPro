<?php

//��ȡ����IP
$getIp = gethostbyname(gethostname());

echo 'IP:',$getIp;
echo '<br/>';

//ͨ��'TaoBao' AND 'Sina'�ӿ�,��ȡIPλ��
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





