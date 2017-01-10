<?php
require_once '../include.php';

/*$client = connectionToNeo4j();
$query = <<<EOQ
    MATCH (n)
    WHERE n.account = 'glombing'
    SET n.address = '辽宁省大连市'
EOQ;

$client->run($query);*/

//echo $_SERVER['HTTP_USER_AGENT'];

$arr['name'] = 'wretgr';
$arr['email'] = 'ewfced';
$arr['phone'] = 'wretgr';
$arr['tag'] = '23456';
$keys = array_keys($arr);
foreach ($keys as $key) {
    switch ($key) {
        case "name":
            echo "111";
            echo "<br>";
            unset($arr['name']);
            continue;
        case "email":
            echo "222";
            echo "<br>";
            unset($arr['email']);
            continue;
        case "phone":
            echo "333";
            echo "<br>";
            unset($arr['phone']);
            continue;
        case "tag":
            echo "444";
            echo "<br>";
            unset($arr['tag']);
            continue;
    }
}
var_dump($arr);