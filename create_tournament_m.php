<?php
include "functions.php";
session_start();
if(!$_SESSION['myusername']){
	header("location:index.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Create Your Tournament</title>
<link rel="stylesheet" href="css/main_m.css">
<link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
<meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <title>
        </title>
        <link rel="stylesheet" href="https://s3.amazonaws.com/codiqa-cdn/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
        <link rel="stylesheet" href="css/my.css" />
        <script src="https://s3.amazonaws.com/codiqa-cdn/jquery-1.7.2.min.js">
        </script>
        <script src="https://s3.amazonaws.com/codiqa-cdn/mobile/1.2.0/jquery.mobile-1.2.0.min.js">
        </script>
        <script src="js/my.js">
        </script>
</head>

<body>
<div id="header">
<h1>Dyno-Tourn</h1>
</div>
<div id="content">
<div id="errors">
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (!empty($_POST)) {
	if ($_POST['name1'] == "" || $_POST['name2'] == "" || $_POST['name3'] == "" || $_POST['name4'] == "" || $_POST['name5'] == "" || $_POST['name6'] == "" || $_POST['name7'] == "" || $_POST['name8'] == "") {
        echo "Error: all name fields are required";
    } else {
        $tournament_id = add_tournament("cool");
	for ($i =1; $i <9; $i++) {  
		 insert_name($_POST['name'.$i], $tournament_id);
    }
	header('Location: round_m.php?round=1&tournament='.$tournament_id);
    }
		
}
 
}
?></div>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" data-ajax="false">
	<?php for ($i =1; $i <9; $i++) { ?>
		<p><div data-role="fieldcontain">
                <input name="name<?php echo $i;?>" type="text" />
           </div>
        VS
        <?php $i++;?>
        	<div data-role="fieldcontain">
                <input name="name<?php echo $i;?>" type="text" />
           </div>
        <br />
        <hr />
        </p>
    <?php } ?>
	<input type="submit" value="Submit"/>
</form>

<br />
<br />
<a href="logout_m.php">Want to leave?</a>
</div>
</body>
</html>