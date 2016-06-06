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
 	//senderUserName,receiverUserName,message
	$sql = "select * from messages where (senderUserName='$user_id' and receiverUserName='$fuser_id') or (senderUserName='$fuser_id' and receiverUserName='$user_id') order by sentOn";
	$result = $con->query($sql);
	$r = array();		
	if ($result->num_rows > 0) 
	{
     // output data of each row
		$i = 0;
     		while($row = $result->fetch_assoc()) 
		{
			$r[$i]=$row["sentOn"].":".$row["senderUserName"].":".$row["message"];
			/*if($i == 0)
			{
				echo "[\"".$row["friendUserName"]."\",";
			}
			else
			{
         			echo "\"".$row["friendUserName"]."\"";
			} */
			$i= $i +1; 
     		}
		//echo "]"; 
		echo json_encode($r);
	}
      php?>
