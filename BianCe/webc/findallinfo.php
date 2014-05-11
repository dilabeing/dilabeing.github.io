<?php

// Include the library
include('simple_html_dom.php');

// Retrieve the DOM from a given URL
$html = file_get_html('projectd/Equipment _ Dota Trade.htm');


// Find all TD tags with "align=center"
for ($i=0; $i < 11; $i++) { 
	$e = $html->find('span.name', $i)->plaintext;
	$pieces = explode(" ", $e);
    echo $pieces[1].'<br>';
}
 
?>

