<?php
$website = file_get_contents('https://www.flypittsburgh.com/');
preg_match_all('/Last updated:(.*)"/',$website,$lastUpdated);
echo "The parking data was last updated on: ".date('Y-m-d H:i:s',strtotime($lastUpdated[1][0]))."\n";
preg_match_all('/<progress value="(.*)" max="100">/',$website,$full);
preg_match_all('/<span id="ctl00_plcMain_plcZoneVideo_lt_zoneInfoBoxes_ParkingInformationBox_repParking_[a-z0-9]+_litParkingName">(.*)?<\/span>/',$website,$car_park);
for ($i=0; $i<=2; $i++) {
   echo $car_park[1][$i]." is ".$full[1][$i]."% full and ".(100 - $full[1][$i])."% empty.\n";
}

/**
 * simple, compact, straightforward
 * good use of regexes
 * should have used phpQuery (it was a required topic)
 */
?>
