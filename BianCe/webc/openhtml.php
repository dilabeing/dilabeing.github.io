<?php
//this php file is to save a website via provided url

$homepage = file_get_contents('http://steamcommunity.com/market/search?q=appid%3A570+rare#p5');
echo $homepage;

?>