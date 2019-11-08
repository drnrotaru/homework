<?php

require 'phpQuery.php';

$link2 = file_get_contents('https://www.flypittsburgh.com/');
$doc = phpQuery::newDocument($link2);
$parkingInfo = $doc->find('.infoBox.parking');

foreach ($parkingInfo['section'] as $typePark) {
	$namePark = pq($typePark)->find('span:eq(0)')->text();
	$percentFull = substr(pq($typePark)->find('span:eq(1)')->text(), 0, 2);
	$percentEmpty = 100 - $percentFull;
        $lastUpdated = pq($typePark)->attr('title');
	$dateUpdated = date("Y-m-d H:i:s", strtotime(substr($lastUpdated, 13)));
	echo 'Car park type ' . $namePark . ' is ' . $percentFull . '% full and ' . $percentEmpty . '% empty. Was last updated on ' . $dateUpdated . ".\n";
}

/**
 * very nice: simple, compact, straightforward
 * recommendation | check out str_replace() + trim() instead of substr()
 */
?>