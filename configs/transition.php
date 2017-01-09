<?php
require_once '../include.php';

echo "当你看见这个屏幕时候，你已成功设置密码，跳转主页中~";
//echo '<script>alert("重置密码成功，跳转中~");</script>';

echo '<script>
    setTimeout(function(){
                 window.location=\'../front/index.php?ORC=open\';},3000);
    </script>';
