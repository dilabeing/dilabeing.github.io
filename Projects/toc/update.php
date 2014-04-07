<?php
	$con = mysqli_connect("localhost","root","12345qwert");
    //select database
    $db ="toc";


    mysqli_select_db($con,$db);
  	$boutnumber= $_GET['boutnumber'];
    $nextbout=$_GET['nextbout'];
  	$gender= $_GET['gender'];
  	$beltlvl= $_GET['beltlvl'];
  	$weightcategory= $_GET['weightcategory'];
  	$redplayer= $_GET['redplayer'];
  	$blueplayer= $_GET['blueplayer'];
  	$redindex= $boutnumber;
  	$blueindex= $boutnumber + 1;
  	$redinstitute= $_GET['redinstitute'];
  	$blueinstitute= $_GET['blueinstitute'];
	  $file = "./boutresult.txt";

/*  mysqli_query($con, "UPDATE boutlist
    SET nextbout='$nextbout'
    WHERE boutnumber='$boutnumber'")

*/
	mysqli_query($con," UPDATE boutlist
	SET gender='$gender', beltlvl='$beltlvl', weightcategory='$weightcategory', redplayer='$redplayer', blueplayer='$blueplayer', blueinstitute='$blueinstitute', redinstitute='$redinstitute'
	WHERE boutnumber=$boutnumber;");

	/*mysqli_query($con," INSERT INTO `toc`.`boutlist` 
    
    (`boutnumber`, `gender`, `beltlvl`, `weightcategory`, `winner`, `redplayer`, 
      `blueplayer`, `redscore`, `bluescore`, `redinstitute`, `blueinstitute`, 
      `redpenalty`, `bluepenalty`, `totalscore`, `likes`, `suddendeath`) 
    VALUES 
    
    ('$boutnumber', '$gender', '$beltlvl', '$weightcategory', '0', '$redplayer', 
      '$blueplayer', '0', '0', '$redinstitute', '$blueinstitute', '0', '0', '0', 
      0', NULL);")*/
?>
