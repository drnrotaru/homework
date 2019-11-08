<?php

require_once 'phpQuery.php';


$mainURL = 'https://local.biglots.com/';
$content = file_get_contents($mainURL);
$doc = phpQuery::newDocument($content);

$headers = ["referer: $mainURL"];


//Step #1: Fetch the main page and process (get State URL).

$vermont = pq("li:nth-child(42) a");
if (isset($vermont)) {
	$stateURL = $mainURL . pq($vermont)->attr('href');
	$headers = ["referer: $mainURL"];
}

//Step #2: Fetch the state pages and process (get all City URLs').


foreach (pq('div.Directory-content ul li a') as $city) {
    $cityURL = rtrim($mainURL, "/") . pq($city)->attr('href');
	$headers = ["referer: $mainURL"];
}

?>