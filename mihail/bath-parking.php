<?php


	$locations = json_decode(file_get_contents('https://data.bathhacked.org/resource/u3w2-9yme.json'));
	//variable gets decoded json content
	
	foreach ($locations as $location) {
	//function starts looping through the values of json elements

		$timestamp = $location->lastupdate;
		//this variable gets 'lastupdate' value

		$pattern = '/T((?:(?:[0-1][0-9])|(?:[2][0-3])|(?:[0-9])):(?:[0-5][0-9])(?::[0-5][0-9])?(?:\\s?(?:am|AM|pm|PM))?)\.\d\d\d/'; 
		//regex pattern to define set of specific characters in 'lastupdate' element 

		$yyyymmdd = preg_replace($pattern, " ", $timestamp);
		//function replacing specified characters with whitespaces, assigned to yyyymmdd variable.

		$table = '<ul><b>'.$location->name.'</b><br>Status: '.$location->status.', Occupancy: '.$location->occupancy.'. This parking was last updated on: '.$yyyymmdd.'</ul>';
		//variable listing elements and their values
		
		echo $table;
	  
	} //end of loop
	
/**
 * NOTE: tested on http://phpfiddle.org/
 * recommendation | check out json_decode() second parameter
 * complicated choice using regexes, but good understanding of them
 * recommendation | check out substr(), strtotime(), date()
 */
?>