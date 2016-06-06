<?php
  $host = "localhost";  $user = "raja";  $pass = "password";    $databaseName = "HW2";
  $tableName = "hetuUsers";
  $con = mysqli_connect( $host, $user, $pass, $databaseName );
  // Check connection
  if (mysqli_connect_errno()) 
	{ 
		echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
	} 
	$user_id = $_POST["uid"];
 	$fuser_id = $_POST["fid"];
	$sql = "insert into friends (userName,friendUserName)values('$user_id','$fuser_id')";
	$result = $con->query($sql);
	$sql2 = "insert into friends (userName,friendUserName)values('$fuser_id','$user_id')";
	$result2 = $con->query($sql2);
	$sql3 = "delete from requests where senderUserName = '$fuser_id' and receiverUserName='$user_id'";
	$result3 = $con->query($sql3);

      php?>
