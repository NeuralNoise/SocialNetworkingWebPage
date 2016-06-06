<?php
  $host = "localhost";  $user = "raja";  $pass = "password";    $databaseName = "HW2";
  $tableName = "hetuUsers";
  $con = mysqli_connect( $host, $user, $pass, $databaseName );
  // Check connection
  if (mysqli_connect_errno()) 
	{ 
		echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
	}
  	$user_id = $_POST["friendIdPOST"]; 
        $show = mysqli_query ( $con, "select * from hetuUsers where userName='$user_id';" );
        $found = 0;
	$row = mysqli_fetch_array($show);
	if(count($row)>0)
        {
            $found = 1;
            echo $row["firstName"]." ".$row["lastName"];
        }
        if ($found==0) { echo $user_id." is not found in DataBase."; } 
?>
