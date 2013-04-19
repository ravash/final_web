<?php
	include('functions.php'); 
	session_start();
 	

	// username and password sent from form 
	$myusername=$_POST['myusername']; 
	$mypassword=$_POST['mypassword']; 
	//take the old username to save for sql statement
	$oldusername = $_SESSION ['myusername'];
	
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);

	$sql="UPDATE users SET username = '$myusername', password = '$mypassword' WHERE username = '$oldusername'";
	$result=mysql_query($sql);
	
	$_SESSION ['myusername'] = $myusername;
	$_SESSION ['mypassword'] = $mypassword;
	header("location:create_tournament.php");
?>