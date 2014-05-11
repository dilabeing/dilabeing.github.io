<?php
$base=0.4;
for ($i=0; $i < 100; $i++) { 
	$val1=$base*0.85;
	$val2=$base/0.85;

	$val1 = number_format($val1, 2, '.', '');
	$base = number_format($base, 2, '.', '');
	$val2 = number_format($val2, 2, '.', '');
	echo $val1.'-----';
	echo $base.'-----';
	echo $val2.'-----<br>';
	$base = $base + 0.1;
}

?>