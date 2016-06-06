<?php

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
<form name="myform" action="homepage.php" method="POST">
<div id="upperHalf">
<a href="logon.php"><span id="heading">Hetu: present your opinion</span></a>
<span id="topOptions">
					<span class="divider">|</span><a href="logon.php">   Log in   </a><span class="divider">|</span><a href="careers.php">   Careers   </a><span class="divider">|</span><a href="aboutus.php">   About Us    </a><span class="divider">|</span><a href="contactus.php
">   Contact Us   </a>
				</span>
<hr/>
</div>
<div id="outer">
<div id="lowHalf">
<div id="logonT">Login</div>
<pre>First Name	<input id="firstName" type="text" size="20"></input></pre>
<pre>Last Name	<input id="lastName" type="text" size="20"></input></pre>
<pre>Enter Email	<input id="email" type="text" size="20"></input></pre>
<pre>Password	<input id="password1" type="password" size="20"></input></pre>
<pre>Enter again	<input id="password2" type="password" size="20"></input></pre>
<input id="finalSubmit" type="submit" value="Sign up"></input>
</div>
</div>
</form>
</body>
</html>
