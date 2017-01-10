<?php
require_once '../include.php';

$client = connectionToNeo4j();

// setup data
$insert_query = <<<EOQ
UNWIND {pairs} as pair
MERGE (p1:Person {name:pair[0]})
MERGE (p2:Person {name:pair[1]})
MERGE (p1)-[:KNOWS]-(p2);
EOQ;

// friend data to insert
$data = [["Jim","Mike"],["Jim","Billy"],["Anna","Jim"],
		["Anna","Mike"],["Sally","Anna"],["Joe","Sally"],
		["Joe","Bob"],["Bob","Sally"]];

// insert data
$client->run($insert_query, ["pairs" => $data]);


// friend of friend: query
$foaf_query = <<<EOQ
MATCH (person:Person)-[:KNOWS]-(friend)-[:KNOWS]-(foaf)
WHERE person.name = {name}
  AND NOT (person)-[:KNOWS]-(foaf)
RETURN foaf.name AS name
EOQ;

// friend of friend: build and execute query
$params = ['name' => 'Joe'];
$result1 = $client->run($foaf_query, $params);
//print_r($result1);
foreach ($result1->records() as $record1) {
	print_r($record1->get('name') . PHP_EOL) ;
}


// common friends: query
$common_friends_query = <<<EOQ
MATCH (user:Person)-[:KNOWS]-(friend)-[:KNOWS]-(foaf:Person)
WHERE user.name = {user} AND foaf.name = {foaf}
RETURN friend.name AS friend
EOQ;

// common friends: build and execute query
$params = ['user' => 'Joe', 'foaf' => 'Sally'];
$result2 = $client->run($common_friends_query, $params);

foreach ($result2->records() as $record2) {
	print_r($record2->get('friend') . PHP_EOL) ;
}

// connecting paths: query
$connecting_paths_query = <<<EOQ
MATCH path = shortestPath((p1:Person)-[:KNOWS*..6]-(p2:Person))
WHERE p1.name = {name1} AND p2.name = {name2}
RETURN [n IN nodes(path) | n.name] as names
EOQ;

// connecting paths: build and execute query
$params = ['name1' => 'Joe', 'name2' => 'Billy'];
//$result3 = $client->run($connecting_paths_query, $params);

$result3 = queryNeo($client, $connecting_paths_query,$params);

foreach ($result3->records() as $record3) {
	print_r($record3->get('names'));
}