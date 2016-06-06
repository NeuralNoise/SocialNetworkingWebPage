<?php
	session_start();
	$e="";
	$p="";
	$valid=true;
	$error="";
	$errorMessage="";
	echo count($_POST);
    if (count($_POST)>0) {
        // validate
        if (empty($_POST['userName'])) 
	{
            // put data into database or whatever needs to be done
		$valid=false;
		$error=$error."Please enter your email address<br/>";
	}
	else
	{
		$e=$_POST['userName'];
	}
	if (empty($_POST['password'])) 
	{
            // put data into database or whatever needs to be done
		$valid=false;
		$error=$error."Enter password<br/>";
	}
	else 
	{
      		$p=$_POST['password'];
	}
	if($valid)
	{
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
			$q = mysql_query ("SELECT password FROM hetuUsers where userName='$e';");
			if(mysql_num_rows($q)>0)
			{
				$f = mysql_fetch_array($q);
				
				if(strcmp($f[0],$p)==0)
				{
					$qc = mysql_query ("SELECT *  FROM LoggedinUsers where a='$e';");
					if(mysql_num_rows($qc)>0)
					{
						$errorMessage="Only Log in from one browser at a time is possible ";
						header("Location:logon.php?errorMessage=$errorMessage&u=$e",true,303);
					}
					else
					{
						//mysql_query ("insert into hetuUsers values('$e','$fn','$ln','$p',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);");
						
						$_SESSION['loggedIn']=1;
						$_SESSION['username']=$e;

						$qi = mysql_query ("insert into LoggedinUsers values('$e');");
						mysql_close($link);
            					header("Location:homepage.php?u=$e");

            					exit;
					}
				}
				else
				{
					$errorMessage="Incorrect Username or password";
					header("Location:logon.php?errorMessage=$errorMessage&u=$e",true,303);
				}
			}
			else
			{
				$errorMessage="Incorrect Username or password";
				header("Location:logon.php?errorMessage=$errorMessage&u=$e",true,303);
			}
		}
        }
	else
	{
		$errorMessage=$error;
		header("Location:logon.php?errorMessage=$errorMessage&u=$e",true,303);
	}
    }

?>
