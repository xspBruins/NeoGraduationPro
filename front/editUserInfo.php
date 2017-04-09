<<<<<<< HEAD
<<<<<<< Updated upstream
=======
>>>>>>> cc9a4e4708ccd394c26f5916d4a5d79dd9e25f5d
<?php
require_once '../include.php';

$client = connectionToNeo4j();

$arr['name'] = $_POST['name'];
$arr['email'] = $_POST['email'];
$arr['address'] = $_POST['address'];
$arr['phone'] = $_POST['phone'];
$arr['tag'] = $_POST['tag'];

/*
 * 考虑此处为按钮事件触发，setSelf.php页面未点击按钮时自动赋值为空，迁移至setSelf.php页面
//设定分割字符
$secret = bulidRandomString(2,5).$_SERVER['REMOTE_ADDR'];
$_SESSION['divisionChar'] = '|#|'.md5($secret).'|#|';
//$arr['divisionChar'] = $_SESSION['divisionChar'];
//var_dump($arr);
 *
*/
if($arr['name']){
    $userInfo['name'] = '<strong>'.$arr['name'].'</strong>';
}
if($arr['address']){
    $userInfo['address'] = $arr['address'];
}
if($arr['phone']){
    $userInfo['phone'] = $arr['phone'];
}
if($arr['tag']){
    $userInfo['tag'] = $arr['tag'];
}

//编辑用户信息
$editInfo = $userInfo;
$editInfo['account'] = $_SESSION['user'];
$editInfo['email'] = $arr['email'];
if($userInfo['name']){
    $editInfo['name'] = $arr['name'];
}
editUserInfo($client,$editInfo);

//返回DATA
echo  json_encode($userInfo);

/*没考虑到用户可能有些文本框未输入值，导致前端刷新匹配错误
 * if($arr['name']){
    echo '<strong>'.$arr['name'].'</strong>';
}
if($arr['address']){
    echo $_SESSION['divisionChar'].$arr['address'];
}
if($arr['phone']){
    echo $_SESSION['divisionChar'].$arr['phone'];
}
if($arr['tag']){
    echo $_SESSION['divisionChar'].$arr['tag'];
}

 */


<<<<<<< HEAD
=======
<?php
require_once '../include.php';

$client = connectionToNeo4j();

$arr['name'] = $_POST['name'];
$arr['email'] = $_POST['email'];
$arr['address'] = $_POST['address'];
$arr['phone'] = $_POST['phone'];
$arr['tag'] = $_POST['tag'];

/*
 * 考虑此处为按钮事件触发，setSelf.php页面未点击按钮时自动赋值为空，迁移至setSelf.php页面
//设定分割字符
$secret = bulidRandomString(2,5).$_SERVER['REMOTE_ADDR'];
$_SESSION['divisionChar'] = '|#|'.md5($secret).'|#|';
//$arr['divisionChar'] = $_SESSION['divisionChar'];
//var_dump($arr);
 *
*/
if($arr['name']){
    $userInfo['name'] = '<strong>'.$arr['name'].'</strong>';
}
if($arr['address']){
    $userInfo['address'] = $arr['address'];
}
if($arr['phone']){
    $userInfo['phone'] = $arr['phone'];
}
if($arr['tag']){
    $userInfo['tag'] = $arr['tag'];
}

//编辑用户信息
$editInfo = $userInfo;
$editInfo['account'] = $_SESSION['user'];
$editInfo['email'] = $arr['email'];
if($userInfo['name']){
    $editInfo['name'] = $arr['name'];
}
editUserInfo($client,$editInfo);

//返回DATA
echo  json_encode($userInfo);

/*没考虑到用户可能有些文本框未输入值，导致前端刷新匹配错误
 * if($arr['name']){
    echo '<strong>'.$arr['name'].'</strong>';
}
if($arr['address']){
    echo $_SESSION['divisionChar'].$arr['address'];
}
if($arr['phone']){
    echo $_SESSION['divisionChar'].$arr['phone'];
}
if($arr['tag']){
    echo $_SESSION['divisionChar'].$arr['tag'];
}

 */


>>>>>>> Stashed changes
=======
>>>>>>> cc9a4e4708ccd394c26f5916d4a5d79dd9e25f5d
