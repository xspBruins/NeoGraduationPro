<?php
require_once '../include.php';

function getAllInfoByacc($client,$user){
    $cypher = <<<EOQ
    MATCH (user:userPeople)
    WHERE user.account = "{$user}"
    RETURN user.name as name,user.account as account,user.email as email,user.avatarImg as avatarImg,user.address as address,user.phone as phone,user.tag as tag
EOQ;
    $results = $client->run($cypher);
    $result = $results->records();
    foreach ($result as $record){
        $Info['name'] = $record->get('name');
        $Info['account'] = $record->get('account');
        $Info['email'] = $record->get('email');
        $Info['avatarImg'] = $record->get('avatarImg');
        $Info['address'] = $record->get('address');
        $Info['phone'] = $record->get('phone');
        $Info['tag'] = $record->get('tag');
    }
    return $Info;
}
function verifyAccountByEmail($client,$arr){
    $cypher = <<<EOQ
    MATCH (user:userPeople)
    WHERE user.account = "{$arr['account']}" AND user.email = "{$arr['email']}"
    RETURN 1
EOQ;
    $results = $client->run($cypher);
    $result = $results->records();
    return $result;
}
function setNewPassword($client,$arr){
    $cypher = <<<EOQ
    MATCH (user:userPeople)
    WHERE user.account = "{$arr['account']}" AND user.email = "{$arr['email']}"
    SET user.password = "{$arr['password']}"
    RETURN 1
EOQ;
    $results = $client->run($cypher);
    $result = $results->records();
    return $result;
}
function checkAccount($client,$parama){
    $cypher = <<<EOQ
    MATCH (acc:userPeople)
    WHERE acc.account = "{$parama}"
    RETURN 1
EOQ;
    $results = $client->run($cypher);
    $result = $results->records();
    return $result;
}
function addUser($client,$add){
	$insert_query = <<<EOQ
	MERGE ({$add['uname']}:userPeople {
	name:"{$add['uname']}",
	account:"{$add['acc']}",
	password:"{$add['pass']}",
	qq:"{$add['qq']}",
	email:"{$add['email']}",
	phone:"{$add['phone']}",
	tag:"{$add['tag']}",
	address:"{$add['address']}"
    });
EOQ;
	//echo $insert_query;
	$client->run($insert_query);
	
}

function queryUserbyAccount($client,$arr){
	$cypher = <<<EOQ
	MATCH (user:userPeople)
	WHERE user.account = "{$arr['account']}" AND user.password = "{$arr['pword']}"
	RETURN user.account as account
EOQ;

	$results = $client->run($cypher);
	$result = $results->records();

	foreach ($result as $record){
		$login_user = $record->get('account');
	}
	return $login_user;
}

function queryUserbyName($client,$arr){
    $cypher = <<<EOQ
	MATCH (user:userPeople)
	WHERE user.name = "{$arr['name']}" AND user.password = "{$arr['pword']}"
	RETURN user.name as name,user.account as account
EOQ;
	
    $results = $client->run($cypher);
    $result = $results->records();

    foreach ($result as $record){
        $login_user = $record->get('account');
    }
    return $login_user;
}

function queryUserbyPhone($client,$arr){
    $cypher = <<<EOQ
	MATCH (user:userPeople)
	WHERE user.phone = "{$arr['phone']}" AND user.password = "{$arr['pword']}"
	RETURN user.phone as phone,user.account as account
EOQ;

    $results = $client->run($cypher);
    $result = $results->records();

    foreach ($result as $record){
        $login_user = $record->get('account');
    }
    return $login_user;
}

function judgeAcc($client,$parama){
    $cypher = <<<EOQ
    MATCH (user:userPeople)
    WHERE user.account = "{$parama}"
    RETURN user.account as account
EOQ;
    $results = $client->run($cypher);
    $result = $results->records();
    return $result;
}
function judgeName($client,$parama){
    $cypher = <<<EOQ
    MATCH (user:userPeople)
    WHERE user.name = "{$parama}"
    RETURN user.name as name
EOQ;
    $results = $client->run($cypher);
    $result = $results->records();
    return $result;
}
function judgePhone($client,$parama){
    $cypher = <<<EOQ
    MATCH (user:userPeople)
    WHERE user.phone = "{$parama}"
    RETURN user.phone as phone
EOQ;
    $results = $client->run($cypher);
    $result = $results->records();
    return $result;
}

function getPerson($client){
	$cypher=<<<EOQ
	MATCH (n:Person)
    RETURN n.name as pName,n.age as pAge,n.img as pIMG
    SKIP 6
	LIMIT 3
EOQ;

	$results = $client->run($cypher);
	$result = $results->records();

	foreach ($result as $record){
		$people['pName'] = $record->get('pName');
		$people['pAge'] = $record->get('pAge');
		$people['pIMG'] = $record->get('pIMG');
		$peoples[] = $people;
	}
	return $peoples;
}

function addFriend($client,$login_user,$friend){
	$cypher = <<<EOQ
	MATCH (user:Person),(friend:Person)
	WHERE user.name="{$login_user}" AND friend.name="{$friend}"
	CREATE (user)-[:KNOWS]->(friend)
	RETURN friend.name as fName,friend.age as fAge,friend.img as fIMG
EOQ;
	$results = $client->run($cypher);
	$result = $results->records();
	foreach ($result as $record){
		$fpeople = $record->get('fName');
	}
	return $fpeople;
}



