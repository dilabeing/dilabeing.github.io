<html>

<head>
<title>Annoucement History</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
<?php
echo '<a href="index.php">back to home page<br><br><br></a>';

$con = mysqli_connect("localhost","root","12345qwert");

$db ="toc";

mysqli_select_db($con,$db);

$query = "SELECT * FROM annoucement";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
  {
  echo "Annoucement made at " .$row['anntime'] ;
  echo '<br>'.$row['anncontent'];
  echo "<br><br><br>";
  }

mysqli_close($con);

?>
  
</body>

</html>

