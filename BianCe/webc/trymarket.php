<?php
	include('simple_html_dom.php');



	$con = mysqli_connect("localhost","root","12345qwert");
	//select database
	$db ="dota2";
	mysqli_select_db($con,$db);

	$url='http://steamcommunity.com/market/search?q=appid%3A570';
	$baseurl='http://steamcommunity.com/market/search?q=appid%3A570';

	$page=1;

		while( $page < 4 )

		{			
			echo $page.'<br><br><br>';
			
			$html = file_get_html($url);

				for ($i = 0; $i <10; $i++){
					$result = $html->find('div.market_listing_row', $i)->plaintext;

					//$pieces = explode(" ", $result);
					$pieces=preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $result);
					$itemname=$html->find('span.market_listing_item_name', $i)->plaintext;

					$itemprice=$pieces[3];
					echo $itemname;
					echo '-------';
					echo $itemprice.'<br>';

				/*	mysqli_query($con," INSERT INTO `dota2`.`allitemcurrentprice` 
				    
				    (`name`, `price`) 
				    VALUES 
				    ('$itemname', '$itemprice');");*/
				}

			$page++;
			$url = $baseurl.'#p'.$page;
			echo $url;
			$html = 0;

		}/*

	mysqli_query($con,"UPDATE allitemcurrentprice
	SET price = REPLACE(REPLACE(REPLACE(price, '&#36;', ''), '@', ''), '%', '')");*/

	?>