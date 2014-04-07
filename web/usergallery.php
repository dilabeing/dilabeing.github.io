<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link rel="stylesheet" type="text/css" href="css/usergallery.css">
<link rel="stylesheet" type="text/css" href="css/backbtn.css">
</head>

<body>

<div id="slideShowContainer">
    <p><br></p>
  
    <div id="slideShow">
    
      <ul>
          <li style="z-index: 4;"><img width="580px" height="580px"      style="-webkit-transform: rotate(0rad);" src="<?php

//load and connect to MySQL database stuff
$con = mysqli_connect("localhost","root","12345qwert");
        //select database
        
$db ="webservice";
mysqli_select_db($con,$db);

$result1 = mysqli_query($con, "SELECT * FROM images WHERE ID='1'");
while($row1 = mysqli_fetch_array($result1))
  {
    echo 'img/temp/';
  echo $row1['Filename'];
  }?>" ></li> 
            <li style="z-index: 3;"><img width="580px" height="580px" alt="Ancient" style="-webkit-transform: rotate(-1.5707963267948966rad);" src="<?php

//load and connect to MySQL database stuff
$con = mysqli_connect("localhost","root","12345qwert");
        //select database
        
$db ="webservice";
mysqli_select_db($con,$db);

$result2 = mysqli_query($con, "SELECT * FROM images WHERE ID='2'");
while($row2 = mysqli_fetch_array($result2))
  {
    echo 'img/temp/';
  echo $row2['Filename'];
  }?>" ></li>
            <li style="z-index: 2;"><img src="<?php

//load and connect to MySQL database stuff
$con = mysqli_connect("localhost","root","12345qwert");
        //select database
        
$db ="webservice";
mysqli_select_db($con,$db);

$result3 = mysqli_query($con, "SELECT * FROM images WHERE ID='3'");
while($row3 = mysqli_fetch_array($result3))
  {
    echo 'img/temp/';
  echo $row3['Filename'];
  }?>" width="580px" height="580px" alt="Industry" style="-webkit-transform: rotate(-3.141592653589793rad);"></li>
            <li style="z-index: 1;"><img src="<?php

//load and connect to MySQL database stuff
$con = mysqli_connect("localhost","root","12345qwert");
        //select database
        
$db ="webservice";
mysqli_select_db($con,$db);

$result4 = mysqli_query($con, "SELECT * FROM images WHERE ID='4'");
while($row4 = mysqli_fetch_array($result4))
  {
    echo 'img/temp/';
  echo $row4['Filename'];
  }?>" width="580px" height="580px" alt="Rain" style="-webkit-transform: rotate(-4.71238898038469rad);"></li>
        </ul>
    
    </div>
    
    <a id="previousLink" href="#">»</a>
    <a id="nextLink" href="#">«</a>
    
</div>

<a href="clear.php">Clear Private Photos</a>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="js/jquery.rotate.js"></script>
<script src="js/script.js"></script>


<div class="backbut">
    <a href="gallery.html">Back</a>
</div>
</body></html>