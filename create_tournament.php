<?php
include "functions.php";
?>
<?php
session_start();
if(!$_SESSION['myusername']){
header("location:index.html");
}
?>
<?php
if (!empty($_POST)) {
	$tournament_id = add_tournament("cool");
	for ($i =1; $i <9; $i++) {  
		 insert_name($_POST['name'.$i], $tournament_id);
    }
	header('Location: round.php?round=1&tournament='.$tournament_id);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/main.css">
<link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="header">
<h1>Dyno-Tourn</h1>
</div>
<div id="content">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<?php for ($i =1; $i <9; $i++) { ?>
		<p><input type="text" name="name<?php echo $i;?>" />
        VS
        <?php $i++;?>
        <input type="text" name="name<?php echo $i;?>" />
        <br /><br />
        </p>
        <hr width=60% />
    <?php } ?>
	<input type="submit" value="Submit"/>
</form>
<br />
<br />
<a href="logout.php">Want to leave?</a>
</div>
</body>
</html>