
<html>
<head>
<title>annoucement made</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
	<p>Success</p>
	<p>Annoucement made</p>

<?php
	$con = mysqli_connect("localhost","root","12345qwert");
    
    $db ="toc";

    mysqli_select_db($con,$db);

    $anntime = date("Y-m-d H:i:s");

  	$anncontent = $_GET['ann'];

	mysqli_query($con,"INSERT INTO annoucement (anncontent, anntime) VALUES ('$anncontent', '$anntime')");

	echo $anntime;
?>
<br><br><br><br>
<a href="ahistory.php">Check history</a>
<a href="index.php"><br>back to home page</a>
</body>

</html>
