<?php

require 'phpQuery.php';

$map = [
    'Broxbourne Station'           => 'https://www.greateranglia.co.uk/ajax/live_carpark/1007',
    'Ipswich Surface'              => 'https://www.greateranglia.co.uk/ajax/live_carpark/6',
    'Ipswich MSCP'                 => 'https://www.greateranglia.co.uk/ajax/live_carpark/7',
    'Cambridge Station'            => 'https://www.greateranglia.co.uk/ajax/live_carpark/1000',
    'Cheshunt Station'             => 'https://www.greateranglia.co.uk/ajax/live_carpark/1045',
    'Hatfield Peveral'             => 'https://www.greateranglia.co.uk/ajax/live_carpark/1044',
    'Whittlesford Parkway CP2'     => 'https://www.greateranglia.co.uk/ajax/live_carpark/1049',
    'Whittlesford Parkway CP1b'    => 'https://www.greateranglia.co.uk/ajax/live_carpark/1048',
    'Whittlesford Parkway CP1a'    => 'https://www.greateranglia.co.uk/ajax/live_carpark/1047',
    'Audley End Station'           => 'https://www.greateranglia.co.uk/ajax/live_carpark/1043',
    'Colchester - Main Deck'       => 'https://www.greateranglia.co.uk/ajax/live_carpark/1023',
    'Diss Station'                 => 'https://www.greateranglia.co.uk/ajax/live_carpark/1058',
    'Ingatestone Main'             => 'https://www.greateranglia.co.uk/ajax/live_carpark/1066',
    'Kelvedon Station'             => 'https://www.greateranglia.co.uk/ajax/live_carpark/1046',
    'Rayleigh Station'             => 'https://www.greateranglia.co.uk/ajax/live_carpark/1060',
    'Wickford Station'             => 'https://www.greateranglia.co.uk/ajax/live_carpark/1065',
    'Harlow Main CP'               => 'https://www.greateranglia.co.uk/ajax/live_carpark/1071',
    'Witham Station'               => 'https://www.greateranglia.co.uk/ajax/live_carpark/1059',
    'Marks Tey Main CP'            => 'https://www.greateranglia.co.uk/ajax/live_carpark/1073',
    'Marks Tey Station Rd'         => 'https://www.greateranglia.co.uk/ajax/live_carpark/1075',
    'Manningtree'                  => 'https://www.greateranglia.co.uk/ajax/live_carpark/1057',
    'Shenfield Hunter Ave'         => 'https://www.greateranglia.co.uk/ajax/live_carpark/1086',
    'Shenfield Mount Rd'           => 'https://www.greateranglia.co.uk/ajax/live_carpark/1087',
    'Billericay Station'           => 'https://www.greateranglia.co.uk/ajax/live_carpark/1102',
    'Bishops Stortford'            => 'https://www.greateranglia.co.uk/ajax/live_carpark/1056'
    ];


foreach($map as $index => $link) {
    $source = file_get_contents($link);
    $jsonArray = json_decode($source, true);
    $parkName = $jsonArray['carpark_name'];
    $parkFreeSpaces = $jsonArray['current_free_spaces'];
    $parkHourUpdated = $jsonArray['time_of_status'];
    $parkFullDateUpdated = date('d-m-Y H:i:s', strtotime(date('d-m-Y') . $parkHourUpdated));
    echo $parkName . ' has ' . $parkFreeSpaces . ' free spaces. Was last updated on ' . $parkFullDateUpdated . ".\n";
}

?>