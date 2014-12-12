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

$query = "SELECT * FROM institute";
$result = mysqli_query($con,$query);

echo "<table>
  <tr>
  <th>Institution</th>
  <th>Total score</th>
  <th>Total Penalty</th>
  </tr></table";
echo ">";
while($row = mysqli_fetch_array($result))
  {
    $name=$row['institutename'];
    $score=$row['totalscore'];
    $penalty=$row['totalpenalty'];
echo "
<table>
<tr>
  <td>$name</td>
  <td>$score</td>
  <td>$penalty</td>
</tr>
</table";
echo ">";
}
mysqli_close($con);

?>
  
</body>

</html>

