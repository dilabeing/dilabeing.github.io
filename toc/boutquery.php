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

$boutnumber = $_GET['boutquery'];

/*SQL query for retreive bout details*/
$query = "SELECT * FROM boutlist where boutnumber= $boutnumber";

$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
  {
    if ($row['winner'] == 1)
      $winner ='red';
    else if ($row['winner'] == 2)
      $winner = 'blue';
    else $winner = 'Result pending';

    if ($row['winner'] == 1)
      $winner= $winner + '  by sudden death';

  echo 'Bout     ' .$row['boutnumber'] ."<br>winner  :  ". $winner;
  if ($row['nextbout']!=0)
    {
      echo '<br>Bout winner goes to :   Bout ' .$row['nextbout'];
      }
  echo "<br>" .$row['redplayer'] .'(RED)  Score : ' .$row['redscore'] . "<br>" .$row['blueplayer'] .'(BLUE)  Score : ' .$row['bluescore'];
  echo "<br><br><br>";
  }

mysqli_close($con);

?>

<a href="index.php">Return to home page</a>


	
</body>

</html>