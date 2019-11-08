<?php

$link1 = file_get_contents('https://data.bathhacked.org/resource/u3w2-9yme.json');
$firstArray = json_decode($link1, true);

for ($i = 0; $i < count($firstArray); $i++) {

	echo $firstArray[$i]["name"] . ", " . $firstArray[$i]["status"] . ", " . $firstArray[$i]["occupancy"] . ".";
	echo " This carpark was last updated on " . date("Y-m-d", strtotime($firstArray[$i]["lastupdate"])) . ".\n";

}

/**
 * simple, compact, straightforward
 * recommendation | check out foreach()
 */
?>