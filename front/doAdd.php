<?php
require_once '../include.php';

$login_user = $_REQUEST['login_user'];
$friend = $_REQUEST['friend'];

$client = connectionToNeo4j();
$fpeople = addFriend($client, $login_user, $friend);

if($fpeople){
	alertMes("add friend success..", "index.php?fpeople={$fpeople}");
}