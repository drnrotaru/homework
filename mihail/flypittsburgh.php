<?php

require "phpQuery.php";//statement includes phpQuery library 

$url = 'https://www.flypittsburgh.com/'; //target website

$file = file_get_contents('https://www.flypittsburgh.com/');//gets content of target website and creates an object out of it

$doc = phpQuery::newDocument($file);//creates a phpQuery document out of content file



$orig_date = pq('.infoBox.parking > section')->attr('title');
// gets 'Last updated' value, which is equal for all 3 elements.

$date_array = (date_parse($orig_date));
// this function looks for date-time inside the string and builds associative array out of date-time values if successfull.

$result_date = date('Y-m-d H:i:s', mktime ($date_array['hour'], $date_array['minute'], $date_array['second'], $date_array['month'], $date_array['day'], $date_array['year'])); // date() formats date, mktime() returns elements from the array.

$date_time = 'Last updated: ' . $result_date; //last update time in 'Y-m-d H:i:s' format 

$max = 100; //max % value



$parks = array(

$p1 = pq ('.infoBox.parking > section:nth-child(2) > h3')->text(),//Parking names array
$p2 = pq ('.infoBox.parking > section:nth-child(3) > h3')->text(),
$p3 = pq ('.infoBox.parking > section:nth-child(4) > h3')->text()
);



$x = array(

$x1 = pq('.infoBox.parking > section:nth-child(2) > progress')->attr('value'),// fullness values progress array
$x2 = pq('.infoBox.parking > section:nth-child(3) > progress')->attr('value'),
$x3 = pq('.infoBox.parking > section:nth-child(4) > progress')->attr('value')
);


$y = array(

$y1 = $max - $x1,//emptiness values array
$y2 = $max - $x2,
$y3 = $max - $x3
);



$item = new Multipleiterator();// function to combine 3 arrays. iterates through all attached iterators
$item->attachIterator(new ArrayIterator($parks));//function attaches iterator information
$item->attachIterator(new ArrayIterator($x));
$item->attachIterator(new ArrayIterator($y));


$newArray = array();//new array created 

foreach($item as $value){//loops over all values
list($value1, $value2, $value3) = $value;//list of variables
echo '<ul>' . $value1 , ' is ' , $value2, '% full and ', $value3, '% empty. ' . $date_time . '</ul>';

}

/**
 * include all necessary dependencies in the project
 * recommendation | check out strtotime()
 * must make code scallable: use loops
 * reduce unnecessary code
 * makes use of a wide range of programming concepts, but: "the simpler, the better!"
 * recommendation | check out array[] , array_push()
 */
?>