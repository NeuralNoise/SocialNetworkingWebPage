<?php

session_start();
$e=$_SESSION['username'];
session_destroy();
$link = mysql_connect('localhost', 'raja', 'password');
		if (!$link)
		{
			$errorMessage="<h2>Unable to connect to Server</h2>";
		//	exit;
		}
		else
		{
			$db="HW2";
			mysql_select_db($db);
			$q = mysql_query ("delete FROM LoggedinUsers where a='$e';");
			mysql_close($link);
		}
header("Location:logon.php?u=$e");

?>
