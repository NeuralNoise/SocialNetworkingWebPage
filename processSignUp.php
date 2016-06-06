<?php
	session_start();
	$fn = "";
	$ln="";
	$e="";
	$p="";
	$valid=true;
	$error="Please fill the following fields<br/>";
	$errorMessage="";
	echo count($_POST);
    if (count($_POST)>0) {
        // validate
        if (empty($_POST['firstName'])) 
	{
            // put data into database or whatever needs to be done
		$valid=false;
		$error=$error."- First Name<br/>";
	}
	else
	{
		$fn=$_POST['firstName'];
	}
	if (empty($_POST['lastName'])) 
	{
            // put data into database or whatever needs to be done
		$valid=false;
		$error=$error."- Last Name<br/>";
	}
	else
	{
		$ln=$_POST['lastName'];
	}
	if (empty($_POST['email'])) 
	{
            // put data into database or whatever needs to be done
		$valid=false;
		$error=$error."- Email<br/>";
	}
	else
	{
		$e=$_POST['email'];
	}
	if (empty($_POST['password1'])) 
	{
            // put data into database or whatever needs to be done
		$valid=false;
		$error=$error."- Password<br/>";
	}
	else 
	{
      		if(strlen($_POST['password1'])<8)
		{		
        	    // put data into database or whatever needs to be done
			$valid=false;
			$error=$error."- Password should be atleast 8 characters<br/>";
		}
		else
		{
			if(strcmp($_POST['password1'],$_POST['password2'])!=0)
			{
        		    // put data into database or whatever needs to be done
				$valid=false;
				$error=$error."- Passwords do not match<br/>";
			}
			else
			{
				$p=$_POST['password1'];
			}		
		}
	}
	if($valid)
	{
		$link = mysql_connect('localhost', 'raja', 'password');
		if (!$link)
		{
			$errorMessage="<h2>Unable to connect to Server</h2>";
			header("Location:signup.php?errorMessage=$errorMessage&fn=$fn&ln=$ln&e=$e",true,303);
		//	exit;
		}
		else
		{
			$db="HW2";
			mysql_select_db($db);
			$q = mysql_query ("SELECT userName FROM hetuUsers where userName='$e';");
			if(mysql_num_rows($q)>0)
			{
				$errorMessage="Email already exists";
				header("Location:signup.php?errorMessage=$errorMessage&fn=$fn&ln=$ln&e=$e",true,303);
			}
			else
			{
				mysql_query ("insert into hetuUsers values('$e','$fn','$ln','$p',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);");
				mysql_close($link);
            			$_SESSION['loggedIn']=1;
				$_SESSION['username']=$e;
            			header("Location:homepage.php?u=$e");
            			exit;
			}
		}
        }
	else
	{

		$errorMessage=$error;
		header("Location:signup.php?errorMessage=$errorMessage&fn=$fn&ln=$ln&e=$e",true,303);
	}
    }

?>
