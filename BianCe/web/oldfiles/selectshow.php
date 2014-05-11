<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
<title>Your Photo Gallery</title>
<style>
body {
font-family:Arial, Helvetica, sans-serif;
background:#36d7b7;
font-size:11px;
}

div{
	font-family: sans-serif;
	color: red;
	border: 5px;
	border-radius: 2px;

}

p{
	font-size: 50px;
}

.image{
	height:600px;
}

p{
text-align: left;
font-size:;
font-family:;}

</style>
</head>

<body>
	<div>
		<div style="text-align:center;">
		<a href="main.html"><img class="image" src="img/temp1.jpg" alt="" name="temp1.jpg"/></a>
		<p><?php  
		$file = './showtxt.txt';
		$document = file_get_contents($file);
		$lines = explode("\n", $document);
		foreach($lines as $newline) {
		echo $newline . '<br>';
		}
		?></p></div>

	</div>
</body>
</html>
