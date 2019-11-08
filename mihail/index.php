<?php


//create an array of urls
$urls = array(
    'https://www.greateranglia.co.uk/ajax/live_carpark/1007',
    'https://www.greateranglia.co.uk/ajax/live_carpark/6',
    'https://www.greateranglia.co.uk/ajax/live_carpark/7',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1000',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1045',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1044',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1049',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1048',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1047',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1043',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1023',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1058',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1066',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1046',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1060',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1065',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1071',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1059',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1073',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1075',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1057',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1086',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1087',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1102',
    'https://www.greateranglia.co.uk/ajax/live_carpark/1056'

);

//count number of urls
$url_count = count($urls);

//declare an empty array
$curl_arr = array();

//create cURL multidescriptor
$master = curl_multi_init();


for ($i = 0; $i < $url_count; $i++) {//loop starting from 1st element and stop when reaches $url_count value incrementing every next value by 1
    $url = $urls[$i];
    $curl_arr[$i]= curl_init($url);//initialize cURL session
    curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);//set cURL option. return value to variable instead of printing out
    curl_multi_add_handle($master, $curl_arr[$i]);//add regular descriptor from 'curl_init()' to the set of descriptors 'curl_multi_init()'
}

//run http request
do {
    curl_multi_exec($master, $running);
} while ($running > 0);


for ($i = 0; $i < $url_count; $i++) {
    $results = curl_multi_getcontent($curl_arr[$i]);

    //create arrays out of json data
    $park_arrays = json_decode($results, true);

    echo $park_arrays['carpark_name'] .'.' . ' ' . 'Current occupancy:' . ' ' . $park_arrays['current_occupancy']. '.' . ' ' . 'Current free spaces:' . ' ' . $park_arrays ['current_free_spaces']. '.' . ' ' . 'Spaces capacity:'. ' '. $park_arrays['spaces_capacity'].'.'. ' '.'Current occupancy percentage:' . ' ' . $park_arrays['current_percentage_occupancy'].'%'.'.'. ' ' . 'Updated:' . ' ' . date('Y-m-d'). ' ' .$park_arrays['time_of_status'].'<p>';
}
