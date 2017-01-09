<?php
require_once '../include.php';

function queryAciveByName($client,$login_user){
	$cypher = <<<EOQ
	MATCH (user:Person)
	WHERE user.name = "{$login_user}" 
	MATCH (active:Active)
	MATCH (user)-[r:HAS_BOUGHT]-(active)
	RETURN active.name as acName, active.img as acIMG, active.data as acData, active.context as acContext
EOQ;
	//echo $cypher;
	$results = $client->run($cypher);
	$result = $results->records();
	//print_r($result);
	foreach ($result as $record){
		$acResult['acName'] = $record->get('acName');
		$acResult['acIMG'] = $record->get('acIMG');
		$acResult['acData'] = $record->get('acData');
		$acResult['acContext'] = $record->get('acContext');
		$acResults[] = $acResult;
	}
	return $acResults;
}

function queryActiveRel($client,$login_user){
	$cypher = <<<EOQ
	MATCH (user:Person)
	WHERE user.name = "{$login_user}"
	MATCH (friend:Person)
	MATCH (factive:Active)
	MATCH (user)-[r1:KNOWS]-(friend)-[r2:HAS_BOUGHT]-(factive)
	RETURN factive.name as facName, factive.img as facIMG, factive.data as facData, factive.context as facContext
EOQ;
	//echo $cypher;
	$results = $client->run($cypher);
	$result = $results->records();
	//print_r($result);
	foreach ($result as $record){
		$facResult['facName'] = $record->get('facName');
		$facResult['facIMG'] = $record->get('facIMG');
		$facResult['facData'] = $record->get('facData');
		$facResult['facContext'] = $record->get('facContext');
		$facResults[] = $facResult;
	}
	return $facResults;
}


