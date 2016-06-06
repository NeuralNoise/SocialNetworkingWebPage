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
 
	$sql = "select friendUserName from friends where userName='$user_id'";
	$result = $con->query($sql);
	$r = array();		
	if ($result->num_rows > 0) 
	{
     // output data of each row
		$i = 0;
     		while($row = $result->fetch_assoc()) 
		{
			$r[$i]=$row["friendUserName"];
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
