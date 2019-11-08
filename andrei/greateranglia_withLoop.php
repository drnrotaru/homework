<?php

require 'phpQuery.php';

$source = file_get_contents('https://www.greateranglia.co.uk/contact-us/faqs/car-parking-0');
$doc = phpQuery::newDocument($source);
$liveOccupancy = $doc->find('#collapsefaqs-panel-4');

foreach ($liveOccupancy['div.carpark-info'] as $index) {
    $parkID = substr(pq($index)->attr('id'), 15);
    $parkInfoSource = file_get_contents('https://www.greateranglia.co.uk/ajax/live_carpark/' . $parkID);
    $jsonArray = json_decode($parkInfoSource, true);
    $parkName = $jsonArray['carpark_name'];
    $parkFreeSpaces = $jsonArray['current_free_spaces'];
    $parkHourUpdated = $jsonArray['time_of_status'];
    $parkFullDateUpdated = date('d-m-Y H:i:s', strtotime(date('d-m-Y') . $parkHourUpdated));
    echo $parkName . ' has ' . $parkFreeSpaces . ' free spaces. Was last updated on ' . $parkFullDateUpdated . ".\n";
}

?>