<?php
	$con = mysqli_connect("localhost","root","12345qwert");
	$db ="toc";
	mysqli_select_db($con,$db);

    $query = "SELECT * FROM boutlist";
    $result = mysqli_query($con,$query);
    $school=0;

    while ($row = mysqli_fetch_array($result))
    {
    	switch ($row['blueinstitute']) {
    		case 'NP':
    			$school=1;

    			$boutnumber=$row['boutnumber'];
    			$update="UPDATE boutlist SET blueinstitute='$school' WHERE boutnumber=$boutnumber ";
    			mysqli_query($con,$update);
    			break;


    		case 'NTu':
    			$school=2;
    			$boutnumber=$row['boutnumber'];
    			$update="UPDATE boutlist SET blueinstitute='$school' WHERE boutnumber=$boutnumber ";
    			mysqli_query($con,$update);
    			break;


    		case 'NUS':
    			$school=3;
    			$boutnumber=$row['boutnumber'];
    			$update="UPDATE boutlist SET blueinstitute='$school' WHERE boutnumber=$boutnumber ";
    			mysqli_query($con,$update);
    			break;


    		case 'NYP':
    			$school=4;
    			$boutnumber=$row['boutnumber'];
    			$update="UPDATE boutlist SET blueinstitute='$school' WHERE boutnumber=$boutnumber ";
    			mysqli_query($con,$update);
    			break;


    		case 'RP':
    			$school=5;    			
    			$boutnumber=$row['boutnumber'];
    			$update="UPDATE boutlist SET blueinstitute='$school' WHERE boutnumber=$boutnumber ";
    			mysqli_query($con,$update);
    			break;


    		case 'SIM':
    			$school=6;
    			$boutnumber=$row['boutnumber'];
    			$update="UPDATE boutlist SET blueinstitute='$school' WHERE boutnumber=$boutnumber ";
    			mysqli_query($con,$update);
    			break;


    		case 'SMU':
    			$school=7;
    			$boutnumber=$row['boutnumber'];
    			$update="UPDATE boutlist SET blueinstitute='$school' WHERE boutnumber=$boutnumber ";
    			mysqli_query($con,$update);
    			break;


    		case 'Sp':
    			$school=8;
    			$boutnumber=$row['boutnumber'];
    			$update="UPDATE boutlist SET blueinstitute='$school' WHERE boutnumber=$boutnumber ";
    			mysqli_query($con,$update);
    			break;


    		case 'TP':
    			$school=9;
    			$boutnumber=$row['boutnumber'];
    			$update="UPDATE boutlist SET blueinstitute='$school' WHERE boutnumber=$boutnumber ";
    			mysqli_query($con,$update);
    			break;
    	}
    }
	mysqli_close($con);
    ?>