<?php
require_once '../vendor/autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;

function connectionToNeo4j(){
	$client = ClientBuilder::create()
	->addConnection('default', 'http://neo4j:xspyyer@localhost:7474') // HTTP connection configuration (port is optional)
	->build();
	return $client;
}

// cypher Query : with params
function queryNeo($client,$cypher,$params=NULL){
	$params = $params==NULL?NULL:$params;
	$result = $client->run($cypher,$params);
	return $result;
}

//cypher Query : without params
function queryAllNeo($client,$cypher){
	$result = $client->sendCypherQuery($cypher)->getResult();
	return $result;
}

//cypher Query : getNodesinfo:getId(),getProperty("PropertyName"),getLable()
function NeoGetNodesInfo($client,$cypher){
	$result = $client->sendCypherQuery($cypher)->getResult();
	$nodes = $result->getNodes();
	return $nodes;
}

//cypher Query : getRelationshipInfo:getStartNode()->getId(),getEndNode()->getId(),getType()
function NeoGetRelInfo($client,$cypher){
	$result = $client->sendCypherQuery($cypher)->getResult();
	$rels = $result->getRelationships();
	return $rels;
}

//



