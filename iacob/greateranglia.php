<?php

require 'phpQuery.php';

$url = "https://www.greateranglia.co.uk/contact-us/faqs/car-parking-0";
$file = file_get_contents($url);

$doc = phpQuery::newDocument($file);

foreach(pq('.carpark-info') as $carParkContainer) {

    $carParkID = pq($carParkContainer)->attr('id');
    $carParkIDNumber = ltrim($carParkID,"carpark-anchor-");

    $carParkInfo = file_get_contents('https://www.greateranglia.co.uk/ajax/live_carpark/'.$carParkIDNumber);
    $carPark = json_decode($carParkInfo,true);
    $lastUpdate = strtotime($carPark['time_of_status']);
    $lastUpdate = date ('H:i:s', $lastUpdate);
    echo $carPark['carpark_name'].": available ".$carPark['current_free_spaces']." spaces, last updated at ".$lastUpdate."\n";
}


?>