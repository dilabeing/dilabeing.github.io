<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="css/usergallery.css">
<link rel="stylesheet" type="text/css" href="css/backbtn.css">
</head>

<body>
<?php
$con = mysqli_connect("localhost","root","12345qwert");
        //select database
        $db ="webservice";
        mysqli_select_db($con,$db);

        //sql query lines
        //two similar sql query for testing
        $mysqli="TRUNCATE TABLE images";
        mysqli_query($con,$mysqli);
?>

<h1>You have successfully deleted the photos in the Database.</h1>
<div class="backbut">
    <a href="gallery.html">Back</a>
</div>
</body></html>