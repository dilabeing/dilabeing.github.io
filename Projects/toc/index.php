<html>

<head>
<title>NTU Taekwondo Open Championship 2014</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/feedback.css">
</head>


<body>
<div id="header">
<h3>NTU Taekwondo Open Championship 2014</h3>
</div>

<div id="announcement"class="notepaper">
    <p class="quote">
    	<?php  
      $con = mysqli_connect("localhost","root","12345qwert");
      $db ="toc";
      mysqli_select_db($con,$db);
      $query = "SELECT * FROM annoucement ORDER BY annindex DESC LIMIT 1;";
      $result = mysqli_query($con,$query);

      $row = mysqli_fetch_array($result);

      echo $row['anncontent'] .'<br>'.$row['anntime'];
      echo "<br><br><br>";
      ?>
      <figcaption class="quote-by">— TOC Committee 2014</figcaption>
    </p>
  </div>
<p class="annoucement"></p>
</div>

<div class="optionblock">
  <ul>
    <li class="options">
      <form action="boutquery.php" method="get">
        <label class="boutquery">Bout query
          <input class="input" type="text" name="boutquery" placeholder="">
        </label>

        <label class="submit">
          <input class="input" type="submit" value="Submit">
        </label>
    </form>
    </li>
    <li class="options">
      <a href="ahistory.php" data-toggle="dropdown">Announcement History</a>
    </li>
    <a href="cheatb.php">Here is the list of all bout results</a>
  </ul>
</div>

<div id="feedback" class="feedback">
<p>Please help us improve by giving <a href="feedback.html">feedback</a></p>

<form id="feedbackform">
</form>
</div>
</body>

</html>