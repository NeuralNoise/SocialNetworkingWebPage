<?php
    	if (count($_GET)>0) 
	{
		$errorMessage=$_GET['errorMessage'];
		$fn=$_GET['fn'];
		$ln=$_GET['ln'];
		$e=$_GET['e'];
	}        

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="signup.css">
<link rel="icon" href="favicon.ico">
<title>Hetu</title>
</head>
<body>
<form name="myform" action="processSignUp.php" method="POST">
<div id="upperHalf">
<a href="logon.php"><span id="heading">Hetu: present your opinion</span></a>
<span id="topOptions">
					<span class="divider">|</span><a href="logon.php">   Log in   </a><span class="divider">|</span><a href="careers.php">   Careers   </a><span class="divider">|</span><a href="aboutus.php">   About Us    </a><span class="divider">|</span><a href="contactus.php">   Contact Us   </a>
				</span>
<hr/>
</div>
<div id="outer">
<div id="lowHalf">
<div id="logonT">Sign up</div>
<?php 
	echo $errorMessage;
?>
<pre>First Name	<input id="firstName" name="firstName" type="text" size="20" value="<?php echo $fn ?>"></input></pre>
<pre>Last Name	<input id="lastName" name="lastName" type="text" size="20" value="<?php echo $ln ?>"></input></pre>
<pre>Enter Email	<input id="email" name="email" type="email" size="20" value="<?php echo $e ?>"></input></pre>
<pre>Password	<input id="password1" name="password1" type="password" size="20"></input></pre>
<pre>Enter again	<input id="password2" name="password2" type="password" size="20"></input></pre>
<input id="finalSubmit" name="submit" type="submit" value="Sign up"></input>
</div>
</div>
</form>
</body>
</html>
