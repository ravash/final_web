<?php
	include('functions.php'); 
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
		$round = 1;
	}
	if (!empty($_GET['tournament'])) {
		$tournament = $_GET['tournament'];
	}	
	else if (!empty($_POST['tournament'])) {
		$tournament = $_POST['tournament'];
	}
	else {
		$tournament = 2;	
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
	if ($number_of_matches < 1) {
		echo $names[0]['name']. " is the winner!";
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
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <?php
	$name_count =0;
	for ($i = 1; $i <= $number_of_matches; $i++) {?>
    	
    	<input type="radio" type="text" name="<?php echo "match".$i."winner";?>"value="<?php echo $names[$name_count]['id'];?>" id="<?php echo "match".$i."winner";?>"><?php echo $names[$name_count]['name'];?></input>
        <?php $name_count++;?>
        VS 
        <input type="radio" type="text" name="<?php echo "match".$i."winner";?>" value="<?php echo $names[$name_count]['id'];?>" id="<?php echo "match".$i."winner";?>"><?php echo $names[$name_count]['name'];?></input>
        <?php $name_count++;?> 
        <br />
        <hr />
    <?php
	}
	?>
        <input type="hidden" name="round" value= "<?php echo $round;?>" />
        <input type="hidden" name="tournament" value= "<?php echo $tournament;?>" />   
	<input type="submit" value="Submit"/>
</form>
</body>
</html>