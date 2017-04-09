<<<<<<< HEAD
<<<<<<< Updated upstream
=======
>>>>>>> cc9a4e4708ccd394c26f5916d4a5d79dd9e25f5d
<?php
require_once '../include.php';

$account = $_POST['account'];
echo $account;
<<<<<<< HEAD
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
=======
>>>>>>> cc9a4e4708ccd394c26f5916d4a5d79dd9e25f5d
