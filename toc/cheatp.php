<html>

<head>
<title>NTU Taekwondo Open Championship</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
<?php

$con = mysqli_connect("localhost","root","12345qwert");

$db ="toc";

mysqli_select_db($con,$db);

$query = "SELECT * FROM playerlist ORDER BY playername ASC";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
  {
    if($row['gender']==1)
      $gender='Male';
    else 
      $gender='Female';
    switch ($row['institute']) {

        case '1':
        $institute='NP';
        break;   

        case '2':
        $institute='NTU';
        break;           
        case '3':
        $institute='NUS';
        break;
           
        case '4':
        $institute='NYP';
        break;
           
        case '5':
        $institute='RP';
        break;
           
        case '6':
        $institute='SIM';
        break;
           
        case '7':
        $institute='SMU';
        break;
           
        case '8':
        $institute='SP';
        break;
           
        case '9':
        $institute='TP';
        break;
    }
      echo 'Name : ' .$row['playername'] ."($gender)".'<br>'."Player from " .$institute."<br>"; 
      echo "Total score in TOC 2014 : ".$row['totalscore'].'                             ';
      echo "Average score per game : ".$row['gamescore']."<br><br>";
      echo "-------------------------------------------------------"."<br><br>";
  }

mysqli_close($con);

?>
  
</body>

</html>

