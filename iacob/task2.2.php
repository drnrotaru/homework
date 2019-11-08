<?php
include('simple_html_dom.php');
$page = file_get_html('https://www.flypittsburgh.com/');
$infoBox = $page->find('section[class="infoBox parking"]',0);
$parkingLots = $infoBox->find('section');
for($i=0; $i<count($parkingLots); $i++) {
    $lotType = $parkingLots[$i]->find('span',0)->plaintext;
    $status = $parkingLots[$i]->find('progress',0);
    $full = $status->value;
    $empty = $status->max - $status->value;
    $lastUpdate = date('Y-m-d H:i:s', strtotime(ltrim($parkingLots[$i]->title,"Last update:")));
    echo $lotType." is ".$full."% full and ".$empty."% empty, last updated on ".$lastUpdate."<br>";
}

/**
 * include all necessary dependencies in the project
 * simple, compact, straightforward
 * should have used phpQuery (it was a required topic)
 */
?>
