<?php
require_once '../include.php';

function createFeedbackNode($client,$arr){
    $cypher = <<<EOQ
    MERGE (fed:feedBack{
        account:"{$arr['account']}",
        email:"{$arr['email']}",
        phone:"{$arr['phone']}",
        message:"{$arr['message']}"
        })
    RETURN id(fed) as id
EOQ;
    $results = $client->run($cypher);
    $result = $results->records();
    foreach ($result as $record){
        $fedID = $record->get('id');
    }
    return $fedID;
}
function jointUserToFeedback($client,$arr){
    $cypher = <<<EOQ
    MATCH (user:userPeople),(mes:feedBack)
    WHERE user.account = "{$arr['account']}" AND mes.account = "{$arr['account']}"
    CREATE (user)-[rel:RETROACTION {time:"{$arr['time']}",browserVersion:"{$arr['version']}"} ]->(mes)
    RETURN 1
EOQ;
    $results = $client->run($cypher);
    $result = $results->records();
    return $result;
}