
<html>
<head>
<title>NTU Taekwondo Open Championship</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
	<p>Thank you for your feedback :)<br></p>
	<p>Feedback submitted on </p>

<?php
	$con = mysqli_connect("localhost","root","12345qwert");
    
    $db ="toc";

    mysqli_select_db($con,$db);

    $fbtime = date("Y-m-d H:i:s");

  	$fbcontent = $_GET['content'];

  	$fbinstitute = $_GET['institute'];

	$file = "./feedback.txt";

	mysqli_query($con,"INSERT INTO feedback (fbinstitute, fbcontent, fbtime)		
	VALUES ('$fbinstitute', '$fbcontent', '$fbtime')");

	echo $fbtime;
?>
<a href="index.html" class="input"><br><br><br>Back to home page</a>
</body>

</html>
