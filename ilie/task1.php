<?php
$json_data = file_get_contents("https://data.bathhacked.org/resource/u3w2-9yme.json");
$data = json_decode($json_data, true);
foreach ($data as $location) {
   echo $location['name'].": status ".$location['status'].", occupancy ".$location['occupancy'];
   $timestamp = strtotime($location['lastupdate']);
   echo ". This carpark was last updated on ".date('Y-m-d', $timestamp)." day.\n";
}

/**
 * simple, compact, straightforward
 */
?>
