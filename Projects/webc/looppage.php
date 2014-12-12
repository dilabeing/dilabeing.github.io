<?php
	include('simple_html_dom.php');

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
				}

			$page=$page+1;
			$url = $baseurl.'+mythical';
			echo $url.'<br>';

		}
	?>