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
	$fuser_id = $_POST["uid"]; 
        $show = mysqli_query ( $con, "select * from friends where userName='$user_id' and friendUserName='$fuser_id'");
	$show1 = mysqli_query ( $con, "select * from requests where senderUserName='$fuser_id' and receiverUserName='$user_id'");
        $found = 0;
	$row = mysqli_fetch_array($show);
	$row1 = mysqli_fetch_array($show1);
	if(count($row)>0)
       {
          $found = 1;
           echo 'He is already your friend';
        }
	if(count($row1)>0)
       {
          $found = 1;
           echo 'request is already sent';
        }
        if ($found==0) 
	{ 
		$show = mysqli_query ( $con, "insert into requests (senderUserName,receiverUserName)values('$fuser_id','$user_id');" );
		echo $fuser_id." is sent a request"; } 
?>
