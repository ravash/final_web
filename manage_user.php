<!--
Page: manage_user.php
Description: this page allows users to change their password and account name
Dylan Scott & James McColl
Project 2
-->
<?php
session_start();
if(!$_SESSION['myusername']){
header("location:index.php");
}

$username = $_SESSION ['myusername'];
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/main.css">
<link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Your Account</title>
</head>

<body>
<div id="header">
<h1>Dyno-Tourn</h1>
</div>
<div id="content">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="updatelogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr>
<td colspan="3"><strong>Update Account</strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername" value="<?php echo $username; ?>"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>Re-type Password</td>
<td>:</td>
<td><input name="mypassword1" type="password" id="mypassword1"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Update"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
<table id="footer">
<ul>
<li id="footerl">
<a href="logout.php">Logout?</a></li>
<li id="footerr"><a href="create_tournament.php">Return to Tournament.</a></il>
</ul>
</table>
</div>
</body>
</html>