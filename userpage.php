<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>User page </title>
</head>
<body>

<header>
	<a href="displayBooks.php"> Display Books </a> | 
	<a href="insertform.html"> Insert Book </a> |
	<a href="updateBooks.php"> Update Book </a> |
	<a href="deleteBooks.php"> Delete Books </a> |  
</header>

<?php

	if(isset($_SESSION['userName']))

		Echo "Hello   " .  $_SESSION['userName'] . "<br>";
	else
		echo "Not Set"; 
	if(isset($_COOKIE['userName']))
		echo "Cookie value = " . $_COOKIE["userName"]; 
		
		echo "the time is ". time();

?>
</body>
</html>