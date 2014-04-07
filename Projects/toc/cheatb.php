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

$query = "SELECT * FROM boutlist";
$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
  {
    if ($row['winner'] == 1)
      $winner ='red';
    else if ($row['winner'] == 2)
      $winner = 'blue';
    else $winner = 'Result pending';

    if ($row['suddendeath'] == 1)
      $winner.=" won by sudden death";

    if ($row['gender']==1)
      $gender='Male';

    if($row['gender']==2)
      $gender='Female';

    if ($row['beltlvl']==1)
      $beltlvl='Black';

    if ($row['beltlvl']==0)
      $beltlvl='Red';
    echo "<div class=bout>";
    if($row['weightcategory']>83){
      echo 'Bout     ' .$row['boutnumber'] .' ----- '.$gender.' '.$beltlvl.' '.'Above 88 Kg'."<br>winner  :  ".$winner;
    }
    else {
      echo 'Bout     ' .$row['boutnumber'] .' ----- '.$gender.' '.$beltlvl.' '.'Under'.' '.$row['weightcategory'].' Kg'."<br>winner  :  ".$winner;
    }


  if ($row['nextbout']!=0)
    {
      echo '<br>Bout winner goes to :   Bout ' .$row['nextbout'];
      }
  echo "<br>" .$row['redplayer'] .'(RED)  Score : ' .$row['redscore'] . "<br>" .$row['blueplayer'] .'(BLUE)  Score : ' .$row['bluescore'];
  echo "</div";
  echo ">";
  echo "<br><br><br>";
  }

mysqli_close($con);

?>
  
</body>

</html>

