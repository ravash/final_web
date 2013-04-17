<?php
	include('functions.php'); 
?>

<?php
session_start();
if(!$_SESSION['myusername']){
header("location:index.html");
}
?>
<?php
	//if POST 
		//increment round count 
		//save each name to the database 
	if (!empty($_GET['round'])) {
		$round = $_GET['round'];
	}
	else if (!empty($_POST['round'])) {
		$round = $_POST['round'];
	}	
	else {
		header( 'Location:create_tournament.php' );
	}
	if (!empty($_GET['tournament'])) {
		$tournament = $_GET['tournament'];
	}	
	else if (!empty($_POST['tournament'])) {
		$tournament = $_POST['tournament'];
	}
	else {
		header( 'Location:create_tournament.php' );
		}


	if ($round == 1) {
		$names = get_names($tournament);
		$number_of_matches = 16;
	}  	
	else {
		$names = get_round_names($round-1, $tournament);
		$number_of_matches = sizeof($names)/2;
	}
	if ($number_of_matches > (sizeof($names)/2)) {
		
		$number_of_matches = sizeof($names)/2;
	}
	

    if (!empty($_POST)) {
		//echo ];
		//Insert winners
		for ($i = 1; $i <= $number_of_matches; $i++) {
			insert_winner($_POST['match'.$i.'winner'], $tournament, $round); 
		}
		
		$round = $round +1;
		header('Location: round.php?round='. $round.'&tournament='.$tournament);
		die;
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
    <?php
	$name_count =0;
	for ($i = 1; $i <= $number_of_matches; $i++) {?>
    	<div id=match_container">
    	<div id="left_player">
        <input type="radio" type="text" name="<?php echo "match".$i."winner";?>"value="<?php echo $names[$name_count]['id'];?>" id="<?php echo "match".$i."winner";?>"><?php echo $names[$name_count]['name'];?></input>
        <?php $name_count++;?> </div>
        vs
        <div id="right_player">
        <input type="radio" type="text" name="<?php echo "match".$i."winner";?>" value="<?php echo $names[$name_count]['id'];?>" id="<?php echo "match".$i."winner";?>"><?php echo $names[$name_count]['name'];?></input>
        <?php $name_count++;?> 
        </div>
        <br />
        <hr />
        </div>
    <?php
	}
	
	if ($number_of_matches < 1) {
		echo $names[0]['name']. " is the winner!";
	}
	?>
    	<br />
        <input type="hidden" name="round" value= "<?php echo $round;?>" />
        <input type="hidden" name="tournament" value= "<?php echo $tournament;?>" />   
	<?php
	if ($number_of_matches < 1) {
		
	} 
	else{
    ?><input type="submit" value="Submit"/>
	<?php } ?>
</form>
</div>
</body>
</html>