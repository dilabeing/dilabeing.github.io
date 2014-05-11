<?php

// Include the library
include('simple_html_dom.php');
 
// Retrieve the DOM from a given URL
$html = file_get_html('projectd/Equipment.htm');

// Find all TD tags with "align=center"
foreach($html->find('span.name') as $e)
    echo $e->innertext . '<br>';
?>