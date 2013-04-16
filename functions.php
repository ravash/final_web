<?php
include "database.php";

function add_tournament($name, $number_of_players = NULL){
	$name = mysql_real_escape_string($name);
	
	mysql_query("
	INSERT INTO tournaments
	(name)
	VALUES
	('$name') 
	");
	$id = mysql_insert_id();
	return $id;
}

function get_round_names($round, $tournament_id) {
	$q = mysql_query("
	SELECT * FROM rounds 
	JOIN names ON names.id = rounds.name_id
	WHERE rounds.tournament_id = '$tournament_id' AND number = '$round'
	");
	$names = array();
	while ($row = mysql_fetch_array($q)) {
		$names[] = $row;
	}
	return $names;
}

function get_names($tournament_id) {
	$q = mysql_query("
	SELECT * FROM names
	WHERE tournament_id = '$tournament_id'
	");
	$names = array();
	while ($row = mysql_fetch_array($q)) {
		$names[] = $row;
	}
	return $names;	
}

function insert_winner($name_id, $tournament_id, $number) {
	
	mysql_query("
	INSERT INTO rounds
	(name_id, number, tournament_id)
	VALUES
	('$name_id', '$number', '$tournament_id') 
	");
}

function insert_name($name, $tournament_id) {
	
	mysql_query("
	INSERT INTO names
	(name, tournament_id)
	VALUES
	('$name', '$tournament_id') 
	");
}

?>