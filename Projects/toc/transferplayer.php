<?php
	$con = mysqli_connect("localhost","root","12345qwert");
    $db ="toc";
    mysqli_select_db($con,$db);
    $getdata= "SELECT * FROM boutlist";
    $result=mysqli_query($con, $getdata);

    while($row = mysqli_fetch_array($result))
  {
  	if($row['redplayer']!=''){
  		$playername =$row['redplayer'];
  		$playerinstitute=$row['redinstitute'];
  		$playergender=$row['gender'];

  		mysqli_query($con, "INSERT INTO playerlist (playername, institute, gender) 
  		VALUES ('$playername', '$playerinstitute', '$playergender')");
  		echo "$playername".'<br>'."$playerinstitute".'<br>'."$playergender".'<br>';	
  	}

  	if($row['redplayer']!=''){
  		$playername =$row['blueplayer'];
  		$playerinstitute=$row['blueinstitute'];
  		$playergender=$row['gender'];
  		mysqli_query($con, "INSERT INTO playerlist (playername, institute, gender) 
  		VALUES ('$playername', '$playerinstitute', '$playergender')");	
  		echo "$playername".'<br>'."$playerinstitute".'<br>'."$playergender".'<br>';
  	}
  	
}

mysqli_close($con);
?>