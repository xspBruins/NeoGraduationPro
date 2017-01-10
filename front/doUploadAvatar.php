<?php
require_once '../include.php';

$act = $_POST['act'];
$fileInfo = $_FILES['avatarPath'];

if($act == "neoChange"){
    //先修改图片size,如图片大小大于123*123，缩放，反之则反
    $size = getimagesize($fileInfo);
    //$filename = uploadImg($fileInfo,"../front/images/avatar");
    $_SESSION['avatarFileName'] = $fileInfo;
    //echo "<script>alert('{$_COOKIE['filename']}')</script>";
}

/*
 * array(5) {
  ["name"]=>
  string(12) "default2.jpg"
  ["type"]=>
  string(10) "image/jpeg"
  ["tmp_name"]=>
  string(27) "C:\Windows\temp\phpE2A6.tmp"
  ["error"]=>
  int(0)
  ["size"]=>
  int(17117)
}
 */