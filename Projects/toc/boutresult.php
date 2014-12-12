<html>

<head>
<title>Welcome to NTU Taekwondo Open Championship</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>

<?php
    $con = mysqli_connect("localhost","root","12345qwert");
    $db ="toc";
    mysqli_select_db($con,$db);

    $boutnumber=$_GET['boutnumber'];
    $suddendeath=$_GET['suddendeath'];

    if ($_GET['redscore']!=0){

        $redscore= $_GET['redscore'];
    }

    if ($_GET['bluescore']!=0){

        $bluescore= $_GET['bluescore'];
    }
    if ($_GET['redpenalty']!=0){

        $redpenalty= $_GET['redpenalty'];
    }
    if ($_GET['bluepenalty']!=0)
    {
        $bluepenalty= $_GET['bluepenalty'];
    }
    
    $totalscore=$redscore + $bluescore;
    $totalpenalty=$redpenalty+$bluepenalty;

    echo $boutnumber."<br>";
    echo $suddendeath."<br>";
    echo $redpenalty."<br>";
    echo $bluepenalty."<br>";
    echo $bluescore."<br>";
    echo $redscore."<br>";

/*Get all the details of the bout*/
    $query = "SELECT * FROM boutlist where boutnumber= $boutnumber";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    $redinstitute=$row['redinstitute'];
    $blueinstitute=$row['blueinstitute'];
    $nextbout=$row['nextbout'];
    $redplayer=$row['redplayer'];
    $blueplayer=$row['blueplayer'];
    echo $redinstitute."<br>";
    echo $blueinstitute."<br>";
    echo $nextbout."<br>";


/*define winner of the game*/
    if ($_GET['suddendeath']!=0)
    {
        $suddendeath= $_GET['suddendeath'];
        $totalscore=$totalscore + 1;
        /*suddendeath winner is the winner of the game*/
        $winner=$suddendeath;
        if($suddendeath==1)
            $winnerinstitue=$redinstitute;
        if($suddendeath==2)
            $winnerinstitue=$blueinstitute;
    }
    else {
        if ($redscore > $bluescore)
            $winner=1;
        else $winner=2;
    }

    if ($winner==1)
        $winnername=$redplayer;
    else $winnername=$blueplayer;

    echo $winnername.'<br>';

/*update boutlist database including score penalty suddendeath*/
    $updateboutlist=" UPDATE boutlist SET winner='$winner', redscore='$redscore', bluescore='$bluescore', 
    redpenalty='$redpenalty', bluepenalty='$bluepenalty', totalscore='$totalscore', 
    suddendeath='$suddendeath' WHERE boutnumber=$boutnumber ";
    mysqli_query($con,$updateboutlist);

/*update playerlist including score add up and penalty and suddendeath*/
    $resultred=mysqli_query($con,"SELECT * FROM playerlist where playername='$redplayer'");
    $rowred=mysqli_fetch_array($resultred);

    echo $rowred['playername'].'<br>';

    $resultblue = mysqli_query($con,"SELECT * FROM playerlist where playername='$blueplayer'");
    $rowblue = mysqli_fetch_array($resultblue);

    $addredscore=$rowred['totalscore']+$redscore;
    $addredpenalty=$rowred['totalpenalty']+$redpenalty;
    $addgamered=$rowred['totalgame']+1;

    $addbluescore=$rowblue['totalscore']+$bluescore;
    $addbluepenalty=$rowblue['totalpenalty']+$bluepenalty;
    $addgameblue=$rowblue['totalgame']+1;


    $queryaddred="UPDATE playerlist SET totalscore='$addredscore', totalpenalty='$addredpenalty',totalgame='$addgamered'
    WHERE playername='$redplayer'";

    mysqli_query($con, $queryaddred);

    $queryaddblue="UPDATE playerlist SET totalscore='$addbluescore', totalpenalty='$addbluepenalty',totalgame='$addgameblue'
    WHERE playername='$blueplayer'";

    mysqli_query($con, $queryaddblue);

/*update nextbout*/

    if ($nextbout>20)
    {
        $updatenextbout=mysqli_query($con," SELECT * FROM boutlist WHERE boutnumber=$nextbout");
        $rowupdatenextbout=mysqli_fetch_array($updatenextbout);

        if($rowupdatenextbout['redplayer']==$nextbout)
            mysqli_query($con," UPDATE boutlist SET redplayer='$winnername',redinstitute='$winnerinstitute' WHERE boutnumber=$nextbout");
        else if($rowupdatenextbout['blueplayer']==$nextbout)
            mysqli_query($con," UPDATE boutlist SET blueplayer='$winnername',blueinstitute='$winnerinstitute' WHERE boutnumber=$nextbout");
        else echo '';
}

/*update school database*/
        $updatinstitutered=mysqli_query($con,"SELECT * FROM institute where insindex=$redinstitute");
        $rowupdateinstitutered=mysqli_fetch_array($updatinstitutered);


        $totalscoreredsch = $redscore + $rowupdateinstitutered['totalscore'];
        $totalpenaltyredsch = $redpenalty + $rowupdateinstitutered['totalpenalty'];

        
           
        $updatinstituteblue=mysqli_query($con,"SELECT * FROM institute where insindex=$blueinstitute");
        $rowupdateinstituteblue=mysqli_fetch_array($updatinstituteblue);

        $totalscorebluesch=$bluescore+$rowupdateinstituteblue['totalscore'];
        $totalpenaltybluesch=$bluepenalty+$rowupdateinstituteblue['totalpenalty'];

        
        
        if($winner==1)
        {
            $addinsmatchred=$rowupdateinstitutered['totalmatch']+1;
            $addinsmatchblue=$rowupdateinstituteblue['totalmatch']+1;
            $addinsmatchwon=$rowupdateinstitutered['matchwon']+1;
            mysqli_query($con," UPDATE institute SET totalscore='$totalscoreredsch',totalpenalty='$totalpenaltyredsch',totalmatch='$addinsmatchred',
            matchwon='$addinsmatchwon' WHERE insindex=$redinstitute");

            mysqli_query($con," UPDATE institute SET totalscore='$totalscorebluesch',totalpenalty='$totalpenaltybluesch',totalmatch='$addinsmatchred' 
                WHERE insindex=$blueinstitute");
        }
        if($winner==2)
        {
            $addinsmatchred=$rowupdateinstitutered['totalmatch']+1;
            $addinsmatchblue=$rowupdateinstituteblue['totalmatch']+1;
            $addinsmatchwon=$rowupdateinstituteblue['matchwon']+1;
            mysqli_query($con," UPDATE institute SET totalscore='$totalscoreredsch',totalpenalty='$totalpenaltyredsch',totalmatch='$addinsmatchred' 
                WHERE insindex=$redinstitute");

            mysqli_query($con," UPDATE institute SET totalscore='$totalscorebluesch',totalpenalty='$totalpenaltybluesch',totalmatch='$addinsmatchred',
            matchwon='$dinsmatchwon' 
                WHERE insindex=$blueinstitute");
        }

        /*update overall data*/
        /*$updateall=mysqli_query($con, "SELECT * FROM all where allindex='0'");
        $resultall=mysqli_fetch_array($updateall);          printf("Error: %s\n", mysqli_error($con));
        $addscoreall=$totalscore + $resultall['score'];
        $addpenaltyall=$totalpenalty + $resultall['penalty'];
        $addmatchall= 1 + $resultall['matchno'];
        $addredwonall=$resultall['redwon'];
        If($winner==1)
        {
            $addredwonall=$resultall['redwon']+1;
        }
        mysqli_query($con, "UPDATE all SET score='$addscoreall',penalty='$addpenaltyall',matchno='$addmatchall',redwon='$addredwonall'
                WHERE insindex=$redinstitute");
*/
    echo '<a href="index.php">back to home page</a>';
    echo '<a href="boutresult.html"><br>Another bout result</a>';
?>

    
</body>

</html>