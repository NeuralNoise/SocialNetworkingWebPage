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
	$msg = $_POST["msg"];
	$sql = "insert into messages (senderUserName,receiverUserName,message)values('$user_id','$fuser_id','$msg')";
	$result = $con->query($sql);


      php?>
