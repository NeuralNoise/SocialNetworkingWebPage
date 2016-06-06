<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="logon.css">
<link rel="icon" href="favicon.ico">
<title>Hetu</title>
</head>
<body>
<form name="myform" action="http://www.mydomain.com/myformhandler.cgi" method="POST">
<div id="upperHalf">
<a href="logon.php"><span id="heading">Hetu: present your opinion</span></a>
<span id="topOptions">
					<span class="divider">|</span><a href="signup.php">   Sign Up   </a><span class="divider">|</span><a href="careers.php">   Careers   </a><span class="divider">|</span><a href="aboutus.php">   About Us    </a><span class="divider">|</span><a href="contactus.php">   Contact Us   </a>
				</span>
<hr/>
</div>
<div id="outer">
<div id="lowHalf">
<div id="logonT">Login</div>
<pre>Username	<input id="username" type="text" size="20"></input></pre>
<pre>Password	<input id="password" type="password" size="20"></input></pre>
<input id="finalSubmit" type="submit" value="Log in"></input>
</div>
</div>
</form>
</body>
</html>
