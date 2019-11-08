<?php
$content = file_get_contents('https://www.flypittsburgh.com/');
preg_match_all('/Last updated:(.*)?"/',$content,$lastUpdateList);
preg_match_all('/<progress value="(.*)" max="100">/',$content,$full);
preg_match_all('/<span id="ctl00_plcMain_plcZoneVideo_lt_zoneInfoBoxes_ParkingInformationBox_repParking_ctl00_litParkingName">(.*)?<\/span>/',$content,$carParkType);
$empty = 100 - $full[1][0];
$lastUpdate = strtotime($lastUpdateList[1][0]);
echo $carParkType[1][0]." is ".$full[1][0]."% full and ".$empty."% empty. Last updated on ".date('Y-m-d H:i:s',$lastUpdate)."<br>";
preg_match_all('/<span id="ctl00_plcMain_plcZoneVideo_lt_zoneInfoBoxes_ParkingInformationBox_repParking_ctl01_litParkingName">(.*)?<\/span>/',$content,$carParkType);
$empty = 100 - $full[1][1];
$lastUpdate = strtotime($lastUpdateList[1][1]);
echo $carParkType[1][0]." is ".$full[1][1]."% full and ".$empty."% empty. Last updated on ".date('Y-m-d H:i:s',$lastUpdate)."<br>";
preg_match_all('/<span id="ctl00_plcMain_plcZoneVideo_lt_zoneInfoBoxes_ParkingInformationBox_repParking_ctl02_litParkingName">(.*)?<\/span>/',$content,$carParkType);
$empty = 100 - $full[1][2];
$lastUpdate = strtotime($lastUpdateList[1][2]);
echo $carParkType[1][0]." is ".$full[1][2]."% full and ".$empty."% empty. Last updated on ".date('Y-m-d H:i:s',$lastUpdate)."<br>";

/**
 * must make code scallable: use loops
 * good use of regexes
*/
?>
