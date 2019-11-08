<?php
$doc = file_get_contents('https://data.bathhacked.org/resource/u3w2-9yme.json');
$list = json_decode($doc, true);
foreach ($list as $parkingLot) {
    echo $parkingLot['name'].": status ".$parkingLot['status'].", capacity ".$parkingLot['capacity'].". ";
    $lastUptade = strtotime($parkingLot['lastupdate']);
    $lastUptade = date('Y-m-d', $lastUptade);
    echo "This carpark was last updated on ".$lastUptade." day <br>";
}

/**
 * simple, compact, straightforward
 */
?>
