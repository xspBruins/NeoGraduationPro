<<<<<<< Updated upstream
<?php
require_once '../include.php';

$account = $_POST['account'];
echo $account;
=======
<?php
require_once '../include.php';

$act = $_POST['act'];
$account = $_POST['account'];
$filename = $_SESSION['avatarFileName'];

$client = connectionToNeo4j();
$arr['account'] = $account;
$arr['filename'] = $filename;
if($act == "frontChange"){
    //修改neo4j-user头像
    $avatarImg = editUserAvatar($client, $arr);
    echo $avatarImg;
}
>>>>>>> Stashed changes
