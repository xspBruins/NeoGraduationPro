<?php

for($i=0;$i<5;$i++){
    $str = dechex(rand(3742,4860));
    $content = base_convert($str, 16, 10);
    $content2 = base_convert($str, 16, 10);
    $char[i] = chr($content).chr($content2);
    $char[i] = iconv('UCS-2', 'utf8', $char[i]);
    echo $char[i];
}

var_dump($char);
