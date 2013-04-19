<?php
	include('functions.php'); 
?>

<?php
session_start();
if(!$_SESSION['myusername']){
header("location:index.php");
}
?>

<?php echo $_SESSION ['myusername'];
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>