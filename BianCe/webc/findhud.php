<?php

// Include the library
include('simple_html_dom.php');

	$con = mysqli_connect("localhost","root","12345qwert");
	//select database
	$db ="dota2";
	mysqli_select_db($con,$db);
 

// Retrieve the DOM from a given URL
$html = file_get_html('projectd/huds.htm');
// Find all SPAN tags that have a class of "myClass"

 for ($i=0; $i < 999999; $i++) { 
 	if ($html->find('span.name', $i)) {
 		
 		$name = $html->find('span.name', $i)->plaintext;

		echo $name . '<br>';

		//here check the rarity
		$e = $html->find('tr[itemscope=""]', $i)->plaintext;
		$pieces = explode(" ", $e);
		foreach ($pieces as $key) {
		//echo $key.' ';
		switch ($key) {
			case 'common':
				$rarity='common';
				break;

			case 'uncommon':
				$rarity='uncommon';
				break;

			case 'rare':
				$rarity='rare';
				break;

			case 'mythical':
				$rarity='mythical';
				break;

			case 'immortal':
				$rarity='immortal';
				break;

			case 'ancient':
				$rarity='ancient';
				break;

			case 'legendary':
				$rarity='legendary';
				break;

			case 'arcana':
				$rarity='arcana';
				break;			
				}
			}
		echo "This item's rarity is ".$rarity.'<br><br>';
	
		mysqli_query($con," INSERT INTO `dota2`.`hud` 
				    
				    (`name`, `rarity`) 
				    VALUES 
				    ('$name', '$rarity');");
		/*
		//find the img outertext
		$e = $html->find('img[itemprop="image"]', $i);
    	echo $e->outertext . '<br>';*/

 	}
 	else $i=9999999;
 }
?>

